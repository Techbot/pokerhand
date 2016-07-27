<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Application\Domain\Round;
use Application\Domain\Hand;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $round;

    /**
     * @Given a round of two hands
     */
    public function aRoundOfTwoHands()
    {
        $black = ['2H', '3D', '5S', '9C', 'KD'];
        $white = ['2C', '3H', '4S', '8C', 'AH'];
        $this->round= new Round(Hand::fromArray($black), Hand::fromArray( $white));
    }

    /**
     * @When I compare their cards
     */
    public function iCompareTheirCards()
    {
       $this->round->compare();
    }

    /**
     * @Then I should receive their ranks
     */
    public function iShouldReceiveTheirRanks()
    {
        PHPUnit_Framework_Assert::assertSame( $this->round->result, 'White wins. - with high card: Ace');
    }
}
