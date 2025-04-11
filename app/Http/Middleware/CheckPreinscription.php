<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPreinscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // Vérifie si l'utilisateur a une pré-inscription dans la table
            $preinscription = PreInscription::where('user_id', Auth::id())->exists();

            // Si aucune pré-inscription n'existe et que l'utilisateur n'est pas déjà sur la page de pré-inscription
            if (!$preinscription) {
                return redirect()->route('preincription')->with('message', 'Vous devez compléter votre pré-inscription avant d’accéder au tableau de bord.');
            }
        }
        return $next($request);
    }
}
