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
        $xmlPageDom = new DOMDocument();
        @$xmlPageDom->loadHTML($item);
        $xmlPageXPath = new DOMXPath($xmlPageDom);
        return $xmlPageXPath;
    }

    $ddlPage = curlGet('http://bookdl.com/');
    $ddlPageXPath = returnXPathObject($ddlPage);
    $title = $ddlPageXPath->query('//h1');

    if($title->length > 0){
        $ddlBook['title'] = $title->item(0)->nodeValue;
    }

    $img = $ddlPageXPath->query('//img[@class="bookcover"]');

    if($img->length > 0){
        $ddlBook['img'] = $img->item(0)->nodeValue;
    }

    $bookInfo = $ddlPageXPath->query('//div[@class="iteminfo"]');

    if($bookInfo->length > 0){
        $ddlBook['bookinfo'] = trim($bookInfo->item(0)->nodeValue);
    }

    print_r($ddlBook);

?>