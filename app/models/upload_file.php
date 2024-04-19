<?php

Class Upload_file
{


	function get_random_string_max($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$random_string = '';
	
		for ($i = 0; $i < $length; $i++) {
			$random_string .= $characters[rand(0, strlen($characters) - 1)];
		}
	
		return $random_string;
	}



	function upload($POST,$FILES)
	{
		$DB = new Database();
		$_SESSION['error'] = ""; 

		$allowed[] = "fichier/pdf";

		if(isset($POST['title']) && isset($FILES['file']))
		{
			//upload file
			if($FILES['file']['name'] != "")
			{


			 	$folder = "/Applications/XAMPP/xamppfiles/htdocs/WorkEdu_Web_project/uploads/";
			 	if(!file_exists($folder))
			 	{
			 		mkdir($folder,0777,true);

			 	}

			 	$destination = $folder . $FILES['file']['name'];

				move_uploaded_file($FILES['file']['tmp_name'], $destination);

			}else{
				$_SESSION['error'] = "This file could not be uploaded";
			}

			if($_SESSION['error'] == "")
			{

				//save to db
				$arr['title'] = $POST['title'];
				$arr['destination'] = $destination;
				
				$arr['url_address'] = $this->get_random_string_max(60);
				$arr['date'] = date("Y-m-d H:i:s");

				$query = "insert into fichier (title,url_address,date,destination) values (:title,:url_address,:date,:destination)";
				$data = $DB->write($query,$arr);
				if($data)
				{
					
					header("Location:". ROOT . "home");
					die;
				}
			}

		
		}
	}


}
