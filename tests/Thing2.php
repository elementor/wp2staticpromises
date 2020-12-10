<?php

namespace WP2StaticGuzzleHttp\Promise\Tests;

class Thing2 implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return '{}';
    }
}
