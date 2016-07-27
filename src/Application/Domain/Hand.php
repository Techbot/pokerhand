<?php

namespace Application\Domain;

class Hand
{
    private $hand;
    public $highCard =1;
    private $score;
    private $suit;
    private $value;
    private $card;


    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return mixed
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
            $card++;
        }
    }

    public function highCard()
    {
        foreach ($this->score as $score) {
            if ($score > $this->highCard) {

                $this->highCard = $score;
            }
        }
        return $this->getFace($this->highCard);
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

    private function getScore($card)
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
}
