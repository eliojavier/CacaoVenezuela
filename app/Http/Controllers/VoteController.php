<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Http\Requests\VoteRequest;
use App\Recipe;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function recipesPendingToVote()
    {
        $user = Auth::user();

        if($user->hasRole('judge')){
            $recipes =  DB::select(DB::raw('SELECT recipes.* 
                                        FROM recipes
                                        WHERE recipes.id NOT IN (SELECT DISTINCT votes.recipe_id
						                                        FROM votes
						                                        WHERE votes.user_id =' . $user->id . ')'));
            if(sizeof($recipes)>0)
            {
                $criteria = Criterion::where('phase', 1)->get();
                $scores = [''=>'Puntuación', 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10];

                return view ('admin.votes.pending.index', compact('recipes', 'criteria', 'scores'));
            }
        }
        flash('No tienes votaciones pendientes', 'success');
        return redirect ('admin');
    }

    public function recipesVoted()
    {
        $judge = Auth::user();
        $user = User::findOrFail($judge->id);

        $recipes = $user->recipesVoted()->get();

        if($recipes->count()>0){
            return view ('admin.votes.voted.index', compact('recipes'));
        }
        flash('No has realizado ninguna votación', 'success');
        return redirect ('admin');
    }

    public function showRecipeScore(Recipe $recipe)
    {
        return view ('admin.votes.voted.show', compact('recipe'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view ('admin.votes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $recipe = Recipe::findOrFail($id);
        $criteria = Criterion::where('phase', 1)->get();
        $scores = [''=>'Puntuación', 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10];

        return view ('admin.votes.create', compact('recipe', 'criteria', 'scores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @internal param Recipe $recipe
     * @internal param $user_id
     * @internal param User $user
     * @internal param $recipe_id
     * @internal param Recipe $recipe
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('judge'))
        {
            $criteria = Criterion::where('phase', 1)->select('id')->get();
            foreach ($criteria as $criterion)
            {
                if (!$request->has($criterion->id))
                {
                    flash('Debe votar en cada uno de los criterios', 'danger');
                    return back();
                }
            }

            $user_id = $user->id;
            $recipe_id = $request->recipe;

            foreach ($criteria as $criterion)
            {
                $criterion_id = $criterion->id;

                $vote = new Vote();

                $vote->user()->associate($user_id);
                $vote->criterion()->associate($criterion_id);
                $vote->recipe()->associate($recipe_id);
                $vote->score = $request->$criterion_id;
                $vote->save();
                flash('Votación realizada exitosamente', 'success');
                return redirect ('admin/votaciones/pendientes');
            }
        }

        flash('Debe tener rol de juez para realizar votación', 'danger');
        return redirect ('admin/votaciones/pendientes');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param Recipe $recipe
     * @internal param int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
