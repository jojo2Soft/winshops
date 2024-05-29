<?php

namespace App\Http\Controllers;

use App\Models\Types;
use App\Models\Wines;
use App\Models\Ratings;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $wines= Wines::paginate(7);
        $types = Types::all();
        // dd($types,$wines);
        return view('welcome')->with(['wines'=> $wines, 'types'=> $types]);
    }

    public function auth_index(){
         // Obtenez les vins achetés par l'utilisateur
            $purchasedWineIds = Purchases::where('user_id', Auth::user()->id)->pluck('wine_id')->toArray();
            
            // dd($purchasedWineIds);
            // Obtenez les IDs des régions et des types des vins achetés
            $regionIds = Wines::whereIn('id', $purchasedWineIds)->pluck('region_id')->toArray();
            $typeIds = Wines::whereIn('id', $purchasedWineIds)->pluck('type_id')->toArray();

            // Obtenez les vins notés par l'utilisateur
            $ratedWineIds = Ratings::where('user_id', Auth::user()->id)->pluck('wine_id')->toArray();
            $highlyRatedWineIds = Ratings::where('user_id', Auth::user()->id)->where('rating', '>=', 4)->pluck('wine_id')->toArray();
            
            // Obtenez les vins similaires aux vins achetés ou notés par l'utilisateur, en excluant les vins déjà achetés ou notés
            $recommendedWines = Wines::where(function ($query) use ($regionIds, $typeIds, $highlyRatedWineIds) {
                $query->whereIn('region_id', $regionIds)
                      ->orWhereIn('type_id', $typeIds)
                      ->orWhereIn('id', $highlyRatedWineIds);
            })
            ->whereNotIn('id', $purchasedWineIds)
            ->whereNotIn('id', $ratedWineIds)
            ->take(7)
            ->get();
 
         
         $wines= Wines::paginate(7);
         $types = Types::all();
         // dd($types,$wines);
         return view('welcome')->with(['wines'=> $wines, 'types'=> $types,'recommendedWines' => $recommendedWines]);
    }
}
