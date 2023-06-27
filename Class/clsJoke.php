<?php
class Jokes{
	public function connect()
	{
		$con= mysql_connect("localhost","joke","123456");
		if(!$con)
		{
			echo'ERROR.';
			exit();
		}
		else
		{
			mysql_select_db("joke_db");
			mysql_query('SET NAMES UTF8');
			return $con;
		}
	}
	           
 function updateVote($sql)
	{
		$link=$this->connect();
		if (mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}
?>