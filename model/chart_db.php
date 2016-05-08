<?php

/* 
 *  by meredith browne
 */



function get_top_tracks_xml() {
    $API_KEY = '3e58f8c505d3b12620a7a167bd13c067';
    $xml = "http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key={$API_KEY}";
    $xml = file_get_contents($xml);
    
    if (!$xml) {
        return; // artist lookup failed
    }
    
    $xml = new SimpleXMLElement($xml);
    return $xml;
}