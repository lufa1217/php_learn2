<?php
	function es($data, $charset = 'utf-8'){

		if(is_array($data)){
			return array_map(__METHOD__, $data);
		}else{
			return htmlspecialchars($data, ENT_QUOTES, $charset);
		}
	}

	function cken(array $in_data){

		$result = true;

		foreach ($in_data as $key => $value) {

			if(is_array($value)){
				$value = implode("",  $value);
			}

			if(!mb_check_encoding($value)){
				$result = false;
				break;
			}
		}
		return $result;
	}

?>
