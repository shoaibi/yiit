<?php

class YHelper
{
    /**
     *
     * @param int $length MAX=32
     * @return string 
     */
    public static function generateRandom($length=32)
    {
        return substr(str_shuffle(md5
                    (sha1
                    (uniqid('', true)).dechex(time()).dechex(mt_rand(1, 65535)))
                    )
                    , 0, $length);        
    }
    
}
?>
