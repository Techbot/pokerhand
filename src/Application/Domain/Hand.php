<?php

namespace Application\Domain;

use Application\Domain\Analyser;

class Hand
{
    public $remainingHand;
    private $hand;

    private $pairCards = 0;
    private $secondPairCards = 0;
    private $tripleCards = 0;
    private $pokerCards = 0;
    private $straightCards = 0;
    private $flush = 0;
    private $house = 0;
    private $score;
    private $suit;
    private $rank;
    private $card;
    private $highCard = 0;

    private function __construct($hand)
    {
        $this->hand = $hand;
        $this->evaluate();
    }

    public static function fromArray(array $hand)
    {
        $newHand = new Hand($hand);
        return $newHand;
    }

    public function evaluate()
    {
        $cardnumber = 1;
        foreach ($this->hand as $suit => $card) {
            $this->card[$cardnumber] = $card;
            $this->rank[$cardnumber] =  new Rank(substr($card, 0, 1));
            $this->suit[$cardnumber] = new Suit(substr($card, 1, 1));
            $this->score[$cardnumber] = $this->getScore($this->rank[$cardnumber]); // in case it's a face card
            $this->remainingHand[$cardnumber] = $this->score[$cardnumber];
            $cardnumber++;
        }
        $analyser = new Analyser($this);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $this->highCard = $analyser->highCard();


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $this->pairCards = $analyser->pairCards();

        ///////////////////////////////////Only test for two pair if you already got one pair///////////////////////////

        if ($this->pairCards) {
            $this->secondPairCards = $analyser->twoPairCards();
        };

        //////////////////////////////////Only test for triple if you already got a pair////////////////////////////////

        if ($this->pairCards) {
            $this->tripleCards = $analyser->tripleCards();
        };

        ///////////////////////////////////Only test for Poker if you already got a triple//////////////////////////////

        if ($this->tripleCards) {
            $this->pokerCards = $analyser->pokerCards();
        };

        ///////////////////////////////////Only test for straight if you have no duplicates/////////////////////////////

        if (!$this->pairCards) {
            $this->straightCards = $analyser->straightCards();
        };

        ///////////////////////////////////Only test for flush if you have a straight/////////////////////////////

        if ($this->straightCards) {
            $this->flush = $analyser->flushCards();
        };

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($this->pairCards && $this->tripleCards) {
            $this->house = $analyser->houseCards();
        };

        print_r($this);
    }

    /**
     * @return int
     */
    public function getFlush()
    {
        return $this->flush;
    }

    /**
     * @return int
     */
    public function getStraightCards()
    {
        return $this->straightCards;
    }

    /**
     * @return int
     */
    public function getPokerCards()
    {
        return $this->pokerCards;
    }

    /**
     * @return int
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @return int
     */
    public function getTripleCards()
    {
        return $this->tripleCards;
    }

    /**
     * @return int
     */
    public function getSecondPairCards()
    {
        return $this->secondPairCards;
    }

    /**
     * @return int
     */
    public function getHighCard()
    {
        return $this->highCard;
    }

    /**
     * @return int
     */
    public function getPairCards()
    {
        return $this->pairCards;
    }

    /**
     * @return mixed
     */
    public function getRemainingHand()
    {
        return $this->remainingHand;
    }

    public function setHighCard($rank)
    {
        $this->highCard = $rank;
        //$this->highCard = $rank->getInt();
    }

    private function getFace($card)
    {
        if ($card == 14) {
            return 'Ace';
        }
        if ($card == 13) {
            return 'King';
        }
        if ($card == 12) {
            return 'Queen';
        }
        if ($card == 11) {
            return 'Jack';
        }
        return $card;
    }

    public function getScore($card)
    {
        if ($card == 'A') {
            return 14;
        }
        if ($card == 'K') {
            return 13;
        }
        if ($card == 'Q') {
            return 12;
        }
        if ($card == 'J') {
            return 11;
        }
        return $card;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return array
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }
}
