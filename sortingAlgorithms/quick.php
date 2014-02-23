<?php
ini_set('xdebug.max_nesting_level', 200);
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
	//-randomly
	//-Sedgewick method
	//-middle
	
	//Random (make sure to add $pivot back into the return so that the pivot value is preserved!)
	// $pivotIx = mt_rand(0,$length-1); //rand() is slower than mt_rand()! Uses the Mersenne Twister algorithm
	// $pivot = $array[$pivotIx]; 
	// unset($array[$pivotIx]);

	//Middle (make sure to add $pivot back into the return so that the pivot value is preserved!)
	// $pivot = $array[round(($length-1)/2)];
	// unset($array[$pivotIx]);

	//Sedgewick method
	$pivot = ($array[0] + $array[round(($length-1)/2)] + $array[$length-1])/3;

	$less = $greater = array();
	foreach($array as $k=>$v){
		if($v <= $pivot){
			$less[] = $v;
		}else{
			$greater[] = $v;
		}
	}

	//Do this recursively for each subset of the array
	return array_merge(quickSort($less), quickSort($greater));	
}

// Generate array of random numbers between 1 and 10,000
for($i=0; $i<100; $i++){
	$array[] = mt_rand(1, 10000);
}

$start = microtime(true);

$sorted = quickSort($array);

echo "The unsorted array:";
var_dump($array);
echo "The sorted array:";
var_dump($sorted);

$memoryPeak = memory_get_peak_usage();
echo "The peak memory usage: $memoryPeak bytes\n";

$timeElapsed = microtime(true) - $start;
echo "The time (in seconds) for the script to run: $timeElapsed seconds\n";

if(verifySort($sorted)){
	echo 'The array is sorted in ascending order.';
}

function verifySort($array){
	foreach($array as $k=>$v){
		if($k==count($array)-1){
			break;
		}

		if($array[$k]>$array[$k+1]){
			return false;
		}
	}

	return true;
}

 ?>