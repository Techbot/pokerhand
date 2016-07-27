<?php

namespace spec\Application\Domain;

use Application\Domain\Hand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Hand::class);
    }
}
