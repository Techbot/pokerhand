<?php

namespace Application\Domain;

class Rank
{
    private $rank;

    public function __construct($rank)
    {
        $possibleValues = [2, 3, 4, 5, 6, 7, 8, 9, 'T', 'J', 'Q', 'K', 'A'];
        if (in_array($rank, $possibleValues)) {
            $this->rank = $rank;
        }
    }
}
