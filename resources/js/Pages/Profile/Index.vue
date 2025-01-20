<!-- resources/js/Pages/Profile/Index.vue -->
<script setup>
import { ref } from 'vue'
import { Film, Star, ListPlus, Settings, Camera } from 'lucide-vue-next'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const user = ref({
    name: 'John Doe',
    email: 'john@example.com',
    joinedDate: 'January 2024',
    moviesWatched: 142,
    listsCreated: 7,
    reviewsWritten: 35,
    averageRating: 4.2,
    bio: 'Passionate about sci-fi and indie films. Always looking for hidden gems.',
})
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto p-6">
                <div class="mb-8 relative">
                    <div class="h-48 bg-gradient-to-r from-blue-600 to-purple-600 rounded-t-lg"></div>
                    <div class="absolute -bottom-16 left-8">
                        <div class="relative">
                            <div class="w-32 h-32 bg-gray-200 rounded-full border-4 border-white dark:border-gray-800">
                                <Camera class="w-12 h-12 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-400" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20 grid gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6 flex flex-row justify-between items-center border-b dark:border-gray-700">
                            <div>
                                <h2 class="text-2xl font-bold dark:text-gray-200">{{ user.name }}</h2>
                                <p class="text-gray-500">Member since {{ user.joinedDate }}</p>
                            </div>
                            <Link
                                href="/profile/edit"
                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            >
                                <Settings class="w-4 h-4 mr-2" />
                                Edit Profile
                            </Link>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 dark:text-gray-300 mb-6">{{ user.bio }}</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <Film class="w-8 h-8 text-blue-500" />
                                    <div>
                                        <p class="text-2xl font-bold dark:text-gray-200">{{ user.moviesWatched }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Movies Watched</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <Star class="w-8 h-8 text-yellow-500" />
                                    <div>
                                        <p class="text-2xl font-bold dark:text-gray-200">{{ user.reviewsWritten }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Reviews</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <ListPlus class="w-8 h-8 text-green-500" />
                                    <div>
                                        <p class="text-2xl font-bold dark:text-gray-200">{{ user.listsCreated }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Lists Created</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <Star class="w-8 h-8 text-purple-500" />
                                    <div>
                                        <p class="text-2xl font-bold dark:text-gray-200">{{ user.averageRating }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Avg Rating</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>