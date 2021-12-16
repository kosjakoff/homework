<?php

/* transform decimal number to binary */

function transformDecimalToBinary(int $decimalNumber): int {              
    
    $absValue = abs($decimalNumber);
    
    do {
        $result = ($absValue % 2) . $result;
        $absValue = intdiv($absValue, 2);
    } while ($absValue != 0);

    return $result;
}

/* transform binary number to decimal */

function transformToDecimal($binaryNumber): int { 
    
    for ($degree = 0; $binaryNumber > 0; $degree++){  
        $result = $result + $binaryNumber%10 * (2 ** $degree);
        $binaryNumber = (int)($binaryNumber/10);
    }
    
    return $result;
}


/* Fist N fibonacci numbers */

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

/* power of number */

function calculatePower(int $enteredNumber, int $power): float {  			
    $result = 1;
    $absolutePover = abs($power);
    
    for ($i = 1; $i <= $absolutePover; $i++) {
        $result = $result * $enteredNumber;
    }
    
    if ($power <= 0) {                    			
        $result = 1 / $result;
    }
   
    return $result;
}


/* is IP in range (for ipv4) */

function isIpInRange(string $inputIp, string $startIp, string $endIp): bool {
    
    function transformIpToDecimal(string $ip) {
        $ipOctets = explode(".", $ip);
        
        foreach ($ipOctets as $octet) {
            while (strlen($octet) < 3) {
                $octet = 0 . $octet;    
            }
            
            $result = $octet . $result;
        }
        return $result;
    }
    
    return (transformIpToDecimal($inputIp) >= transformIpToDecimal($startIp)  &&  transformIpToDecimal($inputIp) <= transformIpToDecimal($endIp));
}

/* calculate precentage of positive/negative/zero/simple elements in array */
 
function calculatePrecentage(array $inputElements, callable $isCondition): int {
    
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

/* callable  check condition function */

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


/* sort array up/down */

function sortArray (array &$inputElements, callable $compare): array {
    $count = count($inputElements);
    
    for ($i = 0; $i < $count - 1; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($compare($inputElements[$j], $inputElements[$j + 1]) > 0) {
                $temp = $inputElements[$j];
                $inputElements[$j] = $inputElements[$j + 1];
                $inputElements[$j + 1] = $temp;
            }
        }
    }
}

/*callable comparison function */

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


/* transpose Matrix */

function transposeMatrix(array $matrix): array {				
    
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            $result[$j][$i] = $matrix[$i][$j];
        }
    }
    
    return $result;
}

/* Sum of 2 matrices */

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

/* Delete rows which elements sum is positive (or there is at least 1 ZERO element)*/

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

/* delete columns which elements sum is positive (or there is at least 1 ZERO element) */

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

/* RECURSION */
/* transform decimal to binary */ 

function transformDecimalToBinaryByRecursion(int $decimalNumber): int {
    
    $decimalNumber = abs($decimalNumber );
    
    if($decimalNumber === 0) {
        return 0;
    }
    
    $result = ($decimalNumber % 2);
    
    return transformDecimalToBinaryByRecursion(intdiv($decimalNumber, 2)) . $result;
}


/* first N Fibonacci numbers by Recursion */

function printFibonacci(int $limit) {  
    if($limit === 0) {
        echo 'Zero limit, Fibonacci collect is empty!';
    }
        
    for ($i = 1; $i <= $limit; $i++) {
        echo calcFibonacciRecursion($i) . ', ';	
    }
}

function calcFibonacciRecursion(int $limit) {
    if ($limit <= 2) {
        return  $limit - 1;
    }
    return calcFibonacciRecursion($limit - 1) + calcFibonacciRecursion($limit - 2);
}


//  another variant 


function calculateFibonacciRecursion(int $limit, array $fibonacci = [0, 1]): array {
    
    if ($limit === 0) {
        return [];
    }
        
    if ($limit <= 2) {
        return array_slice($fibonacci, 0, $limit);
    }
    
    if($limit > count($fibonacci)) {
        $nextElement = [$fibonacci[count($fibonacci) - 1] + $fibonacci[count($fibonacci) - 2]];
        $fibonacci = calculateFibonacciRecursion($limit, array_merge($fibonacci, $nextElement));
    }
    return $fibonacci;
}


/* sort array by RECURSION */
// comparison functions are defined above

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


/* to sum Matrices by recursion */

function sumMatricesByRecursion (array $matrixLeft, array $matrixRight): array {
    
    if (count($matrixLeft) != count($matrixRight)) {
        throw new Exception('Matrix sises are not equal. ');
    }
    
    for ($i = 0; $i < count($matrixLeft); $i++) {
        if (is_array($matrixLeft[$i]) && is_array($matrixRight[$i])) {
            $result[$i] = sumMatricesByRecursion($matrixLeft[$i], $matrixRight[$i]);
        }
        else $result[$i] = $matrixLeft[$i] + $matrixRight[$i];
    }
    
    return $result;
} 


/ * to traverse and display all values of any array * /

function printAllArrayElements(array $inputElements) {
   
   for ($i = 0; $i < count($inputElements); $i++) {
        echo ' [' . $i . '] => ';
        
        if (is_array($inputElements[$i])) {
            echo ' array(';
            printAllArrayElements($inputElements[$i]);
        }
        else {
            echo  $inputElements[$i] . ', ';
        }
    }
    
    echo '), ';
}


