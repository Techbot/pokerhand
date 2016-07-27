<?php

namespace spec\Application\Domain\Rankers;

use Application\Domain\Rankers\HighCardRanker;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HighCardRankerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HighCardRanker::class);
    }
}
