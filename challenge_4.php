<?php
    // Given an array of integers, find the first missing positive integer in linear time and constant space. In other words, find the lowest positive integer that does not exist in the array. The array can contain duplicates and negative numbers as well.
    // For example, the input [3, 4, -1, 1] should give 2. The input [1, 2, 0] should give 3.

    class Solution
    {
        public function firstMissingPositive(array $numbers): int
        {
            $n = count($numbers);

            for ($i=0; $i<$n; $i++) {
                if ( $numbers[$i] <= 0 || $numbers[$i] > $n ) {
                    $numbers[$i] = $n + 1;
                }
            }
            for ($i=0; $i<$n; $i++) {
                $number = abs($numbers[$i]);
                if ( $number !== $n+1 ) {
                    $numbers[$number - 1] = -1 * abs($numbers[$number-1]);
                }
            }
            for($i=0;$i<$n;$i++) {
                if ($numbers[$i] > 0) {
                    return $i+1;
                }
            }
            return $n+1;
        }
    }

    echo "Enter the numbers:\n";
    $input = trim(fgets(STDIN));
    $numbers = array_map("intval", preg_split('/\s+/', $input, -1, PREG_SPLIT_NO_EMPTY));

    $solution = new Solution();
    $output = $solution->firstMissingPositive($numbers);

    echo "Output: {$output}\n";