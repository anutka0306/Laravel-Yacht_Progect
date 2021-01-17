<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yacht;

class IndexController extends Controller
{
    public  function index(){
        return view('index')->with([
            'yachts'=> Yacht::query()->get(),
        ]);
    }
}
