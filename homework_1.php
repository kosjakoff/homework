# homework

<?php
function transformDecimalToBinary(int $decimalNumber): string {              
    
    $absValue = abs($decimalNumber);
    
    do {
        $result = ($absValue % 2) . $result;
        $absValue = intdiv($absValue, 2);
    } while ($absValue != 0);
    
    return $result;
}

function transformBinaryToDecimal(int $binaryNumber): int { 
    
    $arraySimbol = str_split($decimalNumber);
    
    foreach($arraySimbol as $value){
        if ((int)$value != 0 && (int)$value != 1) {
            throw new Exception('Entered number is not Binary');
        }
    }
    	
    $binaryArray = str_split(abs($binaryNumber));      	
    $degree = count($binaryArray);
    
    foreach ($binaryArray as $value){  
        $result = $result + $value * (2 ** --$degree);
    }
    
    return $result;
}


function calculateFibonacci (int $limit): array {				
    $result = [];
    
    for ($i = 0; $i < $limit; $i++) {
        if ($i <= 1) {
            $result[$i] = $i;
        }
        else {
            $result[$i] = $result[$i - 1] + $result[$i - 2];
        }
    }
    
    return $result;
}


function getPower (int $enteredNumber, int $power): int {  			
    $result = 1;
    
    for ($i = 1; $i <= abs($power); $i++) {
        $result = $result * $enteredNumber;
    }
    
    if ($power <= 0) {                    			
        $result = 1 / $result;
    }
   
    return $result;
}


//Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4

function isIpInRange(string $inputIp, string $startIp, string $endIp): bool {
    
    $inputOktets = explode(".", $inputIp);
    $startOktets = explode(".", $startIp);
    $endOktets   = explode(".", $endIp);

    $input = $inputOktets[0]*256*256*256+$inputOktets[1]*256*256+$inputOktets[2]*256+$inputOktets[3];    
    $start = $startOktets[0]*256*256*256+$startOktets[1]*256*256+$startOktets[2]*256+$startOktets[3]; 
    $end = $endOktets[0]*256*256*256+$endOktets[1]*256*256+$endOktets[2]*256+$endOktets[3];
        
    for ($i = $start; $i <= $end; $i++) {
        if ($input == $i) {
            return true;
        }
    }
    
    return false;
}

/* Для одномерного массива 
Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел */
 
function calculatePrecentageByUser(array $inputElements, callable $isCondition): int {
    
    if (count($inputElements > 0)) {
        $totalNumbers = 0;
        
        for ($i = 0; $i < count($inputElements); $i++) {
            if ($isCondition($inputElements[$i])) {
                $totalNumbers++;
            }
        }
        
        return ($totalNumbers * 100 / count($inputElements));
    }
    
    throw new Exception('Empty array()');
}

/* callable функции проверки соответствия элементов условию */

function isPositive(int $element): int {
    return ($element > 0);
}

function isNegative(int $element): int {
    return ($element < 0);
}

function isZero(int $element): int {
    return ($element === 0);
}

function isSimple(int $element): int {
    $tempCount = 0;
    
    for ($i = 1; $i < $element; $i++) { 
        if ($element % $i == 0) {
            $tempCount++;
        }
    }
    
    return $tempCount === 1;
} 


/* Отсортировать элементы по возрастанию/убыванию (мой аналог usort() методом пузырька) */

function sortArrayByUser (array $inputElements, callable $compare): array {
   
   for ($i = 0; $i < count($inputElements) - 1; $i++) {
        for ($j = 0; $j < count($inputElements) - $i - 1; $j++) {
            
            if ($compare($inputElements[$j], $inputElements[$j + 1]) > 0) {
                $temp = $inputElements[$j];
                $inputElements[$j] = $inputElements[$j + 1];
                $inputElements[$j + 1] = $temp;
            }
        }
    }
    
    return $inputElements;
}

/*callable функции сравнения по возрастанию и убыванию */
function compareElementsUp(int $leftElement, int $rightElement): int {
    
    if ($leftElement == $rightElement) {
        return 0;
    }
    return ($leftElement < $rightElement) ? -1 : 1;
}

function compareElementsDown(int $leftElement, int $rightElement): int {
    
    if ($leftElement == $rightElement) {
        return 0;
    }
    return ($leftElement > $rightElement) ? -1 : 1;
}


/* Для двумерных массивов */

function transposeMatrix(array $matrix): array {				
    
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            $result[$j][$i] = $matrix[$i][$j];
        }
    }
    
    return $result;
}

function sumMatrices (array $matrixLeft, array $matrixRight): array {				
    
    if (count($matrixLeft) != count($matrixRight)) {	
        throw new Exception('Matrix sizes are not equal');
    }
   
   for ($i = 0; $i < count($matrixLeft); $i++) {
        if (count($matrixLeft[$i]) != count($matrixRight[$i])) {	
            throw new Exception('Matrix sizes are not equal');
        }
       
       for ($j = 0; $j < count($matrixLeft[$i]); $j++) {
            $result[$i][$j] = $matrixLeft[$i][$j] + $matrixRight[$i][$j];
        }
    }
    
    return $result;
} 

// Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. 
function deleteRows(array $matrix): array {
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
function deleteColumns(array $matrix): array {			
    
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

function transformToBinaryByRecursion(int $decimalNumber): int {
    
    $decimalNumber = abs($decimalNumber );
    
    if($decimalNumber === 0) {
        return 0;
    }
    
    $result = ($decimalNumber % 2);
    
    return transformToBinaryByRecursion(intdiv($decimalNumber, 2)) . $result;
}


//Написать функцию которая выводит первые N чисел фибоначчи с помощью рекурсии 
function printFibonacci(int $limit) {  
    if($limit === 0) {
        echo 'No numbers';
    }
    
    function calculateFibonacciNumberByRecursion(int $limit) {
        if ($limit <= 2) {
            return  $limit - 1;
        }
        return calculateFibonacciNumberByRecursion($limit - 1) + calculateFibonacciNumberByRecursion($limit - 2);
    }
    
    for ($i = 1; $i <= $limit; $i++) {
        echo calculateFibonacciNumberByRecursion($i) . ', ';	
    }
}


/* Отсортировать элементы по возрастанию by RECURSION */
// функции сравнения определены выше

function sortArrayUpByRecursion(array &$Numbers, int $low, int $high, callable $compare) {	
    $indexLeft = $low;                
    $indexRight = $high;
    $middle = $Numbers[($low + $high) / 2]; 
    
    do {
        while($compare($Numbers[$indexLeft], $middle) < 0) {
            ++$indexLeft;
        }
        while($compare($Numbers[$indexRight], $middle) > 0) {
            --$indexRight;
        }
        if($indexLeft <= $indexRight) {
            $temp = $Numbers[$indexLeft];
            $Numbers[$indexLeft] = $Numbers[$indexRight];
            $Numbers[$indexRight] = $temp;
            $indexLeft++; 
            $indexRight--;
        }
    } while($indexLeft < $indexRight);
    
    if($low < $indexRight){
        sortArrayUpByRecursion($Numbers, $low, $indexRight, $compare);
    } 
    
    if($indexLeft < $high){
        sortArrayUpByRecursion($Numbers, $indexLeft, $high, $compare);
    } 
}


//суммирование матриц при помощи рекурсии
function sumMatricesByRecursion (array $matrixLeft, array $matrixRight): array {
    
    if (count($matrixLeft) != count($matrixRight)) {
        throw new Exception('размеры матриц не совпадают. ');
    }
    
    for ($i = 0; $i < count($matrixLeft); $i++) {
        if (is_array($matrixLeft[$i]) && is_array($matrixRight[$i])) {
            $result[$i] = sumMatricesByRecursion($matrixLeft[$i], $matrixRight[$i]);
        }
        else $result[$i] = $matrixLeft[$i] + $matrixRight[$i];
    }
    
    return $result;
} 


// Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
function getAllArrayElements(array $inputElements) {
   
   for ($i = 0; $i < count($inputElements); $i++) {
        echo ' [' . $i . '] => ';
        
        if (is_array($inputElements[$i])) {
            echo ' array( <BR>';
            getAllArrayElements($inputElements[$i]);
        }
        else {
            echo  $inputElements[$i] . '<br> ';
        }
    }
    
    echo ') <br>';
    return true;
}


