<?php

    function mb_encoding($string)
    {
        return mb_convert_encoding($string, "UTF-8");
    }

?>