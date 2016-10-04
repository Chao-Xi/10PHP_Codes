<?php 
    set_time_limit(0);
	//Limits the maximum execution time
	
	//support all file types
	
	//URL HERE
	$url="";
	$pi=pathinfo($url);
	
	$ext=$pi['extension'];
	$name=$pi['filename'];
	
	//create a new cURL resource
	$ch=curl_init();
	
	//set url and other appropriate options
	curl_setopt($ch,CURLOPT_URL,$url);
	
	curl_setopt($ch,CURLOPT_HEADER,false); 
	
	curl_setopt($ch,CURLOPT_BINARYTRANSFER,true); 
	
	curl_setopt($ch,CURLOPT_AUTOREFERER,true); 
	
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true); 
	
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
	
	//grab URL and transfer it to the browser
	$opt=curl_exec($ch);
	
	//close  cURl and free up system resource
	
	curl_close($ch);
	
	$saveFile=$name.'.'.$ext;
	
	if(preg_match("/[^0-9a-z._-]/i",$saveFile))
	{ 
	   $saveFile=md5(microtime(true)).'.'.$ext;
		}
	
	$handle=fopen($saveFile,"wb");
	fwrite($handle,$opt);
	fclose($handle);
	
	
	
	
	
	
	
	
	
	
	
	
	
	