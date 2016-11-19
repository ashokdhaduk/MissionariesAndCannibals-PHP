<?php

/**
 * Missionaries and Cannibals problem implementation in PHP.
 *
 * @author Ankit Pokhrel <info@ankitpokhrel.com.np>
 */
class MissionariesAndCannibals
{
    /**
     * Solve missionaries and cannibals problem.
     *
     * @return bool
     */
    public function solve()
    {
        $initialState = new State(3, 3, 0, 0, 'left');
        $initialNode  = new Node($initialState, null, null);

        if ($initialNode->state->isGoalState()) {
            $this->displayNodeInfo($initialNode);

            return true;
        }

        $queue = new SplQueue();
        $queue->push($initialNode);

        $explored = [];
        while (true) {
            if ($queue->isEmpty()) {
                return false; //nothing found
            }

            $node = $queue->pop();

            $this->displayNodeInfo($node);

            array_push($explored, $node->state);

            if ($node->state->isGoalState()) {
                return true;
            }

            //get all action and states available
            $states = $node->state->getNextStates();

            foreach ($states as $stateNode) {
                if ( ! $stateNode->state->isValidState()) {
                    continue;
                }

                if ( ! in_array($stateNode->state, $explored)) {
                    $queue->push($stateNode);
                }
            }
        }
    }

    /**
     * Display step information.
     *
     * @param $node
     */
    protected function displayNodeInfo(Node $node)
    {
        $nodeInfo = 'Initial State: ';
        if ($node->action) {
            $nodeInfo = $node->action . ', ' . $node->state->getBoatLocation();
        }

        $nodeInfo .= ' <em>(' . $node->state . ')</em><br/>';

        echo $nodeInfo;
    }
}
