<?php
    // Given the mapping a = 1, b = 2, ... z = 26, and an encoded message, count the number of ways it can be decoded.
    // For example, the message '111' would give 3, since it could be decoded as 'aaa', 'ka', and 'ak'.
    // You can assume that the messages are decodable. For example, '001' is not allowed.

    class MessageDecoder
    {
        public function countDecodingWays(string $message): int
        {
            $n = strlen($message);

            if ($n === 0 || $message[0] === '0') {
                return 0;
            }

            $prev1 = 1;
            $prev2 = 1;

            for($i=2; $i<=$n;$i++) {
                $current = 0;
                $digit = intval( substr($message, $i-1, 1) );
                if ($digit >= 1 && $digit <= 9) {
                    $current += $prev1;
                }

                $twoDigit = intval( substr($message, $i-2, 2) );
                if( $twoDigit >= 10 && $twoDigit <= 26 ) {
                    $current += $prev2;
                }
                $prev2 = $prev1;
                $prev1 = $current;
            }

            return $prev1;
        }
    }

    echo "Enter the message: \n";
    $message = trim(fgets(STDIN));
    $decoder = new MessageDecoder();
    echo $decoder->countDecodingWays($message);
