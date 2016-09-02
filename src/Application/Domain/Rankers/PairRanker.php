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

        if ($this->black->getPairCards()==0 && $this->white->getPairCards()==0){
            return 'no pairs';
        }

        if ($this->black->getPairCards()  > $this->white->getPairCards()){
            return 'Black wins with Pair of ' . $this->black->getPairCards();
        }
        if ($this->black->getPairCards() < $this->white->getPairCards()){
            return 'white wins with Pair of' . $this->white->getPairCards();
        }
        return 'Tie';
    }
}
