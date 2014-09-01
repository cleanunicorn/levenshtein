<?php
namespace Levenshtein;

class Levenshtein
{
	private $cost_insertion = 1;
	private $cost_replacement = 1;
	private $cost_deletion = 1;

    public function compute($a, $b, $cost_insertion = 1, $cost_replacement = 1, $cost_deletion = 1)
    {
        if (is_string($a) && is_string($b))
        {
        	return levenshtein($a, $b, $cost_insertion, $cost_replacement, $cost_deletion);
        }

        $this->cost_insertion = $cost_insertion;
        $this->cost_replacement = $cost_replacement;
        $this->cost_deletion = $cost_deletion;

        return $this->distanceArray($a, count($a) - 1, $b, count($b) - 1);
    }

    private function distanceArray($a, $ai, $b, $bi)
    {
    	if (($ai == $bi) && ($ai == 0))
    	{
    		return ($a[$ai] == $b[$bi]) ? 0 : 1;
    	}

    	if ($ai == -1)
    	{
    		return 0;
    	}

    	if ($bi == -1)
    	{
    		return 0;
    	}

    	return min(
    		$this->distanceArray($a, $ai - 1, $b, $bi) + (($a[$ai] == $b[$bi]) ? 0 : 1)
    		, $this->distanceArray($a, $ai, $b, $bi - 1) + (($a[$ai] == $b[$bi]) ? 0 : 1)
    		, $this->distanceArray($a, $ai - 1, $b, $bi - 1) + (($a[$ai] == $b[$bi]) ? 0 : 1)
		);
    }
}