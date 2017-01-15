<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRecipeRequest;
use App\Ingredient;
use App\Recipe;
use App\User;
use App\Vote;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class ParticipantRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $recipes = $user->recipes;
            return view ('app.recipes.index', compact('recipes'));
        }
        catch(QueryException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('/');
        }
        catch(PDOException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('/');
        }
        catch(Exception $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
            $user_recipes = User::findOrFail(Auth::id())->recipes;
            if(count($user_recipes)==2)
            {
                flash('Solo puede inscribir una receta por modalidad', 'danger');
                return redirect('misrecetas');
            }
            $ingredients = Ingredient::pluck('name', 'id');
            return view('app.recipes.create', compact('ingredients'));
        }
        catch(QueryException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('misrecetas');
        }
        catch(PDOException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('misrecetas');
        }
        catch(Exception $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('misrecetas');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ParticipantRecipeRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRecipeRequest $request)
    {
        $user = Auth::user();
        if ($user->hasRole('participant'))
        {
            if ($this->canSubmitRecipe($user, $request->modality))
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
                $recipe->user_id = $user->id;

                $recipe->save();
                $this->syncIngredients($recipe, $request->tags);

                flash('Se inscribió la receta exitosamente', 'success');
                return redirect ('misrecetas');
            }
            flash('Ya tiene inscrita una receta en la modalidad ' . $request->modality, 'danger');
            return redirect('misrecetas');
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        if (Auth::user()->hasRole('participant'))
        {
            try
            {
                $recipe = Recipe::findOrFail($id);
                return view ('app.recipes.show', compact('recipe'));
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('misrecetas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('participant'))
        {
            try
            {
                $recipe = Recipe::findOrFail($id);
                return view('app.recipes.edit', compact('recipe'));
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('misrecetas');
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
        if (Auth::user()->hasRole('participant'))
        {
            try
            {
                $recipe = Recipe::findOrFail($id);
                $recipe->update($request->all());
                flash('Receta actualizada exitosamente', 'success');
                return redirect ('misrecetas');
            }
            catch(QueryException $e)
            {
                flash('Receta no pudo ser actualizada', 'danger');
                return redirect('misrecetas');
            }
            catch(PDOException $e)
            {
                flash('Receta no pudo ser actualizada', 'danger');
                return redirect('misrecetas');
            }
            catch(Exception $e)
            {
                flash('Receta no pudo ser actualizada', 'danger');
                return redirect('misrecetas');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('misrecetas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('participant'))
        {
            try
            {
                $votes = Vote::all();
                foreach ($votes as $vote)
                {
                    if ($vote->recipe->id == $id)
                    {
                        flash('Receta no puede eliminarse debido a que ya ha recibido votaciones', 'danger');
                        return redirect('misrecetas');
                    }
                }
                Recipe::destroy($id);
                flash('Receta eliminada exitosamente', 'success');
                return redirect('misrecetas');
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('misrecetas');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('misrecetas');
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

    public function syncIngredients(Recipe $recipe, array $tags)
    {
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

    public function getTags(Request $request)
    {
        if($request->ajax())
        {
            $tags_array = array();
            $tags = Recipe::findOrFail($request->id)->tags;
            foreach ($tags as $tag)
            {
                array_push($tags_array, $tag->name);
            }
            return response()->json(["tags"=>$tags_array]);
        }
    }

    public function canSubmitRecipe(User $user, $modality)
    {
        $recipes = $user->recipes;
        foreach ($recipes as $recipe)
        {
            if ($recipe->modality == $modality)
            {
                return false;
            }
        }
        return true;
    }
}
