<?php

require('../src/Levenshtein.php');

$a = array(
	'k'
	, 'i'
	, 't'
	, 't'
	, 'e'
	, 'n'
);

$b = array(
	's'
	, 'i'
	, 't'
	, 't'
	, 'i'
	, 'n'
	, 'g'
);

$levenshtein = new \Levenshtein\Levenshtein();

echo $levenshtein->compute($a, $b);