# homework
<?php

function transformToBinary($decimalNumber) {              
	$absValue = abs($decimalNumber);		
	do {
		$result = ($absValue % 2) . $result;
		$absValue = intdiv($absValue, 2);		
	} while ($absValue != 0);
	if ($decimalNumber < 0) {			
		$result = "-" . $result; 
	}
	return $result;
}
						   
function transformToDecimal($binaryNumber) {           		
	$binaryArray = str_split(abs($binaryNumber));      	
	$degree = count($binaryArray);
	foreach ($binaryArray as $value){  
		$result = $result + $value * (2 ** --$degree);
	}
	return $result;
}


function getFibonacci ($limit) {				
	for ($i = 0; $i <= abs($limit); $i++) {
		if ($i <= 1) {
			$result[$i] = $i;
		}
		else {
			$result[$i] = $result[$i - 1] + $result[$i - 2];
		}
	}
	if ($limit < 0) {					
		foreach ($result as $key => $value){	
			$result[$key] = $value * (-1);
		}
	}
	return $result;
}


function getPower ($enteredNumber, $power){  			
	$result = 1;
	for ($i = 1; $i <= abs($power); $i++) {
		$result = $result * $enteredNumber;
	}
	if ($power <= 0) {                    			
		$result = 1 / $result;
	}
	return $result;
}


function isIpInRange($enteredIp, $startIp, $endIp) {
	$start = sprintf("%u", ip2long($startIp));  
	$end = sprintf("%u", ip2long($endIp));
	for ($i = $start; $i <= $end; $i++) {
		if (sprintf("%u", ip2long($startIp)) == $i) {
			return true;
		}
	}
	return false;
}

/* Для одномерного массива 
Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел */
 
function calculatePrecentageByUser($inputArray, $conditionFunctoin) {
	if (count($inputArray > 0)) {
		$elementNumbers = 0;
		for ($i = 0; $i < count($inputArray); $i++) {
			if ($conditionFunctoin($inputArray[$i])) {
				$elementNumbers++;
			}
		}
		return (int)($elementNumbers * 100 / count($inputArray));
	}
	throw new Exception('Empty array()');
}

/* функция проверки соответствия элементов условию,
закоментированы различные условия */

function isCorrespondCondition($element) {
	//return ($element > 0);  
	//return ($element < 0);
	//return ($element === 0);
	$tempCount = 0;
	for ($i = 1; $i < $element; $i++) { 
		if ($element % $i == 0) {
			$tempCount++;
		}
	}
	return($tempCount === 1);
} 


/* Отсортировать элементы по возрастанию/убыванию (мой аналог usort() методом пузырька) */

function sortArrayByUser ($inputArray, $compare) {
	for ($i = 0; $i < count($inputArray) - 1; $i++) {
		for ($j = 0; $j < count($inputArray) - $i - 1; $j++) {
			if ($compare($inputArray[$j], $inputArray[$j + 1]) > 0) {
				$temp = $inputArray[$j];
				$inputArray[$j] = $inputArray[$j + 1];
				$inputArray[$j + 1] = $temp;
			}
		}
	}
	return $inputArray;
}

function compareElements($element1, $element2) {  //функция сравнения
    if ($element1 == $element2) {
        return 0;
    }
    return ($element1 > $element2) ? -1 : 1;
}


/* Для двумерных массивов */

function transposeMatrix($matrix) {				
	for ($i = 0; $i < count($matrix); $i++) {
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			$result[$j][$i] = $matrix[$i][$j];
		}
	}
	return $result;
}

function sumMatrices ($matrix1, $matrix2) {				
	if (count($matrix1) != count($matrix2)) {	
		throw new Exception('размеры матриц не совпадают');
	}
	for ($i = 0; $i < count($matrix1); $i++) {
		if (count($matrix1[$i]) != count($matrix2[$i])) {	
			throw new Exception('размеры матриц не совпадают');
		}
		for ($j = 0; $j < count($matrix1[$i]); $j++) {
			$result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
		}
	}
	return $result;
} 

// Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. 
function deleteRows($matrix) {
	for ($i = 0; $i < count($matrix); $i++) {
		$flag = false;
		$sumRow = 0;
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			if ($matrix[$i][$j] == 0) {
				$flag = true;
			}
			$sumRow = $sumRow + $matrix[$i][$j];
		}
		if ($sumRow > 0 && $flag) {
			for ($j = 0; $j < count($matrix[$i]); $j++) {
				$matrix[$i][$j] = NULL;
			}
		}
	}
	return $matrix;
}

// Удалить те столбцы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент
function deleteColumns($matrix) {			
	for ($i = 0; $i < count($matrix); $i++) {
		$flag = false;
		$sumColumn = 0;
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			if ($matrix[$j][$i] == 0) {
				$flag = true;
			}
			$sumColumn = $sumColumn + $matrix[$j][$i];
		}
		if ($sumColumn > 0 && $flag) {
			for ($j = 0; $j < count($matrix[$i]); $j++) {
				$matrix[$j][$i] = NULL;	
			}
		}
	}
	return $matrix;
}

/* РЕКУРСИИ */
// преобразование в бинарное число с помощью рекурсии 

function transformToBinaryByRecursion($decimalNumber) {
	$decimalNumber = abs($decimalNumber );
	do {
		$result = ($decimalNumber % 2);
		return transformToBinary(intdiv($decimalNumber, 2)) . $result;
	} while ($decimalNumber != 0);
}


//Написать функцию которая выводит первые N чисел фибоначчи с помощью рекурсии 
function printFibonacciByRecursion($limit) {
	function getFibonacciByRecursion($limit) {
		if ($limit == 0) {
			return  0;
		}
		if ($limit == 1) {
			return  1;
		}
		return getFibonacciByRecursion($limit - 1) + getFibonacciByRecursion($limit - 2);
	}  
	for ($i = 0; $i <= $limit; $i++) {
		echo getFibonacciByRecursion($i) . ', ';	
	}
}

//Отсортировать элементы по возрастанию by RECURSION 
function sortArrayUpByRecursion($array, $low, $high) {	
	$indexLeft = $low;                
	$indexRight = $high;
	$middle = $array[($low + $high) / 2]; 
	do {
		while($array[$indexLeft] < $middle) {
			++$indexLeft;
		}  
		while($array[$indexRight] > $middle) {
			--$indexRight;
		}  
		if($indexLeft <= $indexRight){
			$temp = $array[$indexLeft];
			$array[$indexLeft] = $array[$indexRight];
			$array[$indexRight] = $temp;
			$indexLeft++; 
			$$indexRight--;
		}
	} while($indexLeft < $indexRight);
        if($low < $indexRight){
		$array = sortArrayUpByRecursion($array, $low, $indexRight);
	} 
	if($indexLeft < $high){
		$array = sortArrayUpByRecursion($array, $indexLeft, $high);
	} 
	return $array;
}

//суммирование матриц при помощи рекурсии
function sumMatricesByRecursion ($array1, $array2) {
	if (count($array1) != count($array2)) {	
		return false;
	}
	for ($i = 0; $i < count($array1); $i++) {
		if (is_array($array1[$i]) && is_array($array2[$i])) {
			$result[$i] = sumMatricesByRecursion($array1[$i], $array2[$i]);
		}
		else $result[$i] = $array1[$i] + $array2[$i];
	}
	return $result;
} 


// Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
function getAllArrayElements($array) {
	for ($i = 0; $i < count($array); $i++) {
		echo ' [' . $i . '] => ';
		if (is_array($array[$i])) {
			echo ' array( <BR>';
			getAllArrayElements($array[$i]);
		}
		else {
			echo  $array[$i] . '<br> ';
		}
	}
	echo ') <br>';
	return true;
}

