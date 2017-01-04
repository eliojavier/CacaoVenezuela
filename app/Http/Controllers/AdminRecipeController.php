<?php

namespace App\Http\Controllers;

use App\Recipe;

class AdminRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::has('user')->get();
        return view ('admin.recipes.index', compact('recipes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view ('admin.recipes.show', compact('recipe'));
    }
}
