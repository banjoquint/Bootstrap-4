<?php	
include_once 'settings.php';
        
	
	/**
	 * Set up connection to database
	 *
	 */
	function connect_sql()
	{
		/**
		 * Database handle
		 *
		 * @global $dbh
		 */
		global $dbh;
	
		/**
		 * @todo Remove the try/catch block once development is done
		 */
		try {
				
			$dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB, DB_USER, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));	
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		} catch (Exception $e) {
	
			echo 'Fucking error occurred ' . $e->getMessage();
			exit;
		}
	}
        
        function select($sql,$values)
        {
            global $dbh;
	
		if ($sql > '')
		{
			if (is_array($values))
			{
				try
				{
					$stmt = $dbh->prepare($sql);
					$stmt->execute($values);
					$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($arr as &$value){
					    foreach ($value as &$string){
					        $string = html_entity_decode($string, ENT_IGNORE);        
					    }					   
					}
					return $arr;
	
				} catch (Exception $e) {
	
					echo $e->getMessage() . '<br>';
					echo sql_dekey($sql) . '<br>';
				}
	
			}else{
	
				echo 'Values not passed as array';
				exit;
			}
	
	
		}else {
	
			echo 'Sql statment is blank';
			exit;
		}
		return false; # keep Zend code-checker quiet
        }

		//Function to select a specifci row , should be  identified via a $_GET parm

           function select_A_Row($sql,$values)
        {
            global $dbh;
	
		if ($sql > '')
		{
			if (is_array($values))
			{
				try
				{
					//$stmt = $dbh->prepare($sql);
				$result=$dbh->query("SELECT * from users WHERE ID  = " . $_GET['userID']);
                                        //print_r($result);
                                       // exit();
                                       // $stmt->fetchColumn['FETCH_ASSOC'];
					foreach ($result as $value){
					    foreach ($value as $string){
					        $string = html_entity_decode($string, ENT_IGNORE);        
					    }					   
					}
					return $result;
	
				} catch (Exception $e) {
	
					echo $e->getMessage() . '<br>';
					echo sql_dekey($sql) . '<br>';
				}
	
			}else{
	
				echo 'Values not passed as array';
				exit;
			}
	
	
		}else {
	
			echo 'Sql statment is blank';
			exit;
		}
		return false; # keep Zend code-checker quiet
        }
        /**
 * This is a library file of common functions to be used with this login app
 */

function log_message($message=null){
    /**
     * This function will check for the existence of a text file and open to append
     * text to log progress of the app functionality
     * Amend to include date stamp on message.
     */
    if ($message==null){
        $message = 'default message';
    }
    
    $filename = 'log_file.txt';
    
    if (file_exists($filename)){
        echo "<br>The file $filename exists";
        /* get date
         * 
         */
        $date = rightHereRightNow();
        $handle =  fopen($filename, 'a') or die ('cannot open :' . $filename);
        fwrite($handle, $date." -- ". $message. PHP_EOL);
    } else {
        /* file name does not exist so create it for writing
         * 
         */
      $handle =  fopen($filename, 'a') or die ('cannot open :' . $filename);
      fwrite($handle, 'File opened for logging '.rightHereRightNow());
      return $handle;
    }
    
}

/**
 * Take a path as a string and make sure the folders exist. Create them
 * if they don't
 *
 * @author WJR
 * @param string $path
 * @return boolean
 *
 */
function isFolders($path)
{
    $subs = explode(DIRECTORY_SEPARATOR, $path);
    $wd = getcwd(); //This is important, it needs to be set back to this once this function finishes.
    chdir(ROOT_DIR);
    foreach ($subs as $folder)
    {
        if (!@chdir($folder))
        {
            if (mkdir($folder, 0777))
            {
                chmod($folder, 0777);
                chdir($folder);
                
            }else{
                return false;
            }
            
        }
    }
    chdir($wd);
    return true;
    
}

function rightHereRightNow()
{  
    $dt = new DateTime();
   return $date = $dt->format('D,M,Y H:i:s');
    
}
	function sql_dekey($sql)
	{
		return str_replace(CAT_AND_HONEY, '-----', $sql);
	}
        

	
	