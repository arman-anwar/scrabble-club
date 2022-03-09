<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';

    protected $fillable = ['name', 'address_1', 'address_2', 'post_code', 'country', 'join_date', 'tel'];


    public function player1()
    {
        return $this->hasMany(Game::class, 'player1_id');
    }

    public function player2()
    {
        return $this->hasMany(Game::class, 'player2_id');
    }

    public function avgScore()
    {
        $player1_score = $this->player1->sum('player1_score');
        $player2_score = $this->player2->sum('player2_score');
        $total_games =  $this->player1->count() +  $this->player2->count();
        if ($total_games == 0)
            return 0;
        return ($player2_score + $player1_score) / $total_games;
    }
}
