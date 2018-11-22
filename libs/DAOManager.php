<?php  
/*
	@auth botbinoo@naver.com
	@since 2018.11.23
	@copyrighted by botbinoo.
*/
// parents class
class DAOManager{
	protected $con;
	private $vo;
	private $location;
	private $dbid;
	private $dbpwd;
	private $dbname;

	function __construct(){
		$this->location = "localhost";
		$this->dbid = "root";
		$this->dbpwd = "apmsetup";
		$this->dbname = "testweb";
	}
	protected function setConnection(){
		$this->con=mysqli_connect($this->location,$this->dbid,$this->dbpwd,$this->dbname);
	}
	protected function closeConnection(){
		mysqli_close($this->con); 
	}
	protected function getFormatedData($data){
		return is_numeric($data) ? $data : "'".$data."'";
	}
	protected function processing(){
	}
	public function run(){
		$this->setConnection();
		$this->processing();
		$this->closeConnection();
	}
}

?>