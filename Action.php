<?php

class Action
{
    public $numMissionaries;
    public $numCannibals;

    /**
     * @constructor
     *
     * @param int $numMissionaries Number of missionaries to ship
     * @param int $numCannibals    Number of cannibals to ship
     */
    public function __construct($numMissionaries, $numCannibals)
    {
        $this->numMissionaries = $numMissionaries;
        $this->numCannibals = $numCannibals;
    }

    /**
     * Check if the action to be applied is valid.
     *
     * @return bool
     */
    public function isValidAction()
    {
        if ($this->numMissionaries == 0 && $this->numCannibals == 0) {
            return false;
        }

        if (($this->numMissionaries + $this->numCannibals) > BOAT_SIZE) {
            return false;
        }

        return true;
    }

    /**
     * Object to string.
     *
     * @return string
     */
    public function __toString()
    {
        return 'transfer '.$this->numMissionaries.' missionaries and '.$this->numCannibals.' cannibals';
    }
}
