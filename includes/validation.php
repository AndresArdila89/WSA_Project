<?php
// validate if the string contains a numeric value
function hasNumbers($str)
{
    for($i = 0; $i < mb_strlen($str); $i++)
    {
        $char = $str[$i];
        if(is_numeric($char))
        {
            return true;
        }
    }
    return false;
}

?>