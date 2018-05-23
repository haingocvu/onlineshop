<?php  

function createToken(){
	$str = "QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm1234567890";
	$rs = "";
	for($i = 0; $i < 30; $i++){
		$rs .= substr($str, rand(0, strlen($str) -1), 1);
	}
	return $rs;
}

?>