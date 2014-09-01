<?php

require('../src/Levenshtein.php');

$a = 'aaa';
$b = 'abc';

$levenshtein = new \Levenshtein\Levenshtein;

echo $levenshtein->compute($a, $b);