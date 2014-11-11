<?php
class Conexao
{
	private $con;

	function getConnection()
	{
 		$this->con = mysqli_connect("localhost:3306","root","magnum", "akto_cau");
//		$this->con = mysqli_connect("localhost","root","root", "akto_cau");
		if (mysqli_connect_error()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $this->con;
	}

}

?>