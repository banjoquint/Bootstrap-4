<?php
	/**
	 * Global settings for ATS
	 * 
	 * This script will store application wide settings, constants etc.
	 * 
	 * @author WJR
	 * 
	 */
	date_default_timezone_set('Europe/London');
	
	ini_set('display_errors','On'); 
	
	 define('DB_USER', 'will');
	 define('DB_PASSWORD', 'bungh0l3');
	 define('DB', 'renegade');
	 define('DB_HOST', 'localhost');
	
	define('CURRENCY', 'GBP');
	define('CAT_AND_HONEY', 'S9LOw9C');
	define('APP_DATE_FORMAT', 'Y-m-d H:i:s');
	define('LOCKIT', 'f47u6TD7YAbDjUpZ');
	define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT']);
	
	