<?php

namespace Application\Domain;

use Application\Domain\Rankers\HighCardRanker;

class Round
{

    private $handOne;
    private $handTwo;
    public $result;
    public $rankers;
    private $thing;

    public function __construct(Hand $handOne,Hand $handTwo)
    {
        $this->handOne = $handOne;
        $this->handTwo = $handTwo;

    }

    public function compare()
    {
        $this->rankers = new HighCardRanker($this->handOne, $this->handTwo);


        for ($i = 1; $i <= 5;$i++) {
            $this->thing = $this->rankers->comparePlayerCards($i);// Black wins, White wins or Tie
            if ($this->thing == 'Tie') {

                $this->match();

            }else{
             return $this->thing;
            }
        }

        return 'Next Card';
        //$this->rankers[] = new PairRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new TripleRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new TwoPairRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new PokerRanker( $this->handOne, $this->handTwo);
        //$this->rankers[] = new FlushRanker( $this->handOne, $this->handTwo);
       // $this->result = 'White wins. - with high card: Ace';

    }


function match()
{

        echo 'c:' . count($this->handOne->remainingHand) . PHP_EOL;
        print_r($this->handOne->remainingHand);


        $index = 1;
        foreach ($this->handOne->remainingHand as $element) {
            if ($element == $this->handOne->highCard()) {
                unset($this->handOne->remainingHand[$index]);
            }
            $index++;
        }

        echo 'c:' . count($this->handOne->remainingHand) . PHP_EOL;
        print_r($this->handOne->remainingHand);

        echo 'c2:' . count($this->handTwo->remainingHand) . PHP_EOL;
        print_r($this->handTwo->remainingHand);
// exit();
        $index = 1;
        foreach ($this->handTwo->remainingHand as $element) {
            if ($element == $this->handTwo->highCard()) {
                unset($this->handTwo->remainingHand[$index]);
            }
            $index++;
        }

        echo 'c2:' . count($this->handTwo->remainingHand) . PHP_EOL;
        print_r($this->handTwo->remainingHand);

    $this->handOne->setHighCard(0);
    $this->handTwo->setHighCard(0);
    echo 'fin' . $this->handOne->highCard();
    echo 'fin' . $this->handTwo->highCard();



}







}
