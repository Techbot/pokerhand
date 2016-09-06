<?php

namespace Application\Domain\Rankers;

class TripleRanker
{
    public static function comparePlayerCards($black,$white){
        if ($black->getTripleCards()==0 && $white->getTripleCards()==0){
            return 'none';
        }
        if ($black->getTripleCards()  > $white->getTripleCards()){
            return 'Black wins with Triple of ' . $black->getTripleCards();
        }
        if ($black->getTripleCards() < $white->getTripleCards()){
            return 'white wins with Triple of' . $white->getTripleCards();
        }
        return 'Tie';
    }
}
