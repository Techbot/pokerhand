<?php

namespace Application\Domain;

use Application\Domain\Analyser;

class Hand
{
    private $hand;
    public $highCard = 0;
    public $pairCards = 0;
    public $secondPairCards = 0;
    private $score;
    public $remainingHand;
    private $suit;
    private $value;
    private $card;



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

    private function __construct($hand){

        $this->hand =$hand;

        $this->evaluate();
    }

    public static function fromArray(array $hand){

        $newHand = new Hand($hand);

        return $newHand;
    }

    public function evaluate(){
        $card= 1;
        foreach($this->hand as $suit => $value){
            $this->card[$card] = $value;
            $this->value[$card] = substr($value,0,1);
            $this->suit[$card] = substr($value,1,1);
            $this->score[$card] = $this->getScore($this->value[$card]);
            $this->remainingHand[$card] = $this->score[$card];
            $card++;
        }
        $analyser = new Analyser();

        $this->highCard = $analyser->highCard();
        $this->pairCards = $analyser->pairCards();
        if  ($this->pairCards()){
            $this->secondPairCards = $analyser->twoPairCards();
        };



    }

    public function setHighCard($value)
    {
       $this->highCard = $value;
    }


    private function getFace($card)
    {
        if($card==14){
            return 'Ace';
        }
        if($card==13){
            return 'King';
        }
        if($card==12){
            return 'Queen';
        }
        if($card==11){
            return 'Jack';
        }
        return $card;
    }

    public function getScore($card)
    {
        if($card=='A'){
            return 14;
        }
        if($card=='K'){
            return 13;
        }
        if($card=='Q'){
            return 12;
        }
        if($card=='J'){
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
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }
}
