<?php
    // Given an array of integers, return a new array such that each element at index i of the new array is the product of all the numbers in the original array except the one at i.

    // For example, if our input was [1, 2, 3, 4, 5], the expected output would be [120, 60, 40, 30, 24]. If our input was [3, 2, 1], the expected output would be [2, 3, 6].

    class Solution
    {
        public function productExceptSelf(array $numbers) : array
        {
            $n = count($numbers);
            if ($n === 0) {
                return [];
            }
            $result = array_fill(0, $n, 1);
            $prefix = 1;
            for($i=0;$i<$n;$i++) {
                $result[$i] = $prefix;
                $prefix *= $numbers[$i];
            }
            $suffix = 1;
            for($i = $n-1;$i>=0;$i--) {
                $result[$i] *= $suffix;
                $suffix *= $numbers[$i];
            }
            return $result;
        }
    }

    echo "Enter the list of numbers:\n";
    $input1 = trim(fgets(STDIN));
    $numbers = array_map( 'intval', explode(" ", $input1)  );

    $solution = new Solution();
    $output = $solution->productExceptSelf($numbers);

    echo "Output : " . implode(', ', $output) . "\n";