<?php

class FizzBuzz
{

        public function fizzbuzz() {

                for ($i = 0; $i < 100; $i++) {

                        if ($i % 3 == 0) echo 'Fizz';

                        else if ($i % 5 == 0) echo 'Buzz';

                        else if ($i % 3 && $i % 5 == 0) echo 'FizzBuzz';

                        else echo $i;

                }

        }

}

// Show result of above class

$getNumberResult = new FizzBuzz();
