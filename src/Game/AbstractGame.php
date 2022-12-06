<?php

namespace App\Game;

abstract class AbstractGame implements GameInterface
{
    protected function getCurrentFilePath()
    {
        $reflectionClass = new \ReflectionClass($this);
        $path = $reflectionClass->getFileName();
        $name = $reflectionClass->getShortName();
        $fullName = sprintf('%s.php', $name);

        return str_replace($fullName, 'question.txt', $path);
    }

    public function writeResult(string $result)
    {
        echo "\nResult: \e[0;30;42m " . $result . " \e[0m\n\n";
    }
}