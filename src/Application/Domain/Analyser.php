<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 08/08/16
 * Time: 13:22
 */

namespace Application\Domain;

class Analyser
{
    private $hand;
    private $highCard;

    function __construct($hand){
        $this->hand = $hand;
    }

    public function highCard()
    {
        foreach ($this->hand->getRemainingHand() as $score) {

            if ($score > $this->hand->getHighCard()) {

                $highCard=$score;
            }
        }
        return $highCard;
    }

    public function pairCards()
    {
        $array=[];
        foreach ($this->hand->getValue() as $value) {

            if (in_array($value,$array)) {

                return $value;
            }
            $array[]=$value;
        }
        return false;
    }

    public function twoPairCards()
    {
        $arrayOfPairs=[];
        foreach ($this->hand->getValue() as $value) {

            if ($value == $this->hand->getPairCards())
            {
                //skip: either the first pair or a triple. Only interested in different pair
            }
            elseif (in_array($value,$arrayOfPairs)) {

               return $value;
            }
            $arrayOfPairs[]=$value;
        }
    }

    public function houseCards()
    {
            if ($this->hand->getPairCards() && $this->hand->getSecondPairCards() && $this->hand->getTripleCards()            )
            {
                return true; // can probably find values from get pair and get triple
            }
            return false;
    }

    public function tripleCards()
    {
        $arrayOfTriples = [];
        foreach ($this->hand->getValue() as $value) {
            if ($value == $this->hand->getPairCards() ||$value == $this->hand->getSecondPairCards() ) {
                $arrayOfTriples[] = $value;
                if (count($arrayOfTriples) === 3) {
                    return $value;
                }
            }
        }
        return false;
    }

    public function pokerCards()
    {
        $arrayOfPokers = [];
        foreach ($this->hand->getValue() as $value) {
            if ($value == $this->hand->getTripleCards()) {
                $arrayOfPokers[] = $value;
                if (count($arrayOfPokers) === 4) {
                    return $value;
                }
            }
        }
        return false;
    }

    public function straightCards()
    {
        $previousRank = 0;

        foreach ($this->hand->getScore( $this->hand->getValue()) as $key=>$value) {

            if ($key==1){
                $previousRank= $value;
                continue;
            }
            if ($value == ($previousRank + 1) && $key>1 ){
                $previousRank= $value;
            }
            else{
                return false;
            }
        }
        return $value;
    }

    public function flushCards()
    {
        foreach($this->hand->getSuit() as $suit){
            $suitArray[] = serialize($suit);
        }
        if(count(array_unique($suitArray)) === 1) {
             return ($this->hand->getSuit()[1]->getString()); //returns suit, use get straight to determine rank
         }
        return false;
    }
}
