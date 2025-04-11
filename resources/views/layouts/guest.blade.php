<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Responsive adjustments pour le footer */
        @media (max-width: 640px) {
            .footer-grid { grid-template-columns: 1fr; }
            .text-lg { font-size: 1rem; }
            .text-sm { font-size: 0.875rem; }
            .px-4 { padding-left: 1rem; padding-right: 1rem; }
            .py-8 { padding-top: 2rem; padding-bottom: 2rem; }
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased relative min-h-screen">
    <!-- Background avec opacité -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/1920x1080');"></div>
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <!-- Contenu principal -->
    <div class="relative z-10 flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-gradient-to-r from-slate-600 to-slate-800 py-4 shadow-lg">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <!-- Logo -->
                <div>
                    <a href="/" class="transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current text-gray-200" />
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center space-x-6 text-white">
                    <ul class="flex space-x-6">
                        <li>
                            <a href="#about" class="text-sm sm:text-base font-medium hover:text-gray-300 transition-colors duration-200">À propos</a>
                        </li>
                        <li>
                            <a href="#contact" class="text-sm sm:text-base font-medium hover:text-gray-300 transition-colors duration-200">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Contenu principal (slot) -->
        <main class="flex-1 container mx-auto px-4 py-8 text-white">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer id="footer" class="w-full py-8 bg-gray-800 text-white">
            <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 footer-grid">
                <!-- Section À propos -->
                <div id="about">
                    <h3 class="text-lg font-semibold mb-3">À propos 🌟</h3>
                    <ul class="text-sm space-y-2">
                        <li>Contribuer à l’essor de la société 🌍</li>
                        <li>Rassurer une formation de qualité 🎓</li>
                        <li>Adapter la formation professionnelle à l’environnement et au contexte économique 🌱</li>
                        <li>Offrir une expérience d’apprentissage enrichissante par des programmes novateurs ⚖️</li>
                        <li>Former des entrepreneurs responsables maîtrisant les meilleures techniques de gestion 🚀</li>
                        <li class="font-semibold mt-2">Transparence 🤝 : Commentaires et conseils pour grandir 🌟</li>
                        <li class="font-semibold">Encadrement 🧭 : Guidance personnalisée 🎯</li>
                    </ul>
                </div>

                <!-- Section Contact -->
                <div id="contact">
                    <h3 class="text-lg font-semibold mb-3">Contact 📞</h3>
                    <p class="text-sm mb-2 font-semibold">Apprenez des meilleurs 🌟</p>
                    <p class="text-sm mb-4">Rejoignez nos cours et construisez une carrière recherchée. Chaque filière est simplifiée pour atteindre l’expertise requise dans l’industrie high-tech 🚀.</p>
                    <p class="text-sm font-semibold">Nous sommes ici 📍</p>
                    <p class="text-sm">Bafoussam Marché B 🏢</p>
                    <p class="text-sm">Tél : +237 695 82 92 30 / 671 33 78 29 ☎️</p>
                    <p class="text-sm">Email : <a href="mailto:contact@cfpcanadienne.com" class="hover:underline">contact@cfpcanadienne.com</a> ✉️</p>
                </div>

                <!-- Section Heures d’ouverture -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Heures d’ouverture ⏰</h3>
                    <ul class="text-sm space-y-1">
                        <li>Lundi-Vendredi : 8h00-17h (Téléphone jusqu’à 17h30) 📅</li>
                        <li>Samedi : 8h00-14h00 🌞</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-6 text-sm">
                © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Tous droits réservés.
            </div>
        </footer>
    </div>

    <!-- Script pour défilement fluide -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>