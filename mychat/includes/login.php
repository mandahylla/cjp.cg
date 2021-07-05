<?php 

$info = (Object)[];

	$data = false;
 
	//validate info
 	$data['email'] = $DATA_OBJ->email;

 	if(empty($DATA_OBJ->email))
 	{
 		$Error = "Entrer un email valide s'il vous plait !";
 	}

 	if(empty($DATA_OBJ->password))
 	{
 		$Error = "Entrer un mot de passe valide !";
 	}

 	
	if($Error == "")
	{

		$query = "select *,name AS username from admin_verity where email = :email limit 1";
		$result = $DB->read($query,$data);

		if(is_array($result))
		{
			$result = $result[0];
			if($result->password == md5($DATA_OBJ->password))
			{
				$_SESSION['userid'] = $result->userid;
				$info->message = "Vous êtes maintenant connecté !";
				$info->data_type = "info";
				echo json_encode($info);

			}else{

				$info->message = "vous avez entre un mauvais mots de passe";
				$info->data_type = "error";
				echo json_encode($info);
			}
			
		}else
		{

			$info->message = "Votre email n'est pas correcte";
			$info->data_type = "error";
			echo json_encode($info);

		}
	}else
	{
		$info->message = $Error;
		$info->data_type = "error";
		echo json_encode($info);
	}

