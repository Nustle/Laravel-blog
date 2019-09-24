<?php

namespace App\Implementations;

use App\Interfaces\CounterInterface;

class CounterNew implements CounterInterface
{
    protected $counterNew = 0;

    public function __construct()
    {
        $this->counterNew = 0;
    }

    public function increment()
    {
        return ++$this->counterNew;
    }

    public function decrement()
    {
        return --$this->counterNew;
    }

    public function getValue()
    {
        return '<strong>' . $this->counterNew . '</strong>';
    }
}
