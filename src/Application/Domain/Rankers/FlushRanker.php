<?php

namespace Application\Domain\Rankers;

class FlushRanker
{
    public static function comparePlayerCards($black, $white){

        if ($black->getFlush()==0 && $white->getFlush()==0){
            return 'none';
        }

        if ($black->getFlush()  > $white->getFlush()){
            return 'Black wins with a Flush to  ' . $black->getFlush();
        }

        if ($black->getFlush() < $white->getFlush()){
            return 'white wins with a Flush to' . $white->getFlush();
        }
        return 'Tie';
    }
}
