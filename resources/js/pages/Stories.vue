<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Histoires interactives</h1>

        <ul v-if="stories.length">
            <li v-for="story in stories" :key="story.id" class="mb-2">
                <h2 class="text-lg font-semibold">{{ story.title }}</h2>
                <p class="text-gray-600">{{ story.description }}</p>
                <Link :href="`/stories/${story.id}`" class="text-blue-500 underline">
                    Voir l’histoire
                </Link>
            </li>
        </ul>

        <p v-else>Aucune histoire trouvée.</p>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

const stories = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/v1/stories');
        stories.value = response.data;
    } catch (error) {
        console.error('Erreur lors de la récupération des histoires:', error);
    }
});
</script>
