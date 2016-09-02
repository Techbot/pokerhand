<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class HouseRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards(){

        if ($this->black->getFlush()==0 && $this->white->getFlush()==0){

            return 'no flushes';

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
