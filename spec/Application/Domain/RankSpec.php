<?php

namespace spec\Application\Domain;

use Application\Domain\Rank;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RankSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Rank::class);
    }
}
