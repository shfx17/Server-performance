<?php

	class ShfTestBenchmark{
		
		private $host;
		private $db_user;
		private $db_password;
		private $db_name;
		
		public static $request = 100000;
		
		public function infoSystem() {
			echo "Version: ".$system['version'] = "<b>1.0</b><br />";
			echo "Date: ".$system['time'] = "<b>".date('Y-m-d H:i:s')."</b><br />";
			echo "PHP Version: ".$system['php_version'] = "<b>".PHP_VERSION."</b><br />";
			echo "Platform: ".$system['platform'] = "<b>".PHP_OS."</b><br />";
			echo "Server name: ".$system['server_name'] = "<b>".$_SERVER['SERVER_NAME']."</b><br />";
			echo "Host name: ".$system['server_addr'] = "<b>".$_SERVER['SERVER_ADDR']."</b><br />";
		}
		
		public function mathOperation($count) {
			print("<h1>PHP Test Benchmark v1.0 - Calculations</h1><br />");
			$microtimeStart = microtime(true);
			$count = $count;
			
			$mathFunc = array("abs", "acos", "asin", "atan", "bindec", "floor", "exp", "sin", "tan", "pi", "is_finite", "is_nan", "sqrt");
			for ($i = 0; $i < $count; $i++) {
				foreach ($mathFunc as $resultMathFunc) {
					call_user_func_array($resultMathFunc, array($i));
				}
			}
			echo "Mathematical Operations: <b>".$system['operationMath'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';		
		}
		
		public function stringOperation($count) {
			$microtimeStart = microtime(true);
			$count = $count;
			$stringFunc = array("addslashes", "chunk_split", "metaphone", "strip_tags", "md5", "sha1", "strtoupper", "strtolower", "strrev", "strlen", "soundex", "ord");

			$string = 'my word is excellent give me donate please';
			for ($i = 0; $i < $count; $i++) {
				foreach ($stringFunc as $resultStringFunc) {
					call_user_func_array($resultStringFunc, array($string));
				}
			}
			echo "String Operations: <b>".$system['operationString'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';		

		}
		
		public function ifOperation($count) {
			$microtimeStart = microtime(true);
			$count = $count;
			
			for ($i = 0; $i < $count; $i++) {
				if ($i == -1) {

				} elseif ($i == -2) {

				} else {
					if ($i == -3) {

					}
				}
			}
			echo "Operations on conditional statements: <b>".$system['operationIf'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';
		}
		
		public function loopOperation($count) {
			$microtimeStart = microtime(true);
			$count = $count;
			
			for ($i = 0; $i < $count; ++$i) {

			}

			$i = 0;
			while ($i < $count) {
				++$i;
			}
			echo "Operations on loops: <b>".$system['loopOperation'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';
		}
		
		public function mysqlOperation($host, $db_user, $db_password, $db_name) {
			print("<h1>PHP Test Benchmark v1.0 - MySQL Calculations</h1><br />");
			
			$microtimeStart = microtime(true);
	
			$this->host = $host;
			$this->db_user = $db_user;
			$this->db_password = $db_password;
			$this->db_name = $db_name;

			$con = new mysqli($host, $db_user, $db_password, $db_name);
			echo "Mysql Connect: <b>".$system['mysql_connect'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';

			mysqli_select_db($con, $db_name);
			echo "Mysql Select DB: <b>".$system['mysql_select_db'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';
			
			$sql = "SELECT VERSION() as version"; 
			
			if($result = @$con->query($sql))
			{	
				$arr_row = mysqli_fetch_array($result);
				echo "Mysql Version: " . $system['mysql_version'] = "<b>" . $arr_row['version'] . "</b><br />";
				echo "Mysql Query version: <b>".$system['mysql_query_version'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';
			}
			
			$sqlBenchmark = "SELECT BENCHMARK(1000000, AES_ENCRYPT('hello', UNHEX('F3229A0B371ED2D9441B830D21A390C3')))"; 
			
			if($resultBenchmark = @$con->query($sqlBenchmark))
			{	
				echo "Mysql Query: <b>".$system['mysql_query'] = number_format(microtime(true) - $microtimeStart, 3) . ' sec. </b><br />';
			}

			mysqli_close($con);
		}
		
		public function __construct() {
			set_time_limit(120);
			$system = array();
		}
	}
	
	$obiekt = new ShfTestBenchmark();
	$obiekt->mathOperation(ShfTestBenchmark::$request);
	$obiekt->stringOperation(ShfTestBenchmark::$request);
	$obiekt->ifOperation(ShfTestBenchmark::$request);
	$obiekt->loopOperation(ShfTestBenchmark::$request);
	$obiekt->mysqlOperation("localhost","root","","wordpress");
?>