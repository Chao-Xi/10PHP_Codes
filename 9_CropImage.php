<?php  
     $filename="text.jpg";
	 $list($w,$h,$type,$attr)=getimagesize($filename);
	 $src_im=imagecreatefromjpeg($filename);
	 
	 $src_x="0";  //begin X
	 $src_y="0";  //begin X
	 $src_w="100";  //width
	 $src_h="100";  //height
	 $dst_x="0";  //destination X
	 $dst_y="0";  //destination y
	 
	 $dst_im=imagecreatetruecolor($src_w,$src_h);
	 
	 $white=imagecolorallocate($dst_im,255,255,255);
	 
	 imagefill($dst_im,0,0,$white);
	 
	 imagecopy($dst_im,$src_im,$dst_y,$dst_x,$src_x,$src_y,$src_w,$src_h);
	 
	 header("Content-type:image/png");
	 imagedestory($dst_im);