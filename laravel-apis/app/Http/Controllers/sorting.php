<?php

namespace App\Http\Controllers;

class sorting extends Controller {

    function sort ($string = ""){
        $lowwer_case_array = array();
        $upper_case_array = array();
        $number_array = array();
        $characters_array = array();
        $final_array = array();

        // separating the string
        for ($i = 0 ; $i < strlen($string) ; $i++){
            if (ord($string[$i]) > 64 && ord($string[$i]) < 91){
                array_push($upper_case_array, $string[$i]);
            }
            else if (ord($string[$i]) > 96 && ord($string[$i]) < 123){
                array_push($lowwer_case_array, $string[$i]);
            }
            else if (ord($string[$i]) > 47 && ord($string[$i]) < 58){
                array_push($number_array, $string[$i]);
            }
            else {
                array_push($characters_array, $string[$i]);
            }
        }

        sort($upper_case_array);
        sort($lowwer_case_array);
        sort($number_array);
        sort($characters_array);

        // sorting upper and lower
        foreach ($upper_case_array as $upper){
            foreach ($lowwer_case_array as $lower){
                if (ord($lower)-32 <= ord($upper) && ( !in_array($lower, $final_array) || $lower == $final_array[count($final_array)-1])){
                    array_push($final_array, $lower);
                }
            }
            array_push($final_array, $upper);
        }
        foreach ($lowwer_case_array as $lower){
            if (ord($lower)-32 > ord($upper)){
                array_push($final_array, $lower);
            }
        }
        // adding sorted numbers
        foreach ($number_array as $num){
                array_push($final_array, $num);
        }
        // adding special characters at the end
        foreach ($characters_array as $chr){
            array_push($final_array, $chr);
    }

    $final_string = implode($final_array);
    return response()->json([
        "string" => $final_string
    ]);
    }

}


?>