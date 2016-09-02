<?php

namespace Application\Domain;

class Rank
{
    private $rank;

    /**
     * @return mixed
     */
    public function getInt()
    {
        $int = $this->rank;
        if ($int == 'T') {
            return 10;
        }
        if ($int == 'J') {
            return 11;
        }
        if ($int == 'Q') {
            return 12;
        }
        if ($int == 'K') {
            return 13;
        }
        if ($int == 'A') {
            return 14;
        }
        return $int;
    }

    public function getFace()
    {
        $card = $this->rank;
        if ($card == 14) {
            return 'A';
        }
        if ($card == 13) {
            return 'K';
        }
        if ($card == 12) {
            return 'Q';
        }
        if ($card == 11) {
            return 'J';
        }
        if ($card == 10) {
            return 'T';
        }
        return $card;
    }

    public function __construct($rank)
    {
        $possibleValues = [2, 3, 4, 5, 6, 7, 8, 9, 'T', 'J', 'Q', 'K', 'A'];
        if (in_array($rank, $possibleValues)) {
            $this->rank = $rank;
        }
    }
}
