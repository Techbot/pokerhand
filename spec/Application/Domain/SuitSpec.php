<?php

namespace spec\Application\Domain;

use Application\Domain\Suit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SuitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Suit::class);
    }
}
