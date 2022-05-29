<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Genre;
use App\Models\Type;
use App\Models\Performance;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        
    }


    public function authCheck(){
        $userorguest = Auth::check();

        return view('home', compact('userorguest'));

    }
}
