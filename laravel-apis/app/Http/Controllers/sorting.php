<?php

namespace App\Http\Controllers;

class sorting extends Controller {

    function sort ($string = "eA2a1E"){
        $lowwer_case_string = "";
        $upper_case_string = "";
        $number_string = "";
        $characters_string = "";

        // separating the string
        for ($i = 0 ; $i < strlen($string) ; $i++){
            if (ord($string[$i]) > 64 && ord($string[$i]) < 91){
                $upper_case_string .= $string[$i];
            }
            else if (ord($string[$i]) > 96 && ord($string[$i]) < 123){
                $lowwer_case_string .= $string[$i];
            }
            else if (ord($string[$i]) > 47 && ord($string[$i]) < 58){
                $number_string .= $string[$i];
            }
            else {
                $characters_string .= $string[$i];
            }
        }
    }

}


?>