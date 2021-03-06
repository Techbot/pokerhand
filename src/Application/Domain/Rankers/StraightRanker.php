<?php

namespace Application\Domain\Rankers;

class StraightRanker
{
    public static function comparePlayerCards($black, $white){
        if ($black->getStraighCards()==0 && $white->getStraighCards()==0){
            return 'none';
        }
        if ($black->getStraighCards()  > $white->getStraightCards()){
            return 'Black wins with Straight of ' . $black->getStraightCards();
        }
        if ($black->getStraightCards() < $white->getStraightCards()){
            return 'white wins with Straight of' . $white->getStraightCards();
        }
        return 'Tie';
    }
}
