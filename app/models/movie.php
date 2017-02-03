<?
class Movie extends Model {

    function top5($order="rating", $search = "") {
        // Check if there is a search term in the request, and add WHERE to the MySQL query.
        $filterQuery = "";
        if($search)
        {
        	$search = mysqli_real_escape_string($this->_dbHandle, $search);
            $filterQuery = ' WHERE  
            (show_title LIKE \'%'.$search.'%\') OR
            (show_cast LIKE \'%'.$search.'%\') OR
            (director LIKE \'%'.$search.'%\') OR
            (summary LIKE \'%'.$search.'%\') ';
        }
        return $this->query('SELECT * FROM ' . $this->_table . $filterQuery . '  ORDER BY ' . mysqli_real_escape_string($this->_dbHandle, $order) . ' DESC LIMIT 5');     	
    }

    // List all and search movies (/movies/index)
    function search($search)
    {
        return $this->query('SELECT * FROM '.$this->_table.' WHERE  
            (show_title LIKE \'%'.mysqli_real_escape_string($this->_dbHandle,$search).'%\') OR
            (show_cast LIKE \'%'.mysqli_real_escape_string($this->_dbHandle,$search).'%\') OR
            (director LIKE \'%'.mysqli_real_escape_string($this->_dbHandle,$search).'%\') OR
            (summary LIKE \'%'.mysqli_real_escape_string($this->_dbHandle,$search).'%\')
            ');   
    }

    function bulkAdd($movies) {
        //Generating the inserts, and escaping all the fields to avoid attacks and errors
        foreach ($movies as $movie) {
            $inserts[] = "(0,'" . 
                mysqli_real_escape_string($this->_dbHandle,$movie->show_id) . "', '" . 
                mysqli_real_escape_string($this->_dbHandle,$movie->show_title) . "', '" . 
                mysqli_real_escape_string($this->_dbHandle,$movie->release_year) . "', '" . 
                mysqli_real_escape_string($this->_dbHandle,$movie->category) . "', '" . 
                mysqli_real_escape_string($this->_dbHandle,$movie->director) . "', '" .
                mysqli_real_escape_string($this->_dbHandle,$movie->show_cast) . "', '" .
                mysqli_real_escape_string($this->_dbHandle,$movie->summary) . "', '" .
                mysqli_real_escape_string($this->_dbHandle,$movie->poster) . "', '" .
                mysqli_real_escape_string($this->_dbHandle,$movie->runtime) . "', '" .
                mysqli_real_escape_string($this->_dbHandle,$movie->rating) . "')";
        }
        $values = implode(",", $inserts);

        // Inserting all the movies at once, and using "IGNORE" to ignore the duplicated entries.
        $this->query('INSERT IGNORE INTO '.$this->_table.' 
            (`id`, 
                `netflix_id`, 
                `show_title`, 
                `release_year`, 
                `category`, 
                `director`, 
                `show_cast`, 
                `summary`, 
                `poster`, 
                `runtime`, 
                `rating`) VALUES 
            '.$values.'
        ');   

        // Return how many records where added
        return mysqli_affected_rows($this->_dbHandle);
    } 

    function reset()
    {
    	$this->query('DELETE FROM ' . $this->_table); 
    }
}