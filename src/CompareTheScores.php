<?php
namespace Fun;

class CompareTheScores
{
    public function __construct()
    {
    }

    public function determineWinner($student1, $student2)
    {
        //need to preserve original scores for comparison function
        $student1Wins = $student1;
        $student2Wins = $student2;

        //reduce scores to wins
        array_walk($student1Wins, [$this, 'cmp'], $student2);
        array_walk($student2Wins, [$this, 'cmp'], $student1);

        //sum the number of wins
        $student1Wins = array_sum(array_filter($student1Wins));
        $student2Wins = array_sum(array_filter($student2Wins));

        if ($student1Wins == $student2Wins) {
            echo 'It is a draw!' . PHP_EOL;
            return;
        }

        if ($student1Wins > $student2Wins) {
            echo 'Student 1 WINS, ' . $student1Wins . ' to ' . $student2Wins . PHP_EOL;
            return;
        }

        echo 'Student 2 WINS, ' . $student2Wins . ' to ' . $student1Wins . PHP_EOL;
        return;
    }

    private function cmp(&$v, $k, $compareAgainst)
    {
        $result = null; //draw or loss
        if (array_key_exists($k, $compareAgainst)) {
            if ($v > $compareAgainst[$k]) {
                $result = 1; //win
            }
        }

        $v = $result;
    }
}