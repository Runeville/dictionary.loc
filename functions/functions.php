<?php

    function debug($arr){
        echo '<pre>' . print_r($arr, 1) . '</pre>';
    }

    function insert($bd, $word, $translation){
        $insert = "INSERT INTO enwords (word, translation) VALUES ('{$word}', '{$translation}')";
        return mysqli_query($bd, $insert);
    }

    function select($bd){
        global $res_select;

        $select = 'SELECT word, translation FROM enwords ORDER BY id DESC';
        $res_select = mysqli_query($bd, $select);
        return $res_select = mysqli_fetch_all($res_select, MYSQLI_ASSOC);
    }

    function upper($str, $encoding = 'UTF8'){
        return
            mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
            mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
    }