<?php

namespace App\Http\Controllers;

use App\Models\Wines;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    //
    public function __constructor(){

    }
    public function recommend()
    {
        // Obtenez les vins achetés par l'utilisateur
        $purchasedWines = Purchases::where('user_id', Auth::user()->id)->pluck('wine_id');

        // Obtenez les vins similaires aux vins achetés par l'utilisateur
        $recommendedWines = Wines::whereIn('id', $purchasedWines)
            ->orWhereIn('region', Wines::whereIn('id', $purchasedWines)->pluck('region'))
            ->orWhereIn('type', Wines::whereIn('id', $purchasedWines)->pluck('type'))
            ->take(6)
            ->get();

        
        $wines= Wines::paginate(7);
        $types = Types::all();
        // dd($types,$wines);
        return view('welcome')->with(['wines'=> $wines, 'types'=> $types,'recommendedWines' => $recommendedWines]);
    }
}
