<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class PokerRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards(){

        if ($this->black->getPokerCards()==0 && $this->white->getPokerCards()==0){
            return 'no pokers';
        }

        if ($this->black->getTripleCards()  > $this->white->getTripleCards()){
            return 'Black wins with Pair of ' . $this->black->getTwoPairCards();
        }
        if ($this->black->getTripleCards() < $this->white->getTripleCards()){
            return 'white wins with Pair of' . $this->white->getTripleCards();
        }
        return 'Tie';
    }
}
