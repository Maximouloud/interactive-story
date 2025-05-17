{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page non trouvée</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-lg shadow text-center max-w-md">
        <h1 class="text-4xl font-bold text-red-600 mb-4">404</h1>
        <p class="text-gray-700 text-lg mb-6">
            Le contenu que tu cherches n’est pas disponible.<br>
            Il a peut-être été déplacé ou supprimé.
        </p>
        <a
            href="/dashboard"
            class="inline-block px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
        >
            Retour à l'accueil
        </a>
    </div>
</body>
</html>
