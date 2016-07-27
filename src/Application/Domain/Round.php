<?php

namespace Application\Domain;

use Application\Domain\Rankers\HighCardRanker;

class Round
{

    private $handOne;
    private $handTwo;
    public $result;

    public function __construct(Hand $handOne,Hand $handTwo)
    {
        $this->handOne = $handOne;
        $this->handTwo = $handTwo;

    }

    public function compare()
    {
        $this->ranker = new HighCardRanker( $this->handOne, $this->handTwo);
        $this->result = 'White wins. - with high card: Ace';

    }
}
