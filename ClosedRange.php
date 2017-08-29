<?php

class ClosedRange
{
    private $range = [];
    public function __construct($lower_endpoint, $upper_endpoint)
    {
        $this->range['lower_endpoint'] = $lower_endpoint;
        $this->range['upper_endpoint'] = $upper_endpoint;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->range)) {
            return $this->range[$name];
        }
    }
}

