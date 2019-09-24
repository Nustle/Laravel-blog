<?php

namespace App\Interfaces;

interface CounterInterface
{
    /**
     * Increments integer
     *
     * @return int
     */
    public function increment();
    /**
     * Decrements integer
     *
     * @return int
     */
    public function decrement();
    /**
     * Returns string
     *
     * @return string
     */
    public function getValue();
}
