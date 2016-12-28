<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('app.index');
    }

    public function registerRecipe()
    {
        return view('app.recipes.create');
    }

    public function storeRecipe(Request $request)
    {

    }
}
