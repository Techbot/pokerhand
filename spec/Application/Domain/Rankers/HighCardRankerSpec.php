<?php

namespace spec\Application\Domain\Rankers;

use Application\Domain\Rankers\HighCardRanker;
use Application\Domain\Hand;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HighCardRankerSpec extends ObjectBehavior
{

    function let()
    {
        $black = Hand::fromArray(['2H', '3D', '5S', '9C', 'KD']);
        $white = Hand::fromArray(['2C', '3H', '4S', '8C', 'AH']);

        $this->beConstructedWith($black,$white);
    }


    function it_is_initializable()
    {
        $this->shouldHaveType(HighCardRanker::class);
    }
}
