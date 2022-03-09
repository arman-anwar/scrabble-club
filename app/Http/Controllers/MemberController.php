<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Carbon\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // Carbon::now()->format("Y-m-d")
        $input['join_date'] = Carbon::parse($request->join_date)->format("Y-m-d");

        Member::create($input);
        return redirect('members')->with('flash_message', 'Member Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);


        $player1_games = $member->player1->sortByDesc('player1_score');
        $player2_games = $member->player2->sortByDesc('player2_score');

        $games_won = 0;
        $games_lost = 0;

        foreach ($player1_games as $game) {
            if ($game->player1_score > $game->player2_score) {
                $games_won++;
            } else {
                $games_lost++;
            }
        }

        foreach ($player2_games as $game) {
            if ($game->player2_score > $game->player1_score) {
                $games_won++;
            } else {
                $games_lost++;
            }
        }

        $member['total_wins'] = $games_won;
        $member['total_losses'] =  $games_lost;
        $member['avg_score'] = floor($member->avgScore());

        $highest_score_game = null;
        $highest_score = 0;
        $highest_score_opponent = null;

        $player1_games = $player1_games->first();
        $player2_games = $player2_games->first();

        // dd($player1_games);

        if ($player1_games !== null && $player2_games !== null) {
            if ($player1_games->player1_score > $player2_games->player2_score) {
                $highest_score_game = $player1_games;
                $highest_score =  $player1_games->player1_score;
                $highest_score_opponent = $player1_games->player2->name;
            } else {
                $highest_score_game = $player2_games;
                $highest_score =  $player2_games->player2_score;
                $highest_score_opponent = $player2_games->player1->name;
            }
        } else {
            if ($player1_games !== null ) {
                $highest_score_game = $player1_games;
                $highest_score =  $player1_games->player1_score;
                $highest_score_opponent = $player1_games->player2->name;
            }
            if ($player2_games !== null ) {
                $highest_score_game = $player2_games;
                $highest_score =  $player2_games->player2_score;
                $highest_score_opponent = $player2_games->player1->name;
            }
        }

        $member['highest_score'] = $highest_score;
        $member['highest_score_opponent'] = $highest_score_opponent;
        if($highest_score_game){
            $member['highest_score_venue'] =  $highest_score_game->game_venue;
            $member['highest_score_date'] = $highest_score_game->game_date;    
        }

        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('member', $member);
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
        $member = Member::find($id);
        $input = $request->all();
        $input['join_date'] = Carbon::parse($request->join_date)->format("Y-m-d");
        $member->update($input);
        return redirect('members')->with('flash_message', 'Member Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Member::destroy($id);
        // disabled delete for now. It was not required
        return redirect('members')->with('flash_message', 'Member deleted!');
    }
}
