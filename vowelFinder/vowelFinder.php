<?php

class VowelFinder

{

        public function findVowelsAndCount($string) {
            
            $string     = strtolower($string);
            
            if($string[0]=='y' && strlen($string)>1) {
                // is accept equal to y and greater then 1
                $vowels = array('a','e','i','o','u','y');
            } else {

                $vowels = array('a','e','i','o','u');
            }

            //find length of the string
            $len    = strlen($string);
            $num    = 0;
            
            $getVowels      = [];
            $AllVowelCount  = preg_match_all('/[aeiou]/i',$string,$matches);

            //loop through each letter
            if($getVowels>1) {

                for($i=0; $i<$len; $i++){
                    if(in_array($string[$i], $vowels))
                    {
                        $getVowels[]= $string[$i];
                        $num++;
                    }
                }
            
            }
            
            
            //output show vowels in given string and order asper string start.
            print_r($getVowels);
            
            //output show vowels count
            echo "</br>Number of vowels : ". $num ."";
                

        }

}

$getVowelFinder = new VowelFinder();

print_r($getVowelFinder->findVowelsAndCount('yes'));
