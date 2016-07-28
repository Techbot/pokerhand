<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class HighCardRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards($i){

      echo PHP_EOL . 'bl:' . $this->black->highCard() . PHP_EOL;
      echo PHP_EOL .'wh:' . $this->white->highCard() . PHP_EOL;

        if ($this->black->highCard() > $this->white->highCard()){

            return 'Black wins with' . $this->black->highCard();

        }

        if ($this->black->highCard() < $this->white->highCard()){

            return 'white wins with' . $this->white->highCard();

        }

        return 'Tie';
    }

}
