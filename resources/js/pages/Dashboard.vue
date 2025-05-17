<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

// Simuler des histoires (tu peux remplacer ça par une prop ou une requête API)
const stories = [
    { id: 1, title: 'Voyage et rencontres', description: 'En Europpe, tu rencontres des personnes qui te font grandir.' },
    { id: 2, title: 'Les Archives Perdues', description: 'Explore une bibliothèque oubliée remplie de secrets.' },
    { id: 3, title: 'Le Signal du Néant', description: 'Un message étrange venu de l’espace te met au défi.' },
]
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-indigo-700">Découvre nos histoire intéractives</h2>
                
                <span class="text-sm text-blue-500 italic">Explore, choisis, vis tes histoires</span>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-8">

                <!-- Message de bienvenue -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-lg">
                        Tu es connecté·e ! Prêt·e à plonger dans une nouvelle aventure ?
                    </div>
                </div>

                <!-- Bibliothèque d’histoires -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4"> Nos histoires disponibles</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <Link
                            v-for="story in stories"
                            :key="story.id"
                            :href="`/stories/${story.id}`"
                            class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition duration-200 border border-gray-100 hover:border-indigo-300"
                        >
                            <h4 class="text-lg font-bold text-indigo-700 mb-2">{{ story.title }}</h4>
                            <p class="text-sm text-gray-600">{{ story.description }}</p>
                        </Link>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
