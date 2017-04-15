<?php
/**
*@author Alieu Jallow
**/

/*
*database connection class
*/

//includes the credentials of the database
require_once('databaseCredentials.php');

/**
* 
*/
class Dbconnection
{
	//properties
	private $connection;
	private $result;

	//methods

	/*
	*connection method
	*@return returns true or false
	*/
	private function getConnection()
	{
		$this ->connection = mysqli_connect(SERVER,USER,PASS,DB);

		if ($this ->connection)
		{
			return true;
		}
		return false;
	}

	/*
	*query method
	*@param $sql
	*@return returns true or false
	*/
	function queryDatabase($sql)
	{
		//returns flase if connection is not established
		if(!$this->getConnection())
		{
			return false;
		}

		//run query  returns false if query fails
		$this->result = mysqli_query($this->connection,$sql);

		//closes the mysql connection
		mysqli_close($this->connection);
		
		//checks if the query fails
		if ($this->result == false) 
		{
			return false;
		}
		return true;
	}


	//function that returns the result
	function getResult()
	{
		return $this ->result;
	}

	/*
	*gets a row from the result
	*@return returns false or a row
	*/
	function getRow()
	{
		//checks if the result is false
		if ($this->result == false) 
		{
			return false;
		}

		//returns a row from the result or null if the result is null
		return mysqli_fetch_assoc($this->result);
	}

	/*
	*gets the number of rows from the result
	*@return returns false or the number of rows
	*/
	function getNumRows()
	{
		//checks if the result is false
		if ($this->result == false) 
		{
			return false;
		}

		//returns the number of rows from the result
		return mysqli_num_rows($this->result);
	}

}
?>