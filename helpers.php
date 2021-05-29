<?php

if(!function_exists('form_class')){

    function form_class($errors, $field, $class="block w-full mt-1 rounded form-input", $lass_error="border-red-600"){
            if($errors->has($field)){
              return sprintf("%s %s", $class, $lass_error);
            }
            return $class;
    }
}