<?php

namespace Application\Domain\Rankers;

class PairRanker
{
    public static function comparePlayerCards($black, $white){
        if ($black->getPairCards()==0 && $white->getPairCards()==0){
            return 'none';
        }
        if ($black->getPairCards()  > $white->getPairCards()){
            return 'Black wins with Pair of ' . $black->getPairCards();
        }
        if ($black->getPairCards() < $white->getPairCards()){
            return 'white wins with Pair of' . $white->getPairCards();
        }
        return 'Tie';
    }
}
