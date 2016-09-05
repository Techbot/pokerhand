<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class TripleRanker
{
    public static function comparePlayerCards($black,$white){
        if ($black->getTripleCards()==0 && $white->getTripleCards()==0){
            return 'no triples';
        }
        if ($black->getTripleCards()  > $white->getTripleCards()){
            return 'Black wins with Pair of ' . $black->getTripleCards();
        }
        if ($black->getTripleCards() < $white->getTripleCards()){
            return 'white wins with Pair of' . $white->getTripleCards();
        }
        return 'Tie';
    }
}
