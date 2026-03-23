<?php

class ElectionResults {
    private $results;

    public function __construct($results) {
        $this->results = $results;
    }

    public function getAllResults() {
        return $this->results;
    }

    public function getCandidateVotes($candidate) {
        return isset($this->results[$candidate]) ? $this->results[$candidate] : 0;
    }

    public function getTotalVotesCast() {
        return array_sum($this->results);
    }

    public function getWinner() {
        return array_keys($this->results, max($this->results))[0];
    }

    public function getVotePercentages() {
        $totalVotes = $this->getTotalVotesCast();
        $percentages = [];
        foreach ($this->results as $candidate => $votes) {
            $percentages[$candidate] = $totalVotes > 0 ? ($votes / $totalVotes) * 100 : 0;
        }
        return $percentages;
    }
}

?>
