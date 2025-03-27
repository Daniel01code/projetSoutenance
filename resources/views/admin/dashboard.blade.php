<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <!-- Inclure Alpine.js, Tailwind et Boxicons -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        .fade-in { animation: fadeIn 0.5s ease-in; }
        .scale-in { animation: scaleIn 0.5s ease-in-out; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes scaleIn { from { transform: scale(0.95); } to { transform: scale(1); } }
    </style>

    <div class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800 mt-15">Tableau de Bord Admin</h1>

        <div x-data="{ openTab: 'stats' }" class="max-w-7xl mx-auto">
            <!-- Onglets -->
            <div class="flex justify-center mb-6">
                <button @click="openTab = 'stats'" class="px-4 py-2 mx-2 rounded-lg" :class="openTab === 'stats' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'">Statistiques</button>
                <button @click="openTab = 'specialities'" class="px-4 py-2 mx-2 rounded-lg" :class="openTab === 'specialities' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'">Spécialités</button>
                <button @click="openTab = 'recent'" class="px-4 py-2 mx-2 rounded-lg" :class="openTab === 'recent' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'">Récent</button>
            </div>

            <!-- Statistiques -->
            <div x-show="openTab === 'stats'" x-transition.opacity class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in">
                <!-- Total Préinscrits -->
                <div class="card bg-white p-6 rounded-lg shadow-md scale-in">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center"><i class='bx bx-user mr-2'></i> Total Préinscrits</h2>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalPreinscrits }}</p>
                </div>

                <!-- Mariés -->
                <div class="card bg-white p-6 rounded-lg shadow-md scale-in">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center"><i class='bx bx-heart mr-2'></i> Mariés</h2>
                    <p class="text-3xl font-bold text-pink-600 mt-2">{{ $marriedCount }}</p>
                </div>

                <!-- Célibataires -->
                <div class="card bg-white p-6 rounded-lg shadow-md scale-in">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center"><i class='bx bx-user-pin mr-2'></i> Célibataires</h2>
                    <p class="text-3xl font-bold text-purple-600 mt-2">{{ $singleCount }}</p>
                </div>

                <!-- Auto-suffisants -->
                <div class="card bg-white p-6 rounded-lg shadow-md scale-in">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center"><i class='bx bx-wallet mr-2'></i> Auto-suffisants</h2>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $selfSupportedCount }}</p>
                </div>

                <!-- Spécialité la plus choisie -->
                <div class="card bg-white p-6 rounded-lg shadow-md scale-in">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center"><i class='bx bx-star mr-2'></i> Spécialité Populaire</h2>
                    <p class="text-lg text-gray-600 mt-2">{{ $topSpecialityName }}</p>
                    <p class="text-2xl font-bold text-green-600">{{ $topSpecialityCount }} choix</p>
                </div>
            </div>

            <!-- Spécialités -->
            <div x-show="openTab === 'specialities'" x-transition.opacity class="bg-white p-6 rounded-lg shadow-md fade-in">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center"><i class='bx bx-list-ul mr-2'></i> Top 5 Spécialités</h2>
                <div class="space-y-4">
                    @foreach ($specialitiesStats as $speciality)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">{{ $speciality['name'] }}</span>
                            <div class="w-full max-w-xs bg-gray-200 rounded-full h-2.5 mx-4">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($speciality['count'] / $totalPreinscrits) * 100 }}%; transition: width 0.5s ease;"></div>
                            </div>
                            <span class="font-bold text-blue-600">{{ $speciality['count'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Récent -->
            <div x-show="openTab === 'recent'" x-transition.opacity class="bg-white p-6 rounded-lg shadow-md fade-in">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center"><i class='bx bx-calendar mr-2'></i> Préinscriptions Récentes (7 jours)</h2>
                <div class="space-y-2">
                    @foreach ($recentPreinscriptions as $data)
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ $data->date }}</span>
                            <span class="font-bold text-blue-600">{{ $data->count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>