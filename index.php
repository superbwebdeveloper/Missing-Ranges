<?php
// Your code here!
 class Solution {
        public function getRange($n1, $n2) {
            return $n1==$n2 ? strval($n1) : sprintf("%d->%d" , $n1, $n2);
        }
        
        public function findMissingRanges(array $nums, $lower, $upper) {
            $res= array();
            $next = $lower;
            for ($i = 0; $i < count($nums); $i++) { 
                if($lower==PHP_INT_MAX) return res; 
                if ($nums[$i] < $next) { continue; }
                if ($nums[$i]==$next) {
                    $next++;
                    continue; 
                } 
                array_push($res,$this->getRange($next, $nums[$i] - 1));
                if($nums[$i]==PHP_INT_MAX) return $res; 
                $next=$nums[$i] + 1; 
            } 
                
            if ($next<=$upper) { 
                    array_push($res,$this->getRange($next, $upper));
            }
            return $res; 
        }                          

    }
    $obf = new Solution;
    print_r( $obf->findMissingRanges(array('0', '1', '3', '50', '75'),0,99));




    ///////////////////////////////////////////////////////////

    class Solution {

        /**
         * @param Integer[] $nums
         * @param Integer $lower
         * @param Integer $upper
         * @return String[]
         */
        var $result = [];
        
        function findMissingRanges($nums, $lower, $upper) {
            $n = count($nums);
            if ($n == 0 ) { 
                $this->addResult($lower, $upper);
                return $this->result;
            }
            
            if ($nums[0] > $lower) {
                $this->addResult($lower, $nums[0] - 1);
            }
            
            for ($i = 1; $i < $n; $i++ ) {
                if ($nums[$i] - $nums[$i-1] > 1) {
                    $this->addResult($nums[$i-1] + 1, $nums[$i] - 1);
                }
            }
            
            if ($nums[$n-1] < $upper) {
                $this->addResult($nums[$n-1] + 1, $upper);
            }
            return $this->result;
        }
        
        function addResult($min, $max) {
            if ($min == $max) {
                $this->result[] = (string)$min;
            } else {
                $this->result[] = $min . '->' . $max;
            }
        }
    }
?>
