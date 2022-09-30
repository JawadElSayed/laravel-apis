<?php

namespace App\Http\Controllers;

class convertingToBinary extends Controller {

    function convertToBinary ($text = "") {
        $converted_text = "";
        $num_part = "";
        for ($i = 0 ; $i < strlen($text); $i++){
            // taking number part
            if (is_numeric($text[$i])){
                if ( $i != strlen($text)-1 && is_numeric($text[$i+1])){
                    $num_part .= $text[$i];
                    continue;
                }
                $num_part .= $text[$i];
                // converting to binary
                $binary_part = decbin($num_part);
                $converted_text .= $binary_part;
                $num_part = "";
                continue;
            }
            $converted_text .= $text[$i];
        }
        return response()->json([
            "result" => $converted_text
        ]);
    }

}


?>