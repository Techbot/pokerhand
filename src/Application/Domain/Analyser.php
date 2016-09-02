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
        $highCard=0;
        foreach ($this->hand->getRemainingHand() as $rank) {
            if ($rank->getInt() > $this->hand->getHighCard()) {
                $highCard=$rank->getInt();
            }
        }
        return $highCard;
    }

    public function pairCards()
    {
        $array=[];
        foreach ($this->hand->getRank() as $rank) {
            if (in_array($rank->getInt(),$array)) {
                return $rank->getInt();
            }
            $array[]=$rank->getInt();
        }
        return false;
    }

    public function twoPairCards()
    {
        $arrayOfPairs=[];
        foreach ($this->hand->getRank() as $rank) {
            if ($rank->getInt() == $this->hand->getPairCards())
            {
                //skip: either the first pair or a triple. Only interested in different pair
            }
            elseif (in_array($rank->getInt(), $arrayOfPairs)) {
               return $rank->getInt();
            }
            $arrayOfPairs[]=$rank->getInt();
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
        foreach ($this->hand->getRank() as $rank) {
            if ($rank->getInt() == $this->hand->getPairCards() ||$rank->getInt() == $this->hand->getSecondPairCards() ) {
                $arrayOfTriples[] = $rank->getInt();
                if (count($arrayOfTriples) === 3) {
                    return $rank->getInt();
                }
            }
        }
        return false;
    }

    public function pokerCards()
    {
        $arrayOfPokers = [];
        foreach ($this->hand->getRank() as $rank) {
            if ($rank->getInt() == $this->hand->getTripleCards()) {
                $arrayOfPokers[] = $rank->getInt();
                if (count($arrayOfPokers) === 4) {
                    return $rank->getInt();
                }
            }
        }
        return false;
    }

    public function straightCards()
    {
        $previousRank = 0;
        foreach ($this->hand->getScore( $this->hand->getRank()) as $key=>$rank) {
            if ($key==1){
                $previousRank= $rank->getInt();
                continue;
            }
            if ($rank->getInt() == ($previousRank + 1) && $key>1 ){
                $previousRank= $rank->getInt();
            }
            else{
              return false;
            }
        }
        return $rank->getInt();
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
