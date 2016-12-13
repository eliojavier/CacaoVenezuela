<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        if($request->hasFile('image')) {
            /*image upload*/
            $file = $request->file('image');
            $path = 'images/recipes';
            $filename = date('Y-m-d-h-i-s') . "."
                        . sha1($file->getClientOriginalName()) . "."
                        . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //se guarda la receta
            $recipe = new Recipe();
            $recipe->name = $request->name;
            $recipe->modality = $request->modality;
            $recipe->directions = $request->directions;
            $recipe->serves = $request->serves;
            $recipe->user_id = Auth::user()->id;
            $recipe->image = $path . "/" . $filename;

            $recipe->save();
        }

        return redirect ('/');
    }
//        $lista_ingredientes = explode(".", $request->ingredientes);
//        for ($i = 0; $i < count($lista_ingredientes) - 1; $i++) {
//            $busqueda = Ingredient:: where('nombre', $lista_ingredientes[$i])->first(['id']);
//
//            if(!$busqueda){
//                $ingrediente = new Ingrediente();
//                $ingrediente->nombre = $lista_ingredientes[$i];
//                $ingrediente->save();
//
//                $recipe->ingredientes()->attach($ingrediente->id);
//            }
//            else{
//                $recipe->ingredientes()->attach($busqueda->id);
//            }
//        }


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
        $recipe = Recipe::findOrFail($id);
        $lista_ingredientes = $recipe->ingredientes;

        foreach ($lista_ingredientes as $ingrediente){
            
        }

        $ingredientes = $lista_ingredientes->nombre;
        echo $ingredientes;
        //return view ('recetas/edit', compact('receta'));
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
}
