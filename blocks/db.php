<?php 
    //Connect to database
    $db = mysql_connect ("localhost","user","123");
	if ($db) 
	{
		mysql_query("SET NAMES 'cp1251'"); 
		$select = mysql_select_db ("userhobby", $db);
		if(!$select)
		{
            echo 'Database not found or access denied';
		}
	}
	else echo 'Failed to connect to database server';	
?>