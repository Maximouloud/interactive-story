<script setup>
import { ref, watch, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({ story: Object });
const story = ref(props.story);
const storyId = story.value.id;

// Chapitre courant
const currentChapter = ref(null);

function goToChapter(id) {
  const next = story.value.chapters.find(c => c.id === id);
  if (next) {
    currentChapter.value = next;
  }
}

// Sauvegarde dans localStorage à chaque changement
watch(
  () => currentChapter.value?.id,
  (newId) => {
    if (newId) {
      console.log('Sauvegarde progression :', `progression_${storyId} →`, newId);
      localStorage.setItem(`progression_${storyId}`, newId);
    }
  }
);

// Restauration depuis localStorage au montage
onMounted(() => {
  const saved = localStorage.getItem(`progression_${storyId}`);
  console.log('Progression trouvée dans localStorage :', saved);

  if (saved) {
    const savedChapter = story.value.chapters.find(c => c.id === Number(saved));
    if (savedChapter) {
      currentChapter.value = savedChapter;
      console.log('Chapitre restauré :', savedChapter);
      return;
    }
  }

  // Si aucune progression trouvée ou invalide → démarrer au début
  currentChapter.value = story.value.chapters[0];
});
</script>


<template>
  <div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ story.title }}</h1>

    <!-- Bouton retour -->
    <div class="mb-4">
      <Link
        href="/dashboard"
        class="inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 text-sm rounded text-black"
      >
        Retour vers l'accueil
      </Link>
    </div>

    <!-- Chapitre actuel -->
    <div v-if="currentChapter">
      <p class="mb-4">{{ currentChapter.content }}</p>

      <!-- Choices -->
      <div v-if="currentChapter.choices.length">
        <button
          v-for="choice in currentChapter.choices"
          :key="choice.id"
          @click="goToChapter(choice.next_chapter_id)"
          class="block w-full my-2 px-4 py-2 bg-blue-500 text-white rounded"
        >
          {{ choice.text }}
        </button>
      </div>
      <p v-else class="text-green-600 font-semibold mt-6">
        Fin de l’histoire, on espère qu’elle vous a plu !
      </p>
    </div>
  </div>
</template>
