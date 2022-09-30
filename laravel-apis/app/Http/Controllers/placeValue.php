<?php

namespace App\Http\Controllers;

class PlaceValue extends Controller {

    function placeValue ($int = 0){
        $array = array();
        $count = 0;
        while ($int >= 1 || $int <= -1){
            $sliced_num = $int%10;
            $sliced_num *= 10**$count;
            array_push($array, $sliced_num);
            $int /= 10;
            $count++;
        }
        $array = array_reverse($array);
        return response()->json([
            "result" => $array
        ]);
    }

}


?>