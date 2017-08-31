<?php

class ClosedRange
{
    private $range = [];
    public function __construct($lower_endpoint, $upper_endpoint)
    {
        if ($lower_endpoint > $upper_endpoint) {
            $fmt = 'lower_endpoint(%d) must be less than upper_endpoint(%d)';
            $message = sprintf($fmt, $lower_endpoint, $upper_endpoint);
            throw new InvalidArgumentException($message);
        }
        $this->range['lower_endpoint'] = $lower_endpoint;
        $this->range['upper_endpoint'] = $upper_endpoint;
    }

    public function include($num)
    {
        if ($num < $this->range['lower_endpoint']) {
            return false;
        }
        if ($num > $this->range['upper_endpoint']) {
            return false;
        }

        return true;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->range)) {
            return $this->range[$name];
        }

        throw new InvalidArgumentException("undifined property $name");
    }

    public function __toString()
    {
        return sprintf('[%d,%d]', $this->range['lower_endpoint'], $this->range['upper_endpoint']);
    }
}

