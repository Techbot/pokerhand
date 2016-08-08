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
        $array=[];
        foreach ($this->hand->getValue() as $value) {

            if ($value == $this->hand->getPairCards())
            {
                //skip
            }
            if (in_array($value,$array)) {

               return $value;
            }
            $array[]=$value;
        }
    }
}
