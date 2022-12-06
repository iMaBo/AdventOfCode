<?php

namespace App\Game;

interface GameInterface
{
    public function readFile();

    public function writeResult(string $result);

    public function executeFirstPuzzle(array $list);

    public function executeSecondPuzzle(array $list);
}