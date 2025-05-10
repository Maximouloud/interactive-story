<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">{{ story?.title }}</h1>
        <p class="mb-6">{{ story?.description }}</p>

        <div v-if="story?.chapters?.length">
            <h2 class="text-xl font-semibold mb-2">Chapitres</h2>
            <ul>
                <li v-for="chapter in story.chapters" :key="chapter.id" class="mb-2">
                    <p>{{ chapter.content }}</p>
                </li>
            </ul>
        </div>

        <p v-else>Aucun chapitre trouvé.</p>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    id: Number,
});

const story = ref(null);

onMounted(async () => {
    try {
        const response = await axios.get(`/api/v1/stories/${props.id}`);
        story.value = response.data;
    } catch (error) {
        console.error('Erreur lors de la récupération de l’histoire:', error);
    }
});
</script>
