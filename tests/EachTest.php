<?php

namespace WP2StaticGuzzleHttp\Promise\Tests;

use WP2StaticGuzzleHttp\Promise as P;
use WP2StaticGuzzleHttp\Promise\FulfilledPromise;
use WP2StaticGuzzleHttp\Promise\Promise;
use WP2StaticGuzzleHttp\Promise\RejectedPromise;
use PHPUnit\Framework\TestCase;

class EachTest extends TestCase
{
    public function testCallsEachLimit()
    {
        $p = new Promise();
        $aggregate = P\Each::ofLimit($p, 2);

        $p->resolve('a');
        P\Utils::queue()->run();
        $this->assertTrue(P\Is::fulfilled($aggregate));
    }

    public function testEachLimitAllRejectsOnFailure()
    {
        $p = [new FulfilledPromise('a'), new RejectedPromise('b')];
        $aggregate = P\Each::ofLimitAll($p, 2);

        P\Utils::queue()->run();
        $this->assertTrue(P\Is::rejected($aggregate));

        $result = P\Utils::inspect($aggregate);
        $this->assertSame('b', $result['reason']);
    }
}
