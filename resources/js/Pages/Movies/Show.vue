<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    movie: Object
});
</script>

<template>
    <Head :title="movie.title" />

    <div class="grid grid-cols-12 gap-4 p-6 bg-gray-50">
        <!-- Movie Poster Section -->
        <div class="col-span-12 md:col-span-3">
            <div class="bg-white rounded-lg shadow h-full">
                <img
                    :src="movie.poster_path"
                    :alt="movie.title"
                    class="w-full h-full object-cover rounded-lg"
                />
            </div>
        </div>

        <!-- Main Info Section -->
        <div class="col-span-12 md:col-span-6 space-y-4">
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold mb-4">{{ movie.title }}</h1>
                
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="ml-1">{{ movie.vote_average }}/5</span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1">{{ movie.runtime }}m</span>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-2 mb-4">
                    <span 
                        v-for="genre in movie.genres" 
                        :key="genre"
                        class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"
                    >
                        {{ genre }}
                    </span>
                </div>
                
                <p class="text-gray-600">{{ movie.overview }}</p>
            </div>
        </div>

        <!-- Recommendations Sections -->
        <div class="col-span-12">
            <div class="grid grid-cols-1 gap-4">
                <!-- More Like This -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-4">More Like This</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div 
                            v-for="i in 3"
                            :key="i"
                            class="flex items-start space-x-4 hover:bg-gray-50 p-2 rounded-lg cursor-pointer"
                        >
                            <img
                                src="/api/placeholder/120/180"
                                :alt="`Similar movie ${i}`"
                                class="w-24 h-32 object-cover rounded"
                            />
                            <div class="flex-1">
                                <h4 class="font-medium mb-2">Similar Movie {{ i }}</h4>
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="ml-1">4.{{ i }}/5</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    Brief description of the movie that gives viewers a quick idea of what to expect.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personalized for You -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Personalized for You</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div 
                            v-for="i in 3"
                            :key="i"
                            class="flex items-start space-x-4 hover:bg-gray-50 p-2 rounded-lg cursor-pointer"
                        >
                            <img
                                src="/api/placeholder/120/180"
                                :alt="`Recommended movie ${i}`"
                                class="w-24 h-32 object-cover rounded"
                            />
                            <div class="flex-1">
                                <h4 class="font-medium mb-2">Recommended Movie {{ i }}</h4>
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="ml-1">4.{{ i }}/5</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    Recommended based on your taste in {{ i === 1 ? 'action' : i === 2 ? 'drama' : 'sci-fi' }} movies.
                                </p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">98% Match</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>