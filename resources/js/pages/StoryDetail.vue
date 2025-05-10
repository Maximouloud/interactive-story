<template>
  <div class="relative min-h-screen bg-white flex items-center justify-center px-4">

    <!-- Bloc central -->
    <div class="bg-blue-100 rounded-xl shadow-lg p-8 w-full max-w-2xl text-center">
      <p class="text-lg text-gray-800 mb-6">{{ currentChapter.content }}</p>

      <div v-if="currentChapter.choices.length" class="space-y-4">
        <button
          v-for="choice in currentChapter.choices"
          :key="choice.id"
          @click="goToChapter(choice.next_chapter_id)"
          class="block w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 transition"
        >
          {{ choice.text }}
        </button>
      </div>

      <p v-else class="text-green-700 font-semibold mt-6">Fin de l’histoire 🌟</p>
    </div>

    <!-- Titre en bas à gauche -->
    <div class="absolute bottom-4 left-4 text-sm text-gray-500">
      <strong>{{ story.title }}</strong>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  story: Object
});

const story = ref(props.story);
const currentChapter = ref(story.value.chapters[0]);

function goToChapter(chapterId) {
  const next = story.value.chapters.find(ch => ch.id === chapterId);
  if (next) currentChapter.value = next;
}
</script>
