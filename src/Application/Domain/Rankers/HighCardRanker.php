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

    public function comparePlayerCards(){

      //echo PHP_EOL . 'bl:' . $this->black->highCard() . PHP_EOL;
      //echo PHP_EOL .'wh:' . $this->white->highCard() . PHP_EOL;

        if ($this->black->getHighCard() > $this->white->getHighCard()){

            return 'Black wins with' . $this->black->getHighCard();

        }

        if ($this->black->getHighCard() < $this->white->getHighCard()){

            return 'white wins with' . $this->white->getHighCard();

        }
        return 'Tie';
    }
}
