<?php

namespace Application\Domain;

class Suit
{
    private $suit;

    public function __construct($suit)
    {
        $possibleValues = ['S', 'H', 'D', 'C'];
        if (in_array($suit, $possibleValues)) {
            $this->suit = $suit;
        }
    }
}
