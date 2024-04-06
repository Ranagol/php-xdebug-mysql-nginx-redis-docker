#!/usr/bin/env php
<?php

/**
 * command line command another example:        php console.php duplicate 86
 * php - because we have a php app
 * console.php - because we call this file first. It will activate the autoloader, and everything else.
 */
require __DIR__ . '/../../vendor/autoload.php';

use App\Console\DuplicateCommand;
use Symfony\Component\Console\Application;

$application = new Application();

// Here we register our  DuplicateCommand. This command receives a number, and returns the double of it.
$application->add(new DuplicateCommand());

$application->run();