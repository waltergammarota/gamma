<?php

class SQLQuery {
    protected $_dbHandle;
    protected $_result;

    // Connects to database
    function connect($address, $account, $pwd, $name) {
        $this->_dbHandle = mysqli_connect($address, $account, $pwd, $name);
        if (!$this->_dbHandle) {
            trigger_error("Mysql: Credentials error (".mysqli_connect_errno().")", E_USER_ERROR);
            return 0;
        }
    }

    // Disconnects from database
    function disconnect() {
        if (@mysqli_close($this->_dbHandle) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }
    
    // Select All 
    function selectAll() {
    	$query = 'select * from '.$this->_table.'';
    	return $this->query($query);
    }
    
    // Select a result by ID
    function select($id) {
        $query = 'select * from `'.$this->_table.'` where `id` = \''.mysqli_real_escape_string($this->_dbHandle, $id).'\'';
        return $this->query($query, 1);    
    }
    
    // Get affected results
    function affectedRows() {
    	return mysqli_affected_rows($this->_dbHandle);
    }

    // Helper method to escape strings
    function escape_string($string)
    {
        return mysqli_real_escape_string($this->_dbHandle, $string);
    }

	
    // Custom SQL Query
	function query($query, $singleResult = 0) {
		$this->_result = mysqli_query($this->_dbHandle, $query);
		if (preg_match("/select/i",$query)) {
    		$result = array();
    		$table = array();
    		$field = array();
    		$tempResults = array();
    		$numOfFields = mysqli_num_fields($this->_result);
    		while ($finfo = $this->_result->fetch_field()) {
    		    array_push($table,$finfo->table);
    		    array_push($field,$finfo->name);
    		}
			while ($row = mysqli_fetch_row($this->_result)) {
				for ($i = 0;$i < $numOfFields; ++$i) {
					$table[$i] = trim(ucfirst($table[$i]),"s");
					$tempResults[$table[$i]][$field[$i]] = $row[$i];
				}
				if ($singleResult == 1) {
		 			mysqli_free_result($this->_result);
					return $tempResults;
				}
				array_push($result,$tempResults);
			}
			mysqli_free_result($this->_result);
			return($result);
		}
	}

    // Get number of rows
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    // Free resources allocated by a query
    function freeResult() {
        mysqli_free_result($this->_result);
    }

    // Get error string
    function getError() {
        return mysqli_error($this->_dbHandle);
    }
}
