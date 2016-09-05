<?php

namespace Application\Domain\Rankers;

class HouseRanker
{
    public static function comparePlayerCards($black, $white){
        if ($black->getFlush()==0 && $white->getFlush()==0){
            return 'none';
        }
        if ($black->getFlush()  > $white->getFlush()){
            return 'Black wins with Pair of ' . $black->getFlush();
        }
        if ($black->getFlush() < $white->getFlush()){
            return 'white wins with Pair of' . $white->getFlush();
        }
        return 'Tie';
    }
}
