<!--Using PHP to make a simple cURL request-->

<?php
    function curlGet($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);

        $results = curl_exec($ch);
        curl_close($ch);
        return $results;
    }

    $andelaPage = curlGet('http://bookdl.com/');
    echo $andelaPage;

?>