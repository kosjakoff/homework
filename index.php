# homework
<?php

function transformToBinary($decimalNumber) {            // преобразование в бинарное число  
	$i = abs($decimalNumber);			//модуль числа
	do {
		$result = ($i % 2) . $result;
		$i = intdiv($i, 2);			//результат целочисленного деления
	} while ($i != 0);
	if ($decimalNumber < 0) {			// для отрицательных чисел
		$result = "-" . $result; 
	}
	return $result;
}
						   
function transformToDecimal($binaryNumber) {           		//преобразование в десятичное число
	$binaryArray = str_split(abs($binaryNumber));      	//бинарное число преобразуется в массив символов
	$degree = count($binaryArray);
	foreach ($binaryArray as $value){  
		$result = $result + $value * (2 ** --$degree);
	}
	return $result;
}


function getFibonacci ($limit) {				//число Фибоначчи
	for ($i = 0; $i <= abs($limit); $i++) {
		if ($i <= 1) {
			$result[$i] = $i;
		}
		else {
			$result[$i] = $result[$i - 1] + $result[$i - 2];
		}
	}
	if ($limit < 0) {					//для отрицательных чисел
		foreach ($result as $key => $value){	
			$result[$key] = $value * (-1);
		}
	}
	return $result;
}


function getPower ($enteredNumber, $power){  			//возведения числа N в степень M
	$result = 1;
	for ($i = 1; $i <= abs($power); $i++) {
		$result = $result * $enteredNumber;
	}
	if ($power <= 0) {                    			//если степень отрицательная или "0"
		$result = 1 / $result;
	}
	return $result;
}


//Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4

function isIpInRange($enteredIp, $startIp, $endIp) {
	$start = sprintf("%u", ip2long($startIp));  		//приводим к десятичному представлению
    $end = sprintf("%u", ip2long($endIp));
	for ($i = $start; $i <= $end; $i++) {
		if (sprintf("%u", ip2long($startIp)) == $i) {
			return true;
		}
	}
	return false;
}

/* Для одномерного массива */

function calculatePositivePrecentage($inputArray) {		//Подсчитать процентное соотношение положительных чисел	
	if (count($inputArray > 0)) {
		$positiveNumbers = 0;
		for ($i = 0; $i < count($inputArray); $i++) {
			if ($inputArray[$i] > 0) { 
				$positiveNumbers++;
			}
		}
		return (int)($positiveNumbers * 100 / count($inputArray));
	}
	return false;
}

function calculateNegativePrecentage($inputArray) {		//Подсчитать процентное соотношение отрицательных чисел	
	if (count($inputArray > 0)) {
		$negativeNumbers = 0;
		for ($i = 0; $i < count($inputArray); $i++) {
			if ($inputArray[$i] < 0) { 
				$negativeNumbers++;
			}
		}
		return (int)($negativeNumbers * 100 / count($inputArray));
	}
	return false;
}

function calculateZeroPrecentage($inputArray) {			//Подсчитать процентное соотношение нулевых чисел	
	if (count($inputArray > 0)) {
		$zeroNumbers = 0;
		for ($i = 0; $i < count($inputArray); $i++) {
			if ($inputArray[$i] == 0) { 
				$zeroNumbers++;
			}
		}
		return (int)($zeroNumbers  * 100 / count($inputArray));
	}
	return false;
}

function calculatePrimePrecentage($inputArray) {		//Подсчитать процентное соотношение простых чисел	
	if (count($inputArray > 0)) {
		$primeNumbers = 0;
		for ($i = 0; $i < count($inputArray); $i++) {
			$tempCount = 0;
			for ($j = 2; $j <= $inputArray[$i]; $j++) { 
				if ($inputArray[$i] % $j == 0) {
					$tempCount++;
				}
			}
			if ($tempCount == 1) {
				$primeNumbers++;
			}
		}
		return (int)($primeNumbers  * 100 / count($inputArray));
	}
	return false;
}


function sortArrayUp ($inputArray) {					//Отсортировать элементы по возрастанию
	for ($i = 0; $i < count($inputArray) - 1; $i++) {
		for ($j = 0; $j < count($inputArray)- $i - 1; $j++) {
			if ($inputArray[$j] > $inputArray[$j+1]) {
				$temp = $inputArray[$j];
				$inputArray[$j] = $inputArray[$j+1];
				$inputArray[$j+1] = $temp;
			}
		}
	}
	return $inputArray;
}

function sortArrayDown ($inputArray) {					//Отсортировать элементы по убыванию
	for ($i = 0; $i < count($inputArray) - 1; $i++) {
		for ($j = 0; $j < count($inputArray)- $i - 1; $j++) {
			if ($inputArray[$j] < $inputArray[$j+1]) {
				$temp = $inputArray[$j];
				$inputArray[$j] = $inputArray[$j+1];
				$inputArray[$j+1] = $temp;
			}
		}
	}
	return $inputArray;
}

/* Для двумерных массивов */

function transposeMatrix($matrix) {					// Транспонировать матрицу
	$result = array();
	for ($i = 0; $i < count($matrix); $i++) {
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			$result[$j][$i] = $matrix[$i][$j];
		}
	}
	return $result;
}

function sumMatrices ($matrix1, $matrix2) {				//Сложить две матрицы
	if (count($matrix1) != count($matrix2)) {			//если не совпадает число строк
		return false;
	}
	for ($i = 0; $i < count($matrix1); $i++) {
		if (count($matrix1[$i]) != count($matrix2[$i])) {	//если не совпадает число столбцов
			return false;
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
		$flag = 0;
		$sumRow = 0;
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			if ($matrix[$i][$j] == 0) {
				$flag = 1;
			}
			$sumRow = $sumRow + $matrix[$i][$j];
		}
		if ($sumRow > 0 && $flag == 1) {                  			//удаление строки
			for ($j = 0; $j < count($matrix[$i]); $j++) {
				$matrix[$i][$j] = NULL;                 		//для наглядности значение заменем на NULL
			}
		}
	}
	return $matrix;
}

// Удалить те столбцы, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент
function deleteColumns($matrix) {			
	for ($i = 0; $i < count($matrix); $i++) {
		$flag = 0;
		$sumColumn = 0;
		for ($j = 0; $j < count($matrix[$i]); $j++) {
			if ($matrix[$j][$i] == 0) {
				$flag = 1;
			}
			$sumColumn = $sumColumn + $matrix[$j][$i];
		}
		if ($sumColumn > 0 && $flag == 1) { 					//удаление столбца
			for ($j = 0; $j < count($matrix[$i]); $j++) {
				$matrix[$j][$i] = NULL;					//для наглядности значение заменяем на NULL
			}
		}
	}
	return $matrix;
}

/* РЕКУРСИИ */


function transformToBinaryByRecursion($decimalNumber) {         			 // преобразование в бинарное число с помощью рекурсии 
	$decimalNumber = abs($decimalNumber );						 // без привязки к знаку +,-
	do {
		$result = ($decimalNumber % 2);
		return transformToBinary(intdiv($decimalNumber, 2)) . $result;
	} while ($decimalNumber != 0);
}


//Написать функцию которая выводит первые N чисел фибоначчи с помощью рекурсии 
function printFibonacciByRecursion($limit) {						//вывод чисел
	function getFibonacciByRecursion($limit) {					//рекурсивная функция получения чисел Фибоначи
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
function sortArrayUpByRecursion($array, $low, $high) {				//метод быстрой сортировки
	$i = $low;                
	$j = $high;
	$middle = $array[($low + $high) / 2]; 					 // middle — опорный элемент, посередине между low и high
	do {
		while($array[$i] < $middle) {
			++$i;
		}  
		while($array[$j] > $middle) {
			--$j;
		}  
		if($i <= $j){
			$temp = $array[$i];
			$array[$i] = $array[$j];
			$array[$j] = $temp;
			$i++; 
			$j--;
		}
	} while($i < $j);
        if($low < $j){
		$array = sortArrayUpByRecursion($array, $low, $j);
	} 
	if($i < $high){
		$array = sortArrayUpByRecursion($array, $i, $high);
	} 
	return $array;
}

//суммирование матриц при помощи рекурсии
function sumMatricesByRecursion ($array1, $array2) {
	if (count($array1) != count($array2)) {				//если не совпадает число элементов
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



?>
