<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $game = Games::all();
        return view("Welcome")->with("games",$game);
    }
}
