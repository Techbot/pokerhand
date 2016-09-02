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


        if ($this->black->getHighCard() > $this->white->getHighCard()){

            return 'Black wins with' . $this->black->getHighCard();

        }

        if ($this->black->getHighCard() < $this->white->getHighCard()){

            return 'white wins with' . $this->white->getHighCard();

        }
        return 'Tie';
    }
}
