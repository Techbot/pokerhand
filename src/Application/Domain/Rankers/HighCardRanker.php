<?php
namespace Application\Domain\Rankers;

class HighCardRanker
{
    public static function comparePlayerCards($black, $white){
        if ($black->getHighCard() > $white->getHighCard()){
            return 'Black wins with' . $black->getHighCard();
        }
        if ($black->getHighCard() < $white->getHighCard()){
            return 'white wins with' . $white->getHighCard();
        }
        return 'Tie';
    }
}
