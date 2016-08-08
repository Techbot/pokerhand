<?php

namespace Application\Domain;

use Application\Domain\Rankers\HighCardRanker;
use Application\Domain\Rankers\PairRanker;

class Round
{
    private $handOne;
    private $handTwo;
    public $result;
    public $rankers;
    private $thing;

    public function __construct(Hand $handOne, Hand $handTwo)
    {
        $this->handOne = $handOne;
        $this->handTwo = $handTwo;
    }

    public function compare()
    {
        $this->rankers[1] = new HighCardRanker($this->handOne, $this->handTwo);
        $this->thing = $this->rankers[1]->comparePlayerCards();// Black wins, White wins or Tie
        if ($this->thing == 'Tie') {

            $this->match($this->handOne->getHighCard(), $this->handTwo->getHighCard());

        } else {
            return $this->thing;
        }

        //return 'Next Card';
        $this->handOne->remainingHand = $this->handOne->getValue();
        $this->rankers[2] = new PairRanker($this->handOne, $this->handTwo);

        $this->thing = $this->rankers[2]->comparePlayerCards();// Black wins, White wins or Tie
        if ($this->thing == 'Tie') {

            $this->match($this->handOne->getPairCards(), $this->handTwo->getPairCards());

        } else {
            return $this->thing;
        }

        //$this->rankers[] = new TripleRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new TwoPairRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new PokerRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new FlushRanker( $this->handOne, $this->handTwo);
        // $this->result = 'White wins. - with high card: Ace';

    }


    function match($compareToOne, $compareToTwo)
    {
        $index = 1;
        foreach ($this->handOne->remainingHand as $element) {

            if ($element == $compareToOne) {
                unset($this->handOne->remainingHand[$index]);
            }
            $index++;
        }

        $index = 1;
        foreach ($this->handTwo->remainingHand as $element) {
            if ($element == $compareToTwo) {
                unset($this->handTwo->remainingHand[$index]);
            }
            $index++;
        }
        $this->handOne->setHighCard(0);
        $this->handTwo->setHighCard(0);
    }
}
