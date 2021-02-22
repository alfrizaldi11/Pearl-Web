<?php

require __DIR__.'/../vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
$factory = (new Factory)->withServiceAccount(__DIR__.'/pearl-78bab-81c605177565.json');

$database = $factory->createDatabase();

?>