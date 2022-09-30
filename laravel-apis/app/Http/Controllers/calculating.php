<?php

namespace App\Http\Controllers;

class calculating extends Controller {

    function calculate ($string = "") {
        $stack = array();
        $num = "";
        for ($i = strlen($string) - 1; $i >= 0 ; $i-- ){
            if ($string[$i] == " "){
                continue;
            }
            // sapparating numbers
            if (is_numeric($string[$i]) || ($i != strlen($string) - 1 && $string[$i] != " " &&  is_numeric($string[$i + 1]) )){
                if ($string[$i -1] != " "){
                    $num = $string[$i] . $num;
                    continue;
                }
                $num = $string[$i] . $num;
                array_push($stack, $num);
                $num = "";
            }
        }
       
    }

}

?>