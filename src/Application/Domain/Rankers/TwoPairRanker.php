<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class PairRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards(){

        if ($this->black->getTwoPairCards()  > $this->white->getTwoPairCards()){
            return 'Black wins with Pair of ' . $this->black->getTwoPairCards();
        }
        if ($this->black->getTwoPairCards() < $this->white->getTwoPairCards()){
            return 'white wins with Pair of' . $this->white->getTwoPairCards();
        }
        return 'Tie';
    }
}
