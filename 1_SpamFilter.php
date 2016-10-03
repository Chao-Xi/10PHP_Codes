<?php
     function is_Spam($text,$file,$plit=",",$regex=false)
	 {
		$handle=fopen($file,"rb");
		
		$contents=fread($handle,filesize($file));
		
		fclose($handle);
		
		$lines=explode("n",$contents);
		
		$arr=array();
		
		foreach($lines as $line)
		{ 
		  //list($a, $b, $c) = $my_array;
		  list($word,$count)=explode($split,$line);	
		  
		  if($regex)
		  {
		    $arr[$word]=$count;
		  }else
		  {
			$arr[preg_quote($word)]=$count;  
		  }
		} 
		 
		 preg_match_all("~".implode("|",array_key($arr))."~",$text,$matched);
		 
		 $temp=array();
         
		 foreach($matches[0] as $match)
		 {
		   if(!in_array($match,$temp))
		     {
			   $temp[$match]=$temp[$match]+1;
			   if($temp[$match]>=$arr[$word])	 
				 {
					 return true;
				 }
			 }	 
		 
		 } 		 
		 
		 return false;
	}
  
    $file="spam.txt";
	$str="This string has cat, dog word";
	if(is_spam($str,$file))
	{
	  echo "This is spam";	
	}else
	{
	  echo "this is not spam";	
	}



