<?php

namespace App\Game\Day1;

use App\Game\AbstractGame;

class Game extends AbstractGame
{
    public function readFile()
    {
        $elfCaloriesList = [];
        $elfSum = 0;

        $lines = file($this->getCurrentFilePath(), FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            if (empty($line) && $elfSum > 0) {
                $elfCaloriesList[] = $elfSum;
                $elfSum = 0;
                continue;
            }

            $elfSum += $line;
        }

        return $elfCaloriesList;
    }

    public function executeFirstPuzzle(array $list)
    {
        return max($list);
    }

    public function executeSecondPuzzle(array $list)
    {
        arsort($list);

        return array_sum(array_slice($list, 0, 3));
    }
}