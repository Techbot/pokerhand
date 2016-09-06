<?php

namespace Application\Domain\Rankers;

class HouseRanker
{
    public static function comparePlayerCards($black, $white){
        if ($black->getHouse()==0 && $white->getHouse()==0){
            return 'none';
        }
        if ($black->getHouse()  > $white->getHouse()){
            return 'Black wins with House of ' . $black->getHouse();
        }
        if ($black->getHouse() < $white->getFlush()){
            return 'white wins with House of' . $white->getHouse();
        }
        return 'Tie';
    }
}
