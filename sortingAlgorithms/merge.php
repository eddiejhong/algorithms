<?php
include 'verifySort.php';

function mergeSort($arrayToSort){
	$arrSize = count($arrayToSort);

	if($arrSize==1) {
		return $arrayToSort;
	}

	$lFrag = $rFrag = array();
	$middle = $arrSize/2;

	$lFrag = array_slice($arrayToSort, 0, floor($middle));
	$rFrag = array_slice($arrayToSort, floor($middle));

	$lFrag = mergeSort($lFrag);
	$rFrag = mergeSort($rFrag);

	return merge($lFrag, $rFrag);
}

function merge($lFrag, $rFrag){
	$mergedArr = array();

	while(count($lFrag)>0 && count($rFrag)>0){
		if($lFrag[0]<=$rFrag[0]){
			array_push($mergedArr, array_shift($lFrag));
		}else{
			array_push($mergedArr, array_shift($rFrag));
		}
	}

	$mergedArr = array_merge($mergedArr, $lFrag);
	$mergedArr = array_merge($mergedArr, $rFrag);

	return $mergedArr;
}

// Generate array of random numbers between 1 and 10,000
for($i=0; $i<100; $i++){
	$array[] = mt_rand(1, 10000);
}

$start = microtime(true);

$sorted = mergeSort($array);

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
?>