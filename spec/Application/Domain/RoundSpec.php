<?php

namespace spec\Application\Domain;

use Application\Domain\Round;
use Application\Domain\Hand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoundSpec extends ObjectBehavior
{
    function let()
    {
        $black = Hand::fromArray(['2H', '3D', '5S', '9C', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'KH']);

        $this->beConstructedWith($black,$white);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Round::class);
    }
}
