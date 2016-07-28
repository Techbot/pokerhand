<?php

namespace Tests\AppBundle\Controller;

use Application\Domain\Round;
use Application\Domain\Hand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoundTest extends WebTestCase
{
    private $round;

    public function testAllisOk()
    {
        $black = ['2H', '3D', '5S', '9C', 'KD'];
        $white = ['2C', '3H', '4S', '8C', 'AH'];
        $this->round= new Round( Hand::fromArray($black), Hand::fromArray( $white));

        $this->assertInstanceOf(Round::class, $this->round);

    }

    public function test_it_should_compare_two_hands(){

        $black = ['2H', '3D', '5S', '9C', 'KD'];
        $white = ['2C', '3H', '4S', '9C', 'AH'];
        $this->round= new Round( Hand::fromArray($black), Hand::fromArray( $white));
        $this->round->compare();

    }
}
