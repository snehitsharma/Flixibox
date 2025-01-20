<script setup>
import { Head, Link } from '@inertiajs/vue3';  // Add Link import
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    movieslist: Array,
    trendingMovies: Array,
    mostwatchedalltime: Array,
    mostwatchedcurrent: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Movies List -->
                <div v-if="movieslist.length" class="mb-8">
                    <h3 class="text-lg font-bold mb-4 text-white">Movies List</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <Link 
                            v-for="movie in movieslist" 
                            :key="movie.id"
                            :href="route('movies.show', { movie: movie.id })"
                            class="bg-white overflow-hidden shadow-sm rounded-lg p-4 hover:bg-gray-50 transition duration-150"
                        >
                            <h4 class="font-bold">{{ movie.title }}</h4>
                            <p class="text-sm text-gray-600">{{ movie.year }} • {{ movie.genre }}</p>
                            <div class="mt-2 inline-block bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">
                                {{ movie.matchPercentage }}% Match
                            </div>
                        </Link>
                    </div>
                </div>

                <!-- Trending Movies -->
                <div v-if="trendingMovies.length" class="mb-8">
                    <h3 class="text-lg font-bold mb-4">Trending Now</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <Link 
                            v-for="movie in trendingMovies" 
                            :key="movie.id"
                            :href="route('movies.show', { movie: movie.id })"
                            class="bg-white overflow-hidden shadow-sm rounded-lg p-4 hover:bg-gray-50 transition duration-150"
                        >
                            <h4 class="font-bold">{{ movie.title }}</h4>
                            <p class="text-sm text-gray-600">{{ movie.year }} • {{ movie.genre }}</p>
                            <div class="mt-2 inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                Movies
                            </div>
                        </Link>
                    </div>
                </div>

                <!-- Most watched of all time -->
                <div v-if="mostwatchedalltime.length" class="mb-8">
                    <h3 class="text-lg font-bold mb-4">Most watched of all time</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <Link 
                            v-for="movie in mostwatchedalltime" 
                            :key="movie.id"
                            :href="route('movies.show', { movie: movie.id })"
                            class="bg-white overflow-hidden shadow-sm rounded-lg p-4 hover:bg-gray-50 transition duration-150"
                        >
                            <h4 class="font-bold">{{ movie.title }}</h4>
                            <p class="text-sm text-gray-600">{{ movie.year }} • {{ movie.genre }}</p>
                            <div class="mt-2 inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                {{ movie.matchPercentage }}% Match
                            </div>
                        </Link>
                    </div>
                </div>

                <!-- Most watched currently -->
                <div v-if="mostwatchedcurrent.length" class="mb-8">
                    <h3 class="text-lg font-bold mb-4">Most watched Currently</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <Link 
                            v-for="movie in mostwatchedcurrent" 
                            :key="movie.id"
                            :href="route('movies.show', { movie: movie.id })"
                            class="bg-white overflow-hidden shadow-sm rounded-lg p-4 hover:bg-gray-50 transition duration-150"
                        >
                            <h4 class="font-bold">{{ movie.title }}</h4>
                            <p class="text-sm text-gray-600">{{ movie.year }} • {{ movie.genre }}</p>
                            <div class="mt-2 inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                {{ movie.matchPercentage }}% Match
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>