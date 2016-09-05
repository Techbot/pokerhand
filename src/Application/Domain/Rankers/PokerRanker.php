<?php

namespace Application\Domain\Rankers;

class PokerRanker
{
    public static function comparePlayerCards($black,$white){

        if ($black->getPokerCards()==0 && $white->getPokerCards()==0){
            return 'none';
        }

        if ($black->getTripleCards()  > $white->getTripleCards()){
            return 'Black wins with Pair of ' . $black->getTwoPairCards();
        }
        if ($black->getTripleCards() < $white->getTripleCards()){
            return 'white wins with Pair of' . $white->getTripleCards();
        }
        return 'Tie';
    }
}
