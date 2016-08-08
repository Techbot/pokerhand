<?php

namespace Application\Domain;

use Application\Domain\Analyser;

class Hand
{
    public $remainingHand;
    private $hand;
    private $pairCards = 0;
    private $secondPairCards = 0;
    private $score;
    private $suit;
    private $rank;
    private $card;
    private $highCard = 0;

    public static function fromArray(array $hand)
    {
        $newHand = new Hand($hand);
        return $newHand;
    }

    public function evaluate()
    {
        $card = 1;
        foreach ($this->hand as $suit => $card) {
            $this->card[$card] = $card;
            $this->rank[$card] = substr($card, 0, 1);
            $this->suit[$card] = new Suit(substr($card, 1, 1));
            $this->score[$card] = $this->getScore($this->rank[$card]); // in case it's a face card
            $this->remainingHand[$card] = $this->score[$card];
            $card++;
        }
        $analyser = new Analyser($this);

        ///////////////////////////////////////
        $this->highCard = $analyser->highCard();


        ///////////////////////////////////////
        $this->pairCards = $analyser->pairCards();

        ///////////////////////////////////////
        if ($this->pairCards) {
            $this->secondPairCards = $analyser->twoPairCards();
        };

        ///////////////////////////////////////

        if ($this->pairCards) {
            //      $this->tripleCards = $analyser->tripleCards();
        };
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

    private function __construct($hand)
    {

        $this->hand = $hand;

        $this->evaluate();
    }


    public function setHighCard($rank)
    {
        $this->highCard = $rank;
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
    public function getValue()
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
