<?php
class TennisGame
{
    public $score = '';

    public function getScore($player_Score1, $player_Score2)
    {
        $tempScore = 0;

        if ($player_Score1 == $player_Score2) {
            switch ($player_Score1) {
                case 0:
                    $this->score = "Love-All";
                    break;
                case 1:
                    $this->score = "Fifteen-All";
                    break;
                case 2:
                    $this->score = "Thirty-All";
                    break;
                case 3:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;
            }
        } else if ($player_Score1 >= 4 || $player_Score2 >= 4) {
            $range = $player_Score1 - $player_Score2;
            if ($range == 1) $this->score = "Advantage player1";
            else if ($range == -1) $this->score = "Advantage player2";
            else if ($range >= 2) $this->score = "Win for player1";
            else $this->score = "Win for player2";
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) $tempScore = $player_Score1;
                else {
                    $this->score .= "-";
                    $tempScore = $player_Score2;
                }
                switch ($tempScore) {
                    case 0:
                        $this->score .= "Love";
                        break;
                    case 1:
                        $this->score .= "Fifteen";
                        break;
                    case 2:
                        $this->score .= "Thirty";
                        break;
                    case 3:
                        $this->score .= "Forty";
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}