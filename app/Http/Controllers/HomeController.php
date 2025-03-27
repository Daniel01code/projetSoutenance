<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preinscription; // Modèle pour les préinscriptions
use App\Models\Specialité;     // Modèle pour les spécialités
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function adminIndex()
    {
        DB::statement("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        // Nombre total de préinscrits
        $totalPreinscrits = Preinscription::count();

        // Nombre de mariés
        $marriedCount = Preinscription::where('family_status', 'marie')->count();

        // Nombre de célibataires
        $singleCount = Preinscription::where('family_status', 'celibataire')->count();

        // Nombre de personnes auto-suffisantes
        $selfSupportedCount = Preinscription::where('financement_id', '2')->count();

        // Spécialité la plus choisie
        $topSpeciality = Preinscription::select('speciality_id', DB::raw('COUNT(*) as count'))
            ->groupBy('speciality_id')
            ->orderBy('count', 'desc')
            ->first();
        $topSpecialityName = $topSpeciality ? Specialité::find($topSpeciality->speciality_id)->name : 'Aucune';
        $topSpecialityCount = $topSpeciality ? $topSpeciality->count : 0;

        // Top 5 spécialités
        $specialitiesStats = Preinscription::select('speciality_id', DB::raw('COUNT(*) as count'))
            ->groupBy('speciality_id')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                $speciality = Specialité::find($item->speciality_id);
                return [
                    'name' => $speciality ? $speciality->name : 'Inconnu',
                    'count' => $item->count,
                ];
            });

        // Préinscriptions par jour (derniers 7 jours)
        $recentPreinscriptions = Preinscription::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        // Pourcentage par statut (en attente, validé)
        $statusStats = Preinscription::select('statut', DB::raw('COUNT(*) as count'))
            ->groupBy('statut')
            ->get()
            ->mapWithKeys(function ($item) use ($totalPreinscrits) {
                $percentage = $totalPreinscrits > 0 ? round(($item->count / $totalPreinscrits) * 100, 2) : 0;
                return [$item->statut => $percentage];
            });

        // Statistiques supplémentaires (exemple : âge moyen des préinscrits)
        // $averageAge = Preinscription::avg('age') ?? 0;

        return view('admin.dashboard', compact(
            'totalPreinscrits',
            'marriedCount',
            'singleCount',
            'selfSupportedCount',
            'topSpecialityName',
            'topSpecialityCount',
            'specialitiesStats',
            'recentPreinscriptions',
            'statusStats'
        ));
    }
}
