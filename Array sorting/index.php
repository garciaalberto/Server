<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array sorter</title>
    </head>
    <body>
        <form method="POST">
        <select name="algoritm">
        <option value="" selected="selected">Algoritm to use</option>
        <option value="bubble">Bubble Sort</option>
        <option value="selection">Selection Sort</option>
        <option value="quick">Quick Sort</option>
        </select>
        <select name="array">
        <option value="" selected="selected">Type of array</option>
        <option value="Hardcode">Hardcoded</option>
        <option value="Random">Randomized</option>
        <option value="External">From CSV</option>
        <option value="Insert">Insert =></option>
        </select>
            <input type="text" name='insertedarray' value='Write the comma separated values'>
            <input type="submit" value="Seleccionar!" >
        </form>
        <?php
        /*
         * Is solo function. It makes a quick comprovation if the array lenght is superior to one, therefore it shouldn't be sorted
         * */
        function isSolo($array){
            if (count($array) <= 1){ // If the condition is true and the count is minor or equal to 1, returns a boolean true value
                return true;
            }
            else {
                return false; // If not, returns a false
            }
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
        
        /*
         * Randomize Array. It recieves a integer number and returns you a random array (with values between -100 and 100) with that number of integers inside
         * */
        function randomizeArray($length){ //TODO: Maybe turn that -100 to 100 thing into args of the function
            $array = array(); // creates an empty array
            for ($i = 0; $i < $length; $i++){
                array_push($array, rand(-100, 100)); // pushes a number between the -100 and 100 into the array for every iteration of the arg number 
            }
            return $array; // returns the created array
        }
        
        /*
         *  Algoritm selector. It recieves a array to sort and the algorythm it should use to sort it and returns the sorted array
         */
        function selectorAlgoritm($algoritm, $array){
            if ($algoritm == "bubble"){
                return bubbleSort($array);
            }
            if ($algoritm == "quick"){
                return quickSort($array);
            }
            if ($algoritm == "selection"){
                return selectionSort($array);
            }
            else{
                echo "";
            }
        }
        
        /*
         * Array selector. It recieves the array tag and returns the array to sort
         */
        function selectorArray($array){
            if ($array == "Hardcode"){
                return [2, 4, -1, 5, 8, 1, 0, -4, 11, 3];
            }
            if ($array == "Random"){
                return randomizeArray(10);
            }
            if ($array == "Insert"){
                return explode(",",$_POST["insertedarray"]);
            }
            if ($array == "External"){
                return explode(",",fread(fopen("values.csv", "r"), filesize("values.csv")));
            }
            else{
                echo "";
            }
        }
        
        /*
         * And there is a load of echoes to demostrate that the algorythms work
         * */
        $algoritm = $_POST["algoritm"];
        $array = selectorArray($_POST["array"]);
        echo "<h2> Unsorted Array </h2>";
        echo print_r($array);
        echo "<h2> Sorted Array </h2>";
        echo print_r(selectorAlgoritm($algoritm, $array));
        ?>
    </body>
</html>