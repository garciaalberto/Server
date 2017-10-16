<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array ordenado</title>
    </head>
    <body>
        <?php

        function bubbleSort($array){
            $flag = true;
            $holder = 0;
            while($flag){
                $flag = false;
                for ($j = 0;$j < count($array) - 1 ; $j++){
                    if ($array[$j] > $array[$j + 1]){
                        $holder = $array[$j];
                        $array[$j] = $array[$j+1];
                        $array[$j+1] = $holder;
                        $flag = true;
                    }
                }
            }
            return $array;
        }

        function selectionSort($array){
            for ($i = 0; $i < count($array) -1; $i++){
                $index  = $i;
                for ($j = $i; $j < count($array); $j++){
                    if ($array[$j] < $array[$index]){
                        $index = $j;
                    }
                }
                $smaller = $array[$index];
                $array[$index] = $array[$i];
                $array[$i] = $smaller;
            }
            return $array;
        }
        $test_array = array(3, 0, 2, 5, -1, 4, 1);
        echo print_r($test_array);
        echo "<br>";
        echo print_r(bubbleSort($test_array));
        echo "<br>";
        echo print_r($test_array);
        echo "<br>";
        echo print_r(selectionSort($test_array));
        ?>
    </body>
</html>