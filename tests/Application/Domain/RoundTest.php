<?php

namespace Tests\AppBundle\Controller;

use Application\Domain\Round;
use Application\Domain\Hand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoundTest extends WebTestCase
{
    private $round;
    private $resultant;

/*
    public function testAllisOk()
    {
        $black = Hand::fromArray(['2H', '3D', '5S', '9C', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'KH']);
        $this->round= new Round( $black,  $white);

        $this->assertInstanceOf(Round::class, $this->round);
        $this->assertInstanceOf(Hand::class, $black);
        $this->assertInstanceOf(Hand::class, $white );
        $this->round->compare();
    }
*/
    public function test_it_should_return_two_high_cards(){

        $black = Hand::fromArray(['3H', '4D', '6S', '8C', 'KD']);
        $white = Hand::fromArray(['2C', '4H', '6S', '8C', 'KH']);
        $this->round = new Round( $black,  $white);
        $this->resultant = $this->round->compare();

        echo 'the returned values is ' .  $this->resultant . PHP_EOL;

        echo 'end' . PHP_EOL;

        //$this->assertEquals($black->getHighCard(),13);
        //$this->assertEquals($white->getHighCard(),13);
    }

/*

       public function test_it_should_return_one_pair(){

           $black = Hand::fromArray(['2H', '3D', '5S', 'KS', 'KD']);
           $white = Hand::fromArray(['2C', '3H', '5S', '8C', 'KH']);
           $this->round= new Round( $black,  $white);
           $this->round->compare();
           $this->assertEquals($black->getPairCards(), 13);
           $this->assertEquals($white->getPairCards(), 0);

       }

          public function test_it_should_return_two_pairs(){

              $black = Hand::fromArray(['2H', '3D', '5S', '6S', '6D']);
              $white = Hand::fromArray( ['2C', '3H', '6H', '6C', 'KH']);
              $this->round= new Round( $black, $white);
              $this->round->compare();

              $this->assertEquals($black->getPairCards(), 6);
              $this->assertEquals($white->getPairCards(), 6);
          }

          public function test_it_should_return_two_sets_of_pairs(){

              $black =  Hand::fromArray(['2H', '3D', '3S', '6S', '6D']);
              $white =  Hand::fromArray(['2C', '3H', '3S', '6C', '6H']);

              $this->round= new Round($black, $white);

              $this->round->compare();

              $this->assertEquals( 3, $black->getPairCards());
              $this->assertEquals( 3, $white->getPairCards());

              $this->assertEquals( 6, $black->getSecondPairCards());
              $this->assertEquals( 6, $white->getSecondPairCards());
          }

          public function test_it_should_return_one_triple(){

              $black = Hand::fromArray(['2H', '3D', 'KS', 'KC', 'KD']);
              $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'KH']);
              $this->round= new Round( $black,  $white);

              $this->round->compare();

              $this->assertEquals(13, $black->getTripleCards());
              $this->assertEquals( 0, $white->getTripleCards());

          }

          public function test_it_should_return_one_poker(){

              $black = Hand::fromArray(['2H', 'KH', 'KS', 'KC', 'KD']);
              $white = Hand::fromArray(['2C', '3H', '4S', '8C', '9H']);
              $this->round= new Round( $black,  $white);

              $this->round->compare();

              $this->assertEquals(13, $black->getPokerCards());
              $this->assertEquals( 0, $white->getPokerCards());

          }

          public function test_it_should_return_one_straight(){

              $black = Hand::fromArray(['2H', '3H', '4S', '5C', '6D']);
              $white = Hand::fromArray(['AC', '3H', '4S', '8C', '9H']);
              $this->round= new Round( $black,  $white);

              $this->round->compare();


              $this->assertEquals( 6, $black->getStraightCards());
              $this->assertEquals( 0, $white->getStraightCards());
          }

          public function test_it_should_return_one_flush(){

              $black = Hand::fromArray(['2D', '3D', '4D', '5D', '6D']);
              $white = Hand::fromArray(['2C', '3H', '4S', '5C', '6H']);
              $this->round= new Round( $black,  $white);

              $this->round->compare();

              $this->assertEquals('D', $black->getFlush());
              $this->assertEquals( 0, $white->getFlush());
          }

          public function test_it_should_return_one_house(){

              $black = Hand::fromArray(['2D', '2H', '4D', '4C', '4S']);
              $white = Hand::fromArray(['2C', '3H', '3S', '5C', '6H']);
              $this->round= new Round( $black,  $white);

              $this->round->compare();

              $this->assertEquals( true, $black->getHouse());
              $this->assertEquals( 0, $white->getHouse());
          }
*/




          }
