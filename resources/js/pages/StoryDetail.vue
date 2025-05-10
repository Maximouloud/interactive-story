<script setup>
import { ref } from 'vue';

const props = defineProps({ story: Object });

const story = ref(props.story);
const currentChapter = ref(story.value.chapters[0]);

function goToChapter(id) {
  const next = story.value.chapters.find(c => c.id === id);
  if (next) currentChapter.value = next;
}
</script>

<template>
  <div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ story.title }}</h1>

    <div v-if="currentChapter">
      <p class="mb-4">{{ currentChapter.content }}</p>
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
      <p v-else class="text-green-600 font-semibold mt-6">Fin de l’histoire 🌱</p>
    </div>
  </div>
</template>
