<?php

class Vote {
    private $votes = [];

    public function castVote($user, $option) {
        if (!isset($this->votes[$user])) {
            $this->votes[$user] = [];
        }
        $this->votes[$user][] = $option;
    }

    public function getVotes($user) {
        return isset($this->votes[$user]) ? $this->votes[$user] : [];
    }

    public function getAllVotes() {
        return $this->votes;
    }
}

?>