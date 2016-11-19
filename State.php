<?php

class State
{
    protected $missionariesLeft = 3;
    protected $cannibalsLeft = 3;
    protected $missionariesRight = 0;
    protected $cannibalsRight = 0;
    protected $boatLocation = 'left';

    /**
     * @constructor
     *
     * @param int $leftMissionaries  Missionaries on the left
     * @param int $leftCannibals     Cannibals on the left
     * @param int $rightMissionaries Missionaries on the right
     * @param int $rightCannibals    Cannibals on the right
     * @param int $boatLocation      Boat location on this state
     */
    public function __construct($leftMissionaries, $leftCannibals, $rightMissionaries, $rightCannibals, $boatLocation)
    {
        $this->missionariesLeft  = $leftMissionaries;
        $this->cannibalsLeft     = $leftCannibals;
        $this->missionariesRight = $rightMissionaries;
        $this->cannibalsRight    = $rightCannibals;
        $this->boatLocation      = $boatLocation;
    }

    /**
     * Check if current state is a valid state.
     *
     * @return bool
     */
    public function isValidState()
    {
        if ($this->missionariesLeft > 0 && $this->missionariesLeft < $this->cannibalsLeft) {
            return false;
        }

        if ($this->missionariesRight > 0 && $this->missionariesRight < $this->cannibalsRight) {
            return false;
        }

        return true;
    }

    /**
     * Check if current state is a goal state.
     *
     * @return bool
     */
    public function isGoalState()
    {
        return ($this->missionariesRight === 3 && $this->cannibalsRight === 3);
    }

    /**
     * Available paths from current state.
     *
     * @return array
     */
    public function getNextStates()
    {
        $maxMissionaries = $this->missionariesRight;
        if ($this->boatLocation == 'left') {
            $maxMissionaries = $this->missionariesLeft;
        }

        $maxCannibals = $this->cannibalsRight;
        if ($this->boatLocation == 'left') {
            $maxCannibals = $this->cannibalsLeft;
        }

        $maxMissionaries = min(BOAT_SIZE, $maxMissionaries);
        $maxCannibals    = min(BOAT_SIZE, $maxCannibals);

        $states = [];
        for ($missionaries = 0; $missionaries <= $maxMissionaries; ++$missionaries) {
            for ($cannibals = 0; $cannibals <= $maxCannibals; ++$cannibals) {
                if ($missionaries == 0 && $cannibals == 0) {
                    continue;
                }

                if (($missionaries + $cannibals) > BOAT_SIZE) {
                    continue;
                }

                $action = new Action($missionaries, $cannibals);
                if ($action->isValidAction()) {
                    $state = clone $this;
                    $state = $state->transfer($missionaries, $cannibals);
                    $node  = new Node($state, $this, $action, 0, 0);
                    array_push($states, $node);
                }
            }
        }

        return $states;
    }

    /**
     * Transfer specified missionaries and cannibals.
     *
     * @param $numMissionaries Missionaries to transfer
     * @param $numCannibals    Cannibals to transfer
     *
     * @return State New state after transfer
     */
    protected function transfer($numMissionaries, $numCannibals)
    {
        $state = clone $this;
        if ($state->boatLocation == 'left') {
            $state->missionariesLeft -= $numMissionaries;
            $state->cannibalsLeft -= $numCannibals;

            $state->missionariesRight += $numMissionaries;
            $state->cannibalsRight += $numCannibals;

            $state->boatLocation = 'right';

            return $state;
        }

        $state->missionariesRight -= $numMissionaries;
        $state->cannibalsRight -= $numCannibals;

        $state->missionariesLeft += $numMissionaries;
        $state->cannibalsLeft += $numCannibals;

        $state->boatLocation = 'left';

        return $state;
    }

    /**
     * Getter for $boatLocation.
     *
     * @return string
     */
    public function getBoatLocation()
    {
        return $this->boatLocation;
    }

    /**
     * Object to string.
     *
     * @return string
     */
    public function __toString()
    {
        $str = 'Left: ' . $this->missionariesLeft . ' missionaries, ' . $this->cannibalsLeft . ' cannibals';
        if ($this->boatLocation == 'left') {
            $str .= ', boat';
        }

        $str .= ' - Right: ' . $this->missionariesRight . ' missionaries, ' . $this->cannibalsRight . ' cannibals';
        if ($this->boatLocation == 'right') {
            $str .= ', boat';
        }

        return $str;
    }
}
