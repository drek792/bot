<?php

    // Get current page URL 
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
    $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
    
    // Get server related info 
    $user_ip_address = $_SERVER['REMOTE_ADDR']; 
    $referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
    $log = "page_url: $currentURL, referrer url: $referrer_url, user_ip address: $user_ip_address, user agent: $user_agent";
    
    $myfile = file_put_contents('visits.txt', $log.PHP_EOL , FILE_APPEND | LOCK_EX);
?>