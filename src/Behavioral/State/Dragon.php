<?php

namespace Patterns\Behavioral\State;

class Dragon extends Context
{
    private $eatingState;
    private $sleepingState;
    private $flyingState;

    /** @var State */
    private $currentState;

    /**
     * Dragon constructor.
     */
    public function __construct()
    {
        $this->eatingState = new EatingState($this);
        $this->sleepingState = new SleepingState($this);
        $this->flyingState = new FlyingState($this);

        $this->currentState = $this->eatingState;
    }

    /**
     * @param State $state
     */
    public function setState(State $state)
    {
        $this->currentState = $state;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->currentState;
    }

    /**
     * @return Dragon
     */
    public function doTheNextThing() : Dragon
    {
        $this->currentState->handleRequest();

        return $this;
    }

    /**
     * @return EatingState
     */
    public function getEatingState(): EatingState
    {
        return $this->eatingState;
    }

    /**
     * @return mixed
     */
    public function getSleepingState()
    {
        return $this->sleepingState;
    }

    /**
     * @return mixed
     */
    public function getFlyingState()
    {
        return $this->flyingState;
    }
}