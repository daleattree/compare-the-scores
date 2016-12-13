<?php
use Fun\CompareTheScores;
use Symfony\Component\VarDumper\VarDumper;

include("vendor/autoload.php");

echo "Provide student 1's scores separated by spaces" . PHP_EOL;
$line1 = fgets(STDIN);
echo "Provide student 2's scores separated by spaces" . PHP_EOL;
$line2 = fgets(STDIN);

$student1 = explode(' ', preg_replace('/[^0-9 ]/', '', $line1));
$student2 = explode(' ', preg_replace('/[^0-9 ]/', '', $line2));

$engine = new CompareTheScores();
$engine->determineWinner($student1, $student2);
