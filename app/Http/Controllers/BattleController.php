<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BattleController extends Controller
{
    public function createQuickMatch()
    {
        // 1. Get 3 random cards for the User
        $playerDeck = Pokemon::inRandomOrder()->limit(3)->get();

        // 2. Get 3 random cards for the Bot
        $botDeck = Pokemon::inRandomOrder()->limit(3)->get();

        // 3. Store the battle state in the Session 
        // (We use Session for now so we don't have to deal with DB tables yet)
        Session::put('battle_state', [
            'player' => [
                'name' => Auth::user()->name,
                'cards' => $playerDeck->toArray(),
                'active_index' => 0, // Start with the first card
            ],
            'bot' => [
                'name' => 'Team Rocket Bot',
                'cards' => $botDeck->toArray(),
                'active_index' => 0,
            ],
            'log' => ['The battle has begun!']
        ]);

        return redirect()->route('battle.arena');
    }

    public function attack()
    {
        // 1. Get the current battle state
        $state = session('battle_state');
        if (!$state) return redirect()->route('battle.init')->with('error', 'No active battle found!');

        // 2. Identify Attacker and Defender
        $playerCard = &$state['player']['cards'][$state['player']['active_index']];
        $botCard = &$state['bot']['cards'][$state['bot']['active_index']];

        // 3. Simple Damage Math (ATK - DEF)
        $damage = max(5, $playerCard['attack'] - ($botCard['defense'] / 2));
        $botCard['hp'] -= $damage;

        // 4. Update the Log
        $state['log'][] = "You used Attack! dealt " . round($damage) . " damage to " . $botCard['name'];

        // 5. Bot Counter-Attack (If still alive)
        if ($botCard['hp'] > 0) {
            $botDamage = max(5, $botCard['attack'] - ($playerCard['defense'] / 2));
            $playerCard['hp'] -= $botDamage;
            $state['log'][] = $botCard['name'] . " countered and dealt " . round($botDamage) . " damage!";
        } else {
            $state['log'][] = $botCard['name'] . " has fainted!";
        }

        // 6. Save back to Session and Refresh
        session(['battle_state' => $state]);
        return back();
    }
}