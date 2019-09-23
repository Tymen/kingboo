<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameEngineController extends Controller
{
    public function start($level = 0, $gameOver = false)
    {
        $score = Session::get("score");
        $random = array();
        if ($score < 5) {
            for ($i = 0; $i < 1; $i++) {
                $random[$i] = mt_rand(1, 5);
            }
        } elseif ($score == 5) {
            for ($i = 0; $i < 3; $i++) {
                $random[$i] = mt_rand(1, 5);
            }
        } elseif ($score == 10) {
            for ($i = 0; $i < 3; $i++) {
                $random[$i] = mt_rand(1, 4);
            }
        } elseif ($score == 15) {
            for ($i = 0; $i < 2; $i++) {
                $random[$i] = mt_rand(1, 3);
            }
        } elseif ($score == 20) {
            for ($i = 0; $i < 2; $i++) {
                $random[$i] = mt_rand(1, 3);
            }
        } elseif ($score == 25) {
            for ($i = 0; $i < 2; $i++) {
                $random[$i] = mt_rand(1, 4);
            }
        }
        elseif ($score == 30) {
            for ($i = 0; $i < 3; $i++) {
                $random[$i] = mt_rand(1, 5);
            }
        }
        // After every boss fight this will be the ghost's number behind the doors
        if ($score > 5) {
            for ($i = 0; $i < 1; $i++) {
                $random[$i] = mt_rand(1, 4);
            }
        }
        if ($score > 10) {
            for ($i = 0; $i < 1; $i++) {
                $random[$i] = mt_rand(1, 3);
            }
        }
        if ($score > 15) {
            for ($i = 0; $i < 1; $i++) {
                $random[$i] = mt_rand(1, 2);
            }
        }
        if ($score > 20) {
            for ($i = 0; $i < 2; $i++) {
                $random[$i] = mt_rand(1, 3);
            }
        }
        if ($score > 25) {
            for ($i = 0; $i < 2; $i++) {
                $random[$i] = mt_rand(1, 4);
            }
        }
        if ($score > 30) {
            for ($i = 0; $i < 3; $i++) {
                $random[$i] = mt_rand(1, 5);
            }
        }
        Session::put("ghost", $random);
        if ($score == null) {
            Session::put("score", 0);
        }
        $bossArray = [5, 10, 15, 20, 25, 30];
        $Boss = false;
        foreach($bossArray as $boss) {
            if($boss == $score) {
                $Boss = true;
            }
        }
        if($Boss){
            $newRoom = null;
        } else {
            $newRoom = "You entered a new room! But there is to much noise to guess the amount of ghosts!";
        }
        return view("castle")->with("score", $level)->with("gameOver", $gameOver)->with("newRoom", $newRoom);
    }
public function test()
{
        return view('index');
}
    public function gameEngine(Request $request)
    {
        if ($request->reset) {
            Session::flush();
            return redirect("/");
        }
        // Dit checkt of er een score is als dat het geval is zegt hij dat Variable score data uit de Sessie moet pakken. Anders zegt hij dat $score 0 is.


        $score = Session::get("score");
        $gameover = Session::get("gameover");
        if($gameover) {
            return $this->start($score, true);
        }else {
        // Wanneer je een getal/deur invoert gaat hij kijken of je getal overeen komt met de ghostdoor
        // zo niet dan krijg je bij je score 1 punt er bij en word het in de sessie verplaatst.
        $ghostDoor = null;
        $random = Session::get("ghost");
        $userInput = ($request->getal);
        if ($userInput) {
            foreach ($random as $ghostdoor) {
                if ($ghostdoor == $userInput) {
                    Session::put("gameover", true);
                    return $this->start($score, true);
                }
            }
            $score = $score + 1;
            Session::put("gameStart", true);
            Session::put("score", $score);
        }
        }
        return $this->start($score);
    }
}
