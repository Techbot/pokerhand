<?php

namespace Application\Domain\Rankers;

use Application\Domain\Hand;

class FlushRanker
{
    public function __construct(Hand $black,Hand $white)
    {
        $this->black = $black;
        $this->white = $white;
    }

    public function comparePlayerCards(){

        if ($this->black->getFlush()==0 && $this->white->getFlush()==0){

            return 'no flushes';

        }

        if ($this->black->getFlush()  > $this->white->getFlush()){
            return 'Black wins with a Flush to  ' . $this->black->getFlush();
        }

        if ($this->black->getFlush() < $this->white->getFlush()){
            return 'white wins with a Flush to' . $this->white->getFlush();
        }
        return 'Tie';
    }
}
