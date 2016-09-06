<?php

namespace Application\Domain\Rankers;

class PokerRanker
{
    public static function comparePlayerCards($black,$white){

        if ($black->getPokerCards()==0 && $white->getPokerCards()==0){
            return 'none';
        }

        if ($black->getTripleCards()  > $white->getTripleCards()){
            return 'Black wins with Poker of ' . $black->getTwoPairCards();
        }
        if ($black->getTripleCards() < $white->getTripleCards()){
            return 'white wins with Poker of' . $white->getTripleCards();
        }
        return 'Tie';
    }
}
