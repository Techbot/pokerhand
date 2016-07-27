<?php

namespace spec\Application\Domain;

use Application\Domain\Round;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoundSpec extends ObjectBehavior
{
    function let($black, $white)
    {
        $this->beConstructedWith($black,$white);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Round::class);
    }
}
