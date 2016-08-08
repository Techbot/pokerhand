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
    public function highCard()
    {
        foreach ($this->remainingHand as $score) {

            if ($score > $this->highCard) {

                $this->highCard = $score;
            }
        }
        return $this->highCard;
    }

    public function pairCards()
    {
        $array=[];
        foreach ($this->value as $value) {

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
        foreach ($this->value as $value) {

            if ($value == $this->pairCards)
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
