<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Http\Requests\VoteRequest;
use App\Recipe;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function recipesPendingToVote()
    {
        $recipes = Recipe::doesntHave('votes')->simplePaginate(1);
        $criteria = Criterion::where('phase', 1)->get();
        $scores = [''=>'Puntuación', 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10];

        return view ('admin.votes.index', compact('recipes', 'criteria', 'scores'));
    }

    public function recipesVoted()
    {
        $recipes = Recipe::has('votes')->simplePaginate(1);
        return view ('admin.votes.recipes_voted', compact('recipes'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest|Request $request
     * @return Response
     * @internal param Recipe $recipe
     * @internal param $user_id
     * @internal param User $user
     * @internal param $recipe_id
     * @internal param Recipe $recipe
     */
    public function store(VoteRequest $request)
    {
        $user = Auth::user();

        $criteria = Criterion::where('phase', 1)->select('id')->get();

        foreach ($criteria as $criterion)
        {
            if (!$request->has($criterion->id))
            {
                return redirect ('admin/votaciones/pendientes');
            }
        }

        if($user->hasRole('judge'))
        {
            $user_id = $user->id;
            $recipe_id = $request->recipe;
            foreach ($criteria as $criterion)
            {
                if ($request->has($criterion->id))
                {
                    $criterion_id = $criterion->id;

                    $vote = new Vote();

                    $vote->judge()->associate($user_id);
                    $vote->criterion()->associate($criterion_id);
                    $vote->recipe()->associate($recipe_id);
                    $vote->score = $request->$criterion_id;
                    $vote->save();
                }
            }
        }

        return redirect ('admin/votaciones/pendientes');

//        $comment = new App\Comment(['message' => 'A new comment.']);
//
//        $post = App\Post::find(1);
//
//        $post->comments()->save($comment);
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
        $recipe = Recipe::findOrFail($id);
        $criteria = Criterion::where('phase', 1)->get();
        $scores = [''=>'Puntuación', 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10];

        return view ('admin.votes.show', compact('recipe', 'criteria', 'scores'));
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
