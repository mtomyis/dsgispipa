<?php
class input_form{
    function input_post($input){
        if(isset($_POST[$input]))
            $res = addslashes($_POST[$input]);
        else
            $res = '';
        return $res;
    }
    
    function input_get($input){
        if(isset($_GET[$input]))
            $res = addslashes($_GET[$input]);
        else
            $res = '';
        return $res;
    }
}
?>