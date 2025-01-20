<template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Debug Information -->
        <div v-if="devices.length === 0" class="bg-yellow-100 p-4 rounded">
            <p class="text-yellow-800">No devices found. Debug info:</p>
            <pre>{{ JSON.stringify($page.props, null, 2) }}</pre>
        </div>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <!-- Section Title -->
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Device Management</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Manage and monitor devices that are currently signed in to your account.
                    </p>
                </div>
            </div>

            <!-- Device List -->
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Debug Devices -->
                        <div v-if="devices.length === 0" class="text-center text-gray-500">
                            <p>No devices found</p>
                            <pre>Devices: {{ devices }}</pre>
                        </div>

                        <!-- Device List -->
                        <div v-else class="space-y-6">
                            <div v-for="device in devices" 
                                 :key="device.id" 
                                 class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <!-- Device Icon -->
                                    <div class="flex-shrink-0">
                                        <ComputerDesktopIcon v-if="device.device_type === 'desktop'" 
                                                           class="h-6 w-6 text-gray-400" />
                                        <DevicePhoneMobileIcon v-else 
                                                             class="h-6 w-6 text-gray-400" />
                                    </div>

                                    <!-- Device Info -->
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ device.device_name }}
                                            <span v-if="device.is_current_device" 
                                                  class="ml-2 text-xs text-green-500">
                                                (Current Device)
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Last active: {{ formatDate(device.last_activity) }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ device.location || 'Location not available' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Sign Out Button -->
                                <button v-if="!device.is_current_device"
                                        @click="signOutDevice(device.id)"
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Sign Out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { 
    ComputerDesktopIcon, 
    DevicePhoneMobileIcon, 
    CheckCircleIcon 
} from '@heroicons/vue/24/solid'
import { router, usePage } from '@inertiajs/vue3'

const page = usePage()

const props = defineProps({
    devices: {
        type: Array,
        default: () => []
    }
})

// Log devices to console for debugging
onMounted(() => {
    console.log('Devices:', props.devices)
    console.log('Page Props:', page.props)
})

const signOutDevice = (deviceId) => {
    router.delete(route('profile.devices.signout', deviceId), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('Device signed out successfully')
        },
        onError: (errors) => {
            console.error('Error signing out device', errors)
        }
    })
}

const confirmSignOutAll = () => {
    if (confirm('Are you sure you want to sign out all other devices?')) {
        router.post(route('profile.devices.signout.all'), {
            preserveScroll: true,
            onSuccess: () => {
                console.log('All other devices signed out')
            },
            onError: (errors) => {
                console.error('Error signing out all devices', errors)
            }
        })
    }
}

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    })
}
</script>