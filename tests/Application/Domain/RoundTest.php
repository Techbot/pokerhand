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
        $black = Hand::fromArray(['2H', '3D', '5S', '9C', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'AH']);
        $this->round= new Round( $black,  $white);

        $this->assertInstanceOf(Round::class, $this->round);
        $this->assertInstanceOf(Hand::class, $black);
        $this->assertInstanceOf(Hand::class, $white );
    }

    public function test_it_should_return_two_high_cards(){

        $black = Hand::fromArray(['2H', '3D', '5S', '9C', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'AH']);
        $this->round= new Round( $black,  $white);

        $this->round->compare();

        $this->assertEquals($black->getHighCard(),13);
        $this->assertEquals($white->getHighCard(),14);
    }

    public function test_it_should_return_one_pair(){

        $black = Hand::fromArray(['2H', '3D', '5S', 'KS', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'KH']);
        $this->round= new Round( $black,  $white);

        $this->round->compare();

        $this->assertEquals($black->getPairCards(), 'K');
        $this->assertEquals($white->getPairCards(), 0);

    }

    public function test_it_should_compare_two_pairs(){

        $black = ['2H', '3D', '5S', '6S', '6D'];
        $white = ['2C', '3H', '6H', '6C', 'KH'];
        $this->round= new Round( Hand::fromArray($black), Hand::fromArray( $white));
        $this->round->compare();

    }

    public function test_it_should_compare_two_sets_of_pairs(){

        $black = ['2H', '3D', '5S', '6S', '6D'];
        $white = ['2C', '3H', '4S', '6C', '6H'];
        $this->round= new Round( Hand::fromArray($black), Hand::fromArray( $white));
        $this->round->compare();

    }
}
