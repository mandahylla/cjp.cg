<?php 

// fonction à intégrer pour la création des administrateurs
$data['userid'] = $DB->generate_id(20);

public function generate_id($max)
	{

		$rand = "";
		$rand_count = rand(4,$max);
		for ($i=0; $i < $rand_count; $i++) { 
			# code...
			$r = rand(0,9);
			$rand .= $r;
		}

		return $rand;
	}