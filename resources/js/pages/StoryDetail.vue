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

// Fonction pour recommencer l'histoire
function restartStory() {
  localStorage.removeItem(`progression_${storyId}`);
  currentChapter.value = story.value.chapters[0];
}

// Sauvegarde dans localStorage à chaque changement
watch(
  () => currentChapter.value?.id,
  (newId) => {
    if (newId) {
      localStorage.setItem(`progression_${storyId}`, newId);
    }
  }
);

// Restauration depuis localStorage
onMounted(() => {
  const saved = localStorage.getItem(`progression_${storyId}`);
  if (saved) {
    const savedChapter = story.value.chapters.find(c => c.id === Number(saved));
    if (savedChapter) {
      currentChapter.value = savedChapter;
      return;
    }
  }

  // Par défaut : début de l'histoire
  currentChapter.value = story.value.chapters[0];
});
</script>

<template>
  <div class="bg-gray-50 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden">

      <!-- Image de couverture -->
      <img
  src="/images/histoire-1-img.jpg"
  alt="Image de l’histoire"
  class="w-full h-64 object-cover"
/>

      <div class="p-6">
        <!-- Titre -->
        <h1 class="text-3xl font-bold text-indigo-700 mb-4 text-center">{{ story.title }}</h1>

        <!-- Bouton retour -->
        <div class="mb-6 text-center">
          <Link
            href="/dashboard"
            class="inline-block px-5 py-2 bg-gray-200 hover:bg-gray-300 text-sm rounded-full text-gray-700 transition"
          >
            ← Retour à l'accueil
          </Link>
        </div>

        <!-- Transition de chapitre -->
        <Transition name="fade" mode="out-in">
          <div :key="currentChapter?.id" v-if="currentChapter">
            <p class="text-lg leading-relaxed text-gray-800 mb-8">
              {{ currentChapter.content }}
            </p>

            <!-- Choix -->
            <div v-if="currentChapter.choices.length" class="space-y-4">
              <button
                v-for="choice in currentChapter.choices"
                :key="choice.id"
                @click="goToChapter(choice.next_chapter_id)"
                class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-lg font-medium transition"
              >
                {{ choice.text }}
              </button>
            </div>

            <!-- Fin de l'histoire -->
            <div v-else class="text-center mt-10">
              <p class="text-green-700 font-semibold text-lg mb-4">
                Fin de l’histoire, on espère qu’elle vous a plu !
              </p>
              <button
                @click="restartStory"
                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded text-sm"
              >
                🔁 Recommencer l’histoire
              </button>
            </div>
          </div>
        </Transition>
      </div>
    </div>
  </div>
</template>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.4s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
