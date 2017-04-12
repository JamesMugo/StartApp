<?php
/**
*@author Alieu Jallow
**/

/*
*database connection class
*/

//includes the credentials of the database
require_once('dbcredentials.php');

/**
* 
*/
class Dbconnection
{
	//properties
	public $connection;
	public $result;

	//methods

	/*
	*connection method
	*@return returns true or false
	*/
	function getConnection()
	{
		$this ->connection = mysqli_connect(SERVER,USER,PASS,DB);

		if (mysqli_connect_errno())
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	/*
	*query method
	*@param $sql
	*@return returns true or false
	*/
	function query($sql)
	{
		if(!$this->getConnection())
		{
			return false;
		}

		//reun query
		$this->result = mysqli_query($this->connection,$sql);

		if ($this->result == false) 
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	/*
	*fetch method
	*@return returns true or false
	*/
	function fetch()
	{
		//checks if the result has content
		if ($this->result == false) 
		{
			return false;
		}

		//return result  it returns only one record
		return mysqli_fetch_assoc($this->result);
	}

	/*
	*fetch method
	*@return returns true or false
	*/
	function getRows()
	{
		//checks if the result has content
		if ($this->result == false) 
		{
			return false;
		}

		//return result  it returns only one record
		return mysqli_num_rows($this->result);
	}

}
?>