

<?php
//calculates the N-th term
//for a given N

    class Pattern{
      protected static $user_input; //int []
      protected static $prime_list; // int []


      public static function __staticinit(){
        //static class members
        self::$user_input=  array();
        self::$prime_list= array();
      }


      //generate prime numbers
	     //in the range; min -max user input
      protected static function getPrime(){

        $i=0;
        $num=0;
        $prime_index =0;
        self::$prime_list = array();
        $last_value = self::$user_input[(count(self::$user_input))-1];
        $first_value = self::$user_input[0];
        self::$prime_list = array();

        for($i=$first_value;$i<=$last_value;$i++){

          $counter = 0;
          for($j=1;$j<=$i;$j++){


                if($i % $j==0){

                      $counter++;
                }
          }


        if($counter==2){

               array_push(self::$prime_list,$i);
             }
          }

      }

      // binary search function
      function binarySearch(Array $sortedPrimeList, $key){

          if (count($sortedPrimeList) === 0){
              $value = 0;
              }
          $low = 0;
          $high = count($sortedPrimeList) - 1;

          while ($low <= $high) {


              $mid = floor(($low + $high) / 2);


                if($sortedPrimeList[$mid] == $key) {
                    return $mid; // middle value
                  }

                if ($key < $sortedPrimeList[$mid]) {

                    $high = $mid -1; // search on the left
                  }
                else {

                  $low = $mid + 1; // on the right
                  }

                }
              return -($low + 1); // if not found
    }


      //calculate the nearest
      // to current value of user input

      public static function series(){
        foreach(self::$user_input as $key){
          $index = Pattern::binarySearch(self::$prime_list,$key);
          $closest = 0;
          $nTh_term = 0;

          if(($index >= 0)){
            $closest = self::$prime_list[$index];
            $nTh_term = abs(($key - $closest));
            print($nTh_term."\n");

          }
          else{
            $index = (-$index -1);
            if(($index == 0)){
              $closest = self::$prime_list[$index];
              $nTh_term = abs(($key - $closest));
              print($nTh_term."\n");


            }
            elseif (($index==count(self::$prime_list))) {
              $closest = self::$prime_list[($index - 1)];
              $nTh_term = abs(($key - $closest));
              print($nTh_term."\n");

            }
            else{
              $prev = self::$prime_list[($index -1)];
              $next = self::$prime_list[$index];


              $prev_diff = abs(($key - $prev));
              $next_diff = abs(($key - $next));

              if(($prev_diff > $next_diff)){
                $closest = $next;
                print($next_diff."\n");
              }
              elseif (($prev_diff <= $next_diff)) {
                $closest = $prev;
                print($prev_diff."\n");
              }
              else{
                $closest = $prev;
                print($prev_diff."\n");
              }
            }
          }
        }

      }

      // equivalent java main method
      public static function main(){
        print("Input:"."\n");
        $test_case = rtrim(fgets(STDIN));
        if((($test_case >=1) ||($test_case <=200))){
          self::$user_input = array();
          for($i=0;($i<$test_case);++$i){
            $input_value = rtrim(fgets(STDIN));
            if((($input_value >=1) || ($input_value <=1000000))){
              array_push(self::$user_input,$input_value);
          }
        }
      }
      sort(self::$user_input); // sorts array in ascending order
      Pattern::getPrime();
      print(""."\n");
      print("Output:"."\n");
      Pattern::series();

    }
  }
  Pattern::main();
  Pattern::__staticinit(); //initialize static variables on load





 ?>
