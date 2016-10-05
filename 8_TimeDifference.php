<?php
    function ago($time)
	{
		$periods=array("second","minutes","hour","day","week","month","year","decade");
		$lengths=array("60","60","24","7","4.35","12","10");
		//365/7/4=4.35
		
		$now=time();
		
		$difference=$now-$time;
		
		for($j=0;$j>=$lengths[$j]&&$j<count($lengths);$j++)
		{
		 $difference/=$lengths[$i]; 	
		}
		
		$difference=round($difference);
		
		if($difference!=1)
		{ 
		 $periods[$j].="s";
			}
			
		return $difference.$periods[$j].'ago';
			
    }
   