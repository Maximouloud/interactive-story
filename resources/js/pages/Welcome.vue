<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Bienvenue" />

    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 text-center p-6">
        <h1 class="text-4xl font-bold mb-4 text-gray-800">Bienvenue dans l’univers des histoires interactives</h1>
        <p class="text-lg mb-8 max-w-xl text-gray-600">
            Plongez dans des aventures où chacun de vos choix façonne le récit. Connectez-vous ou créez un compte pour explorer nos histoires et découvrir où vos décisions vous mèneront.
        </p>

        <div class="flex gap-4">
            <Link
                v-if="canLogin"
                :href="route('login')"
                class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition"
            >
                Se connecter
            </Link>
            <Link
                v-if="canRegister"
                :href="route('register')"
                class="px-5 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition"
            >
                S’inscrire
            </Link>
        </div>

        <footer class="mt-10 text-sm text-gray-500">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>
