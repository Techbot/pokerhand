<?php

namespace Application\Domain;

use Application\Domain\Rankers\FlushRanker;
use Application\Domain\Rankers\HighCardRanker;
use Application\Domain\Rankers\PairRanker;
use Application\Domain\Rankers\PokerRanker;
use Application\Domain\Rankers\TripleRanker;
use Application\Domain\Rankers\TwoPairRanker;

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

    /**
     * @return string
     */
    public function compare()
    {
        echo 'Begin' . PHP_EOL;
        $result = $this->flushCompare();
        if ($result != 'no flushes') {
            return $result;
        }
        else {
            echo $result .PHP_EOL;
            $result =  $this->pokerCompare();
        }
        if ($result != 'no pokers') {
            return $result;
        }
        else {
            echo $result . PHP_EOL;
            $result =  $this->tripleCompare();
        }
        if ($result != 'no triples') {
            return $result;
        }
        else {
            echo $result . PHP_EOL;
            $result =  $this->twoPairCompare();
        }
        if ($result != 'no twoPair') {
            return $result;
        }
        else {
            echo $result . PHP_EOL;
            $result =  $this->pairCompare();
        }
        if ($result != 'no pairs') {
            return $result;
        }
        else {
            echo $result . PHP_EOL;
            $result =  $this->highCardCompare();
            echo  $result .  PHP_EOL;
        }
    }

    function remove($compareToOne, $compareToTwo)
    {
        $index = 1;
        foreach ($this->handOne->remainingHand as $rank) {
            if ($rank->getInt() == $compareToOne) {
                unset($this->handOne->remainingHand[$index]);
            }
            $index++;
        }
        $index = 1;
        foreach ($this->handTwo->remainingHand as $rank) {
            if ($rank->getInt() == $compareToTwo) {
                unset($this->handTwo->remainingHand[$index]);
            }
            $index++;
        }
    }

    function flushCompare()
    {
        echo 'flush Test' . PHP_EOL;
        $this->rankers = new FlushRanker($this->handOne, $this->handTwo);
        $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie or no flushes
        if ($this->thing == 'Tie') {
            $this->nextHighCard();
        } else {
            return $this->thing;
        }
    }

    function pokerCompare()
    {
        echo 'poker Test' . PHP_EOL;
        $this->rankers = new PokerRanker( $this->handOne, $this->handTwo);
        $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie or no pokers
        if ($this->thing == 'Tie') {
            $this->nextHighCard();
        } else {
            return $this->thing;
        }
    }


    function highCardCompare()
        {
            echo 'High Card Test' . PHP_EOL;
            $this->rankers = new HighCardRanker($this->handOne, $this->handTwo);
            $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie
          //  echo $this->thing;
            if ($this->thing == 'Tie') {
                $this->nextHighCard();
            } else {
                return $this->thing;
            }
        }

    function nextHighCard()
    {
        echo 'Next High Card Test' . PHP_EOL;
        $this->remove(
            $this->handOne->getHighCard(),
            $this->handTwo->getHighCard()
        );
        $this->handOne->setHighCard(0);
        $this->handTwo->setHighCard(0);
        $analyser1 = new Analyser($this->handOne);
        $analyser2 = new Analyser($this->handTwo);

        $this->handOne->setHighCard ($analyser1->highCard());
        $this->handTwo->setHighCard ($analyser2->highCard());

        if ($this->handOne->getHighCard() > $this->handTwo->getHighCard()) {

            echo 'black has won';
            return 'Black wins';
        }
        if ($this->handOne->getHighCard() < $this->handTwo->getHighCard()) {

            echo 'white has won';
            return 'white wins';
        } else {
            $this->nextHighCard();
        }
    }

    function pairCompare()
    {
        echo 'Pair Test' . PHP_EOL;
        $this->rankers = new PairRanker($this->handOne, $this->handTwo);
        $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie
        if ($this->thing == 'Tie') {
            $this->remove($this->handOne->getPairCards(), $this->handTwo->getPairCards());
        } else {
            return $this->thing;
        }
    }

    function tripleCompare()
    {
        echo 'Triple Test' . PHP_EOL;
        $this->rankers = new TripleRanker($this->handOne, $this->handTwo);
        $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie or no Triples
        if ($this->thing == 'Tie') {
            $this->nextHighCard();
        } else {
            return $this->thing;
        }
    }

    function twoPairCompare()
    {
        echo 'Two Pair Test' . PHP_EOL;
        $this->rankers = new TwoPairRanker( $this->handOne, $this->handTwo);
        $this->thing = $this->rankers->comparePlayerCards();// Black wins, White wins or Tie or no TwoPair
        if ($this->thing == 'Tie') {
            $this->nextHighCard();
        } else {
            return $this->thing;
        }
    }
}

