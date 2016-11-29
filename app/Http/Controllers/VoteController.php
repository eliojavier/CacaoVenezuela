<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Http\Requests\VoteRequest;
use App\Judge;
use App\Recipe;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function recipesPendingToVote()
    {
        $recipes = Recipe::doesntHave('votes')->simplePaginate(1);
        $criteria = Criterion::where('phase', 1)->get();

        $score = [1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10];
        return view ('admin.votes.index', compact('recipes', 'criteria', 'score'));
        
    }

    public function recipesVoted()
    {
        $recipes = Recipe::has('votes')->simplePaginate(1);
        return view ('admin.votes.index', compact('recipes'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.votes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteRequest $request)
    {
        //usuario logueado actualmente
        $user = Auth::user();

        //juez
        $judge = Judge::findOrFail($user->id);

        Vote::create($request->all());


//        $comment = new App\Comment(['message' => 'A new comment.']);
//
//        $post = App\Post::find(1);
//
//        $post->comments()->save($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
