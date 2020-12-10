<?php

namespace WP2StaticGuzzleHttp\Promise\Tests;

use WP2StaticGuzzleHttp\Promise as P;
use WP2StaticGuzzleHttp\Promise\FulfilledPromise;
use WP2StaticGuzzleHttp\Promise\Promise;
use WP2StaticGuzzleHttp\Promise\RejectedPromise;
use PHPUnit\Framework\TestCase;

class IsTest extends TestCase
{
    public function testKnowsIfFulfilled()
    {
        $p = new FulfilledPromise(null);
        $this->assertTrue(P\Is::fulfilled($p));
        $this->assertFalse(P\Is::rejected($p));
    }

    public function testKnowsIfRejected()
    {
        $p = new RejectedPromise(null);
        $this->assertTrue(P\Is::rejected($p));
        $this->assertFalse(P\Is::fulfilled($p));
    }

    public function testKnowsIfSettled()
    {
        $p = new RejectedPromise(null);
        $this->assertTrue(P\Is::settled($p));
        $this->assertFalse(P\Is::pending($p));
    }

    public function testKnowsIfPending()
    {
        $p = new Promise();
        $this->assertFalse(P\Is::settled($p));
        $this->assertTrue(P\Is::pending($p));
    }
}
