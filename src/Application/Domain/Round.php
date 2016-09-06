<?php

namespace Application\Domain;

class Round
{
    private $handOne;
    private $handTwo;
    public $result;
    public $rankers;
    private $thing;
    private $cardRankers = [
        'Application\Domain\Rankers\FlushRanker',
        'Application\Domain\Rankers\PokerRanker',
        'Application\Domain\Rankers\TripleRanker',
        'Application\Domain\Rankers\TwoPairRanker',
        'Application\Domain\Rankers\PairRanker',
        'Application\Domain\Rankers\HighCardRanker'
    ];

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
        foreach ($this->cardRankers as $cardRanker) {

            echo $cardRanker . PHP_EOL;
            $cb = [$cardRanker, 'comparePlayerCards'];
            $this->thing = call_user_func($cb, $this->handOne, $this->handTwo);
            echo $this->thing . PHP_EOL;
            if ($this->thing == 'none') {
                continue;
            }
            if ($this->thing == 'Tie') {
                $this->nextHighCard();
            } else {

                echo $this->thing . PHP_EOL;

                return $this->thing;
            }
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

    function nextHighCard()
    {
        echo 'Next High Card Test' . PHP_EOL;
        if (count($this->handOne->getRemainingHand()) > 1) {
            $this->remove(
                $this->handOne->getHighCard(),
                $this->handTwo->getHighCard()
            );

            $this->handOne->setHighCard(0);
            $this->handTwo->setHighCard(0);
            $analyser1 = new Analyser($this->handOne);
            $analyser2 = new Analyser($this->handTwo);

            $this->handOne->setHighCard($analyser1->highCard());
            $this->handTwo->setHighCard($analyser2->highCard());

            echo($this->handOne->getHighCard());
            echo($this->handTwo->getHighCard());

            if ($this->handOne->getHighCard() > $this->handTwo->getHighCard()) {
                echo('black wins with High Card ' . $this->handOne->getHighCard() . PHP_EOL);
                $message = 'Black wins';
                return $message; // seems to get lost in recursive call
            }
            if ($this->handOne->getHighCard() < $this->handTwo->getHighCard()) {

                echo('white wins with High Card ' . $this->handTwo->getHighCard() . PHP_EOL);
                $message = 'White wins';
                return $message;
            } else {
                print_r($this->handOne->getRemainingHand());
                if (count($this->handOne->getRemainingHand() == 1)) {
                    // todo: put in final check: if no remain cards to be removed ie Tie
                    $message = $this->nextHighCard();
                    //echo $this->message;
                    return $message;
                }


            }
        } else {
            echo('Super Tie ' . PHP_EOL);
        }
    }
}
