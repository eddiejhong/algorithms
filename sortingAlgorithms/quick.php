<?php

$start = microtime(true);

// Quick Sort!
// Characteristics:
// Worst case performance: O(n^2)
// Best case performance O(n*log(n))
// Average case performance O(n*log(n))
// Worst case space complexity O(n) auxiliary (naive) / O(log(n)) (Sedgewick)

//pseudo code
// function quicksort(array)
//      if length(array) ≤ 1
//          return array  // an array of zero or one elements is already sorted
//      select and remove a pivot element pivot from 'array'  // see '#Choice of pivot' below
//      create empty lists less and greater
//      for each x in array
//          if x ≤ pivot then append x to less
//          else append x to greater
//      return concatenate(quicksort(less), list(pivot), quicksort(greater)) // two recursive calls

function quickSort($array){
	//Cover edge cases of array length 0 or 1
	$length = count($array);
	if($length<=1){
		return $array;
	}

	//Select pivot element
	$pivotIx = mt_rand(0,$length-1);
	$pivot = $array[$pivotIx]; //rand() is slower than mt_rand()! Uses the Mersenne Twister algorithm
	unset($array[$pivotIx]);

	$less = $greater = array();
	foreach($array as $k=>$v){
		if($v <= $pivot){
			$less[] = $v;
		}else{
			$greater[] = $v;
		}
	}

	//Do this recursively for each subset of the array
	return array_merge(quickSort($less), array($pivot), quickSort($greater));	
}

$array = array(1,3,2,5,5,7,8,2,1,39,6,8,1,2,6,8,9,2,4,5,76);

$sorted = quickSort($array);

echo "The unsorted array:";
var_dump($array);
echo "The sorted array:";
var_dump($sorted);

$memoryPeak = memory_get_peak_usage();
echo "The peak memory usage: $memoryPeak\n";

$timeElapsed = microtime(true) - $start;
echo "The time (in seconds) for the script to run: $timeElapsed\n";

 ?>