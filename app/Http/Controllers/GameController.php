<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GameController extends Controller
{
    public function store (Request $request)
    {


        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'id' => 'required|max:191',  
            'price' => 'required|max:191',
            'ownedID' => 'required|max:191',
            'categorie' => 'required|max:191',
        ]);

        $game = new Games;
        $game->name = $request->name;
        $game->id = $request->id;
        $game->description = $request->description;
        $game->ownerID = $request->ownerID;
        $game->categorie = $request->categorie;
        $game->price = $request->price;
        $game->save();
        return response()->json(['message' => 'Game Added Successfully'],200);

    }
}