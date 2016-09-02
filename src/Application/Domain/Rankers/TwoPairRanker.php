<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class TwoPairRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards(){

        if ($this->black->getSecondPairCards()==0 && $this->white->getSecondPairCards()==0){
            return 'no twoPair';
        }


        if ($this->black->getSecondPairCards()  > $this->white->getSecondPairCards()){
            return 'Black wins with Pair of ' . $this->black->getSecondPairCards();
        }
        if ($this->black->getSecondPairCards() < $this->white->getSecondPairCards()){
            return 'white wins with Pair of' . $this->white->getSecondPairCards();
        }
        return 'Tie';
    }
}
