<?php

class Node
{
    /** @var object Current state */
    public $state;

    /** @var object Parent state */
    public $parent;

    /** @var object Action performed on state */
    public $action;

    /** @var int Weight of the path */
    public $pathCost;

    /** @var int Depth of the node */
    public $depth;

    /**
     * @constructor
     *
     * @param State $state Current state
     * @param State|null $parent Parent state
     * @param Action|null $action Action performed to change state from $parent to $state
     * @param int $pathCost Cost of path, not used in current implementation
     * @param int $depth Depth of a tree, not used in current implementation
     */
    public function __construct(State $state, State $parent = null, Action $action = null, $pathCost = 0, $depth = 0)
    {
        $this->state = $state;
        $this->parent = $parent;
        $this->action = $action;
        $this->pathCost = $pathCost;
        $this->depth = $depth;
    }
}
