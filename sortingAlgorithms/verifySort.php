<?php

function verifySort($array){
	foreach($array as $k=>$v){
		if($k==count($array)-1){ //Cannot compare last number in array to another number
			break;
		}

		if($array[$k]>$array[$k+1]){
			return false;
		}
	}

	return true;
}

?>