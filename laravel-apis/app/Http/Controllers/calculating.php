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
            // implementing opperater
            else {
                $num1 = array_pop($stack);
                $num2 = array_pop($stack);
                
                switch ($string[$i]) {
                    case '+':
                        array_push($stack, $num1 + $num2);
                        break;
                    case '-':
                        array_push($stack, $num1 - $num2);
                        break;
                    case '/':
                        array_push($stack, $num1 / $num2);
                        break;
                    case '*':
                        array_push($stack, $num1 * $num2);
                        break;
                }
            }
        }
        if (count($stack) > 0){
            return response()-> json([
                "result"=> $stack[0]
            ]);
        }
        return response()-> json([
            "result"=> "no result"
        ]);
    }
}

?>