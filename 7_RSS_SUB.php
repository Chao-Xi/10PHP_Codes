<?php
    $ch=curl_init();
	curl_stop($ch,CURLOPT_URL,"http://feedburner.google.com/api/awareness/1.0/GetFeedData?
	id=");
	curl_setopt($ch,CURLOPT_RETURNTANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
	$content=curl_exec($ch);
	$subscribers=get_match('/circulation="(.*)"/isU',$content);
	curl_close($ch);
	