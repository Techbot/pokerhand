<?php

namespace Tests\AppBundle\Controller;

use Application\Domain\Hand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HandTest extends \PHPUnit_Framework_TestCase
{
    private $black;
    private $white;

    public function setUp() {
        $black = ['2H', '3D', '5S', '9C', 'KD'];
        $white = ['2C', '3H', '4S', '8C', 'AH'];
        $this->black = Hand::fromArray($black);
        $this->white = Hand::fromArray($white);
    }

    public function testAllisOk()
    {
        $this->assertInstanceOf(Hand::class,$this->black );
        $this->assertInstanceOf(Hand::class,$this->white );
    }

    public function test_it_should_evaluate_5_cards(){
        $this->assertCount(5, $this->black->getCard());
        $this->assertCount(5, $this->white->getCard());
    }

    public function test_it_should_return_5_values(){
        $this->assertCount(5, $this->black->getValue());
        $this->assertCount(5, $this->white->getValue());
    }

    public function test_it_should_return_5_suits(){
        $this->assertCount(5, $this->black->getSuit());
        $this->assertCount(5, $this->white->getSuit());
    }

    public function test_it_should_return_a_high_card(){
        $this->assertNotNull($this->black->highCard());
    }

    public function test_it_should_be_be_a_valid_high_card(){
        $this->assertContains($this->black->highCard(), [2,3,4,5,6,7,8,9,10,11,12,13,14]);
        $this->assertContains($this->white->highCard(), [2,3,4,5,6,7,8,9,10,11,12,13,14]);
    }
}

