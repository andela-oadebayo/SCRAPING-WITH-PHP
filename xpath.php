<?php
    function curlGet($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $results =curl_exec($ch);
        curl_close($ch);
        return $results;
    }

    $dllBook = array();
    function returnXPathObject($item){

    }
?>