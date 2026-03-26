<?php
    // Given a list of numbers and a number k, return whether any two numbers from the list add up to k.
    // For example, given [10, 15, 3, 7] and k of 17, return true since 10 + 7 is 17.
    // Bonus: Can you do this in one pass?
    class Solution
    {
        public function hasPairWithSum(array $numbers, int $target): bool
        {
            $seen = [];
            foreach ($numbers as $n) {
                $compliment = $target - $n;
                if( isset( $seen[$compliment] ) ) {
                    return true;
                }
                $seen[$n] = true;
            }
            return false;
        }
    }

    echo "Enter the list of numbers:\n";
    $input1 = trim(fgets(STDIN));
    $numbers = array_map( 'intval', explode(" ", $input1)  );
    echo "Enter the target number:\n";
    $input2 = trim(fgets(STDIN));
    $target = intval($input2);

    $solution = new Solution();
    $output = $solution->hasPairWithSum($numbers, $target);

    echo "Output : " . ($output ? "true" : "false") . "\n";