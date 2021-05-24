<?php

namespace App\Libraries;

class AdRecursionHelper {
    static function recursion($index, $arr_length) {
        if($index < $arr_length){
            return $index;
        } else {
            $recur_index = $index - $arr_length;
            return AdRecursionHelper::recursion($recur_index, $arr_length);
        }
    }
}
?>
