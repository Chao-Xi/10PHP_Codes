<?php
     $conn=new mysqli("localhost","username","password","database");
     $filename=$_GET['file'];
	 //Query the file ID
	 $query=sprintf("select * from tableName where id='s%'",mysqli_real_escape_string($conn,$filename));
	 //Sprintf:Return a formatted string
	 //The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	 
	 $sql=mysqli_query($conn,$query);
	 if(mysqli_num_rows($sql)>0)
	 {
	   $row=mysqli_fetch_array($sql);
	 
     //set some header
	 header("Pargma:public");
     header("Express:0");
	 header("Cache-control:must_revalidate,post-check=0,pre-check=0");
	 header("Content-Type:application/force-download");
	 header("Content-Type:application/octet-stream");
	 header("Content-Type:application/download");
	 header("Content-Disposition:attachment;filename=".basename($row['FileName']).";");
	 header("Content-Transfer:binary");
	 header("Content-Length:".filesize($row['FileName']));
	 
	 @readfile($row['FileName']);
	 exit(0);
	 
	 }else
	 {
	   header("Location:/");
	   exit;	 
	 }