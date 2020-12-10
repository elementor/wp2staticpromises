<?php

namespace WP2StaticGuzzleHttp\Promise\Tests;

class Thing1
{
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function __toString()
    {
        return $this->message;
    }
}
