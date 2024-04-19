<?php

Class Upload extends Controller 
{
	function index()
	{

	
 	 	

 	 	if(isset($_POST['title']) && isset($_FILES['file']))
 	 	{
 	 		$uploader = $this->loadModel("upload_file");
 	 		$uploader->upload($_POST,$_FILES);
 	 	}
 	 	
 	 	$data['page_title'] = "Upload";
		$this->view("upload",$data);
 	 	
 	 	header("Location:". ROOT . "upload");
		die;
	}

	function image()
	{
 	 	
 	 	
	}



}