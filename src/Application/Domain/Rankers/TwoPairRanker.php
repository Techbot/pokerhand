<?php

namespace Application\Domain\Rankers;

class TwoPairRanker
{
    public static function comparePlayerCards($black, $white){

        if ($black->getSecondPairCards()==0 && $white->getSecondPairCards()==0){
            return 'none';
        }
        if ($black->getSecondPairCards()  > $white->getSecondPairCards()){
            return 'Black wins with 2 Pair of ' . $black->getSecondPairCards();
        }
        if ($black->getSecondPairCards() < $white->getSecondPairCards()){
            return 'white wins with 2 Pair of' . $white->getSecondPairCards();
        }
        return 'Tie';
    }
}
