<?php

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

	if(count($lFrag)>0){
		$mergedArr = array_merge($mergedArr, $lFrag);
	}
	if(count($rFrag)>0){
		$mergedArr = array_merge($mergedArr, $rFrag);
	}

	return $mergedArr;
}

$test = array(3, 2, 1, 4,5,7,2,1,3,55,6,1,7,3,2,3,41,23);
$array = mergeSort($test);
// echo 'output';
print_r($array);

?>