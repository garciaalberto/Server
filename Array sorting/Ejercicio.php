<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array ordenado</title>
    </head>
    <body>
        <?php
        /*
         * Is solo function. It makes a quick comprovation if the array lenght is superior to one, therefore it shouldn't be sorted
         */
        function isSolo($array){
            if (count($array) <= 1){ // If the condition is true and the count is minor or equal to 1, returns a boolean true value
                return true;
            }
            else {
                return false; // If not, returns a false
            }
        }
        /*
         * Bubble sort function. It recives a array of integers and sorts it from less to more
         * */
        function bubbleSort($array){
            if (isSolo($array)){
                return $array;
            }
            $flag = true; // sets a flag that determines the state of the index (if it's changed or not)s
            while($flag){ // this loop executes as long as the array needs to be ordered
                $flag = false; // Use this to break the loop
                for ($j = 0;$j < count($array) - 1 ; $j++){ // For every number int in the array
                    if ($array[$j] > $array[$j + 1]){ // where the number is bigger than the next number
                        $holder = $array[$j]; // switch those numbers, using a helper holder variable
                        $array[$j] = $array[$j+1];
                        $array[$j+1] = $holder;
                        $flag = true; // set the array as unordered to continue sorting
                    }
                }
            }
            return $array; // this here returns the ordered array
        }

        /*
         * Selection sort function. It recives a array of integers and sorts it from less to more
         * */
        function selectionSort($array){
            if (isSolo($array)){
                return $array;
            }
            for ($i = 0; $i < count($array) -1; $i++){ // for every number in the array
                $index  = $i; // sets a index that will go from 0 to the lenght of the array
                for ($j = $i; $j < count($array); $j++){ // nests another for
                    if ($array[$j] < $array[$index]){ // and does the statement that goes when the iterator is smaller than the index
                        $index = $j; // index is now the smaller number
                    }
                }
                $holder = $array[$index]; // we save index as the smaller number
                $array[$index] = $array[$i]; // and then switch it by the number on the first iteration
                $array[$i] = $holder; // finally we switch the other number
            }
            return $array; // returns the sorted array
        }

        /*
         * Quick sort function. It recives a array of integers and sorts it from less to more
         * */
        function quickSort($array){
            if (isSolo($array)){
                return $array;
            }
            $pivot = $array[0]; // sets a pivot
            $left = []; // creation of two independent arrays that will go to both sides of the pivot
            $right = [];
            for($i = 1; $i < count($array); $i++){ // for every number in the array
                if($array[$i] < $pivot){  // if the pivot is bigger than the number it switches to the left
                    $left[] = $array[$i];
                }
                else{
                    $right[] = $array[$i]; // if not, it switches to the right
                }
            }
            $sortedArray = array_merge(quickSort($left), array($pivot), quickSort($right)); // makes the sorted array from sorting recursively the right and left pivot respectively
            return $sortedArray; // returns the sorted array
        }

        $test_array = array(3, 0, 2, 5, -1, 4, 1);
        echo print_r($test_array);
        echo "<br>";
        echo print_r(bubbleSort($test_array));
        echo "<br>";
        echo print_r($test_array);
        echo "<br>";
        echo print_r(selectionSort($test_array));
        echo "<br>";
        echo print_r($test_array);
        echo "<br>";
        echo print_r(quickSort($test_array));
        ?>
    </body>
</html>
