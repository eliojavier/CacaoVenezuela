<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view ('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::pluck('name', 'id');
        return view('app.recipes.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        
        if($request->hasFile('image'))
        {
            $recipe->image = $this->uploadImage($request);
        }

        $recipe->name = $request->name;
        $recipe->modality = $request->modality;
        $recipe->ingredients = $request->ingredients;
        $recipe->directions = $request->directions;
        $recipe->serves = $request->serves;
        $recipe->user_id = Auth::user()->id;
        
        $recipe->save();

        $this->syncIngredients($request, $recipe);
        
        return redirect ('/');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());
        return redirect ('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('image');
        $path = 'images/recipes';
        $filename = date('Y-m-d-h-i-s') . "."
            . sha1($file->getClientOriginalName()) . "."
            . $file->getClientOriginalExtension();
        $file->move($path, $filename);
        
        return ($path . "/" . $filename);
    }

    public function syncIngredients(Request $request, Recipe $recipe)
    {
        $tags = $request->tags;
        foreach ($tags as $k => $v)
        {
            $ingredient = Ingredient::where('name', 'Like', $v)->first(['id']);
            if ($ingredient != null)
            {
                $recipe->ingredients()->attach($ingredient->id);
            }
            else
            {
                $ingredient = new Ingredient();
                $ingredient->name = $v;
                $ingredient->save();
                $recipe->ingredients()->attach($ingredient->id);
            }
        }
    }

    public function getIngredientsByKeyword(Request $request)
    {
        if($request->ajax())
        {
            $keyword = $request->val;
            $ingredients = Ingredient::where('name', 'Like', '%' . $keyword . '%')->select('name')->get();
            
            return response()->json(["ingredients"=>$ingredients]);
        }
    }

    public function getAllIngredients(Request $request)
    {
        if($request->ajax())
        {
            $ingredients = Ingredient::select('name')->get();

            return response()->json(["ingredients"=>$ingredients]);
        }
    }
}
