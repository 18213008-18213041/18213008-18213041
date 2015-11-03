<?php
	// Name/NIM		: Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
	// Date			: 3 November 2015
	// Source		: http://www.w3schools.com/php/php_mysql_select.asp

	$opt=array('location'=>'http://localhost/progif/soap-server.php','uri'=>'http://localhost/progif');
	$api=new SoapClient(Null,$opt);
	echo $api -> helloworld();
	echo "<br>";
	echo "5 + 7 = ";
	echo $api -> addition(5, 7);
	echo "<br>";
	echo $api -> printdata();
?>
