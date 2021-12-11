<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'price' => 'required|max:191',
            'categorie' => 'required|max:191',
        ]);
        $user = User::find(Auth::id());
        

        $game = new Games;
        $game->name = $request->name;
        $game->description = $request->description;
        $game->ownerID = $user->id;
        $game->categorie = $request->categorie;
        $game->price = $request->price;
        $game->save();
        return response()->json(['message' => 'Game Added Successfully'],201);


    }

    public function get($id)
    {
        $game = Games::where('id',$id)->first();
        if(!$game){
             return response(['msg'=>'Not found'],400);
        }
        return response(['game',$game],200);
    }
    public function filtre(Request $request)
    {
        //return "<h1>" . $request->query('color') . "</hi>"; 
        

        $game = Games::where('categorie',$request->query('categorie'))
                        ->orWhere('price', $request->query('price'))
                        ->get();//->andwhere('price', $request->query('price'))->first();
        if(!$game){
             return response(['msg'=>'Not found'],400);
        }
        return response(['game',$game],200);
    }

    public function add(Request $request){

        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'categorie' => 'required|max:191',
        ]);
        $user = User::find(Auth::id());
        

        $game = new Games;
        $game->name = $request->name;
        $game->description = $request->description;
        $game->ownerID = $user->id;
        $game->categorie = $request->categorie;
        $game->price = $request->price;
        $game->save();
        return redirect('home');

    }
}