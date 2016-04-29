<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeNumbersSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PrimeNumbers');
    }

    function it_should_not_have_primes()
    {
        $this->getPrimes(1)->shouldBe([]);
    }

    function it_should_be_two()
    {
        $this->getPrimes(2)->shouldBe([2]);
    }

}
