#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use App\Commands\Play;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new Play());

$application->run();