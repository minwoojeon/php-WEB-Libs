<?php  
/*
	@auth botbinoo@naver.com
	@since 2018.11.23
	@copyrighted by botbinoo.
*/
class InsertManager extends DAOManager{
	
	private $query;

	function __construct($table_name, $rows){
		parent::__construct();

		$rowVal1 = "";
		$rowVal2 = "";
		foreach($rows as $key => $value) {
    			$rowVal1 = $rowVal1 . " " . $key . ",";
    			$rowVal2 = $rowVal2 . " " . $this->getFormatedData($value) . ",";
		}
		$rows1 = substr($rowVal1, 0, strlen($rowVal1)-1);
		$rows2 = substr($rowVal2, 0, strlen($rowVal2)-1);

		$this->query = "INSERT INTO $table_name ($rows1) VALUES ($rows2)";
	}
	protected function processing(){
		echo $this->query;

		$res = mysqli_query($this->con, $this->query);
		$result = array();

		array_push($result, array('success'=>"T"));

     		echo json_encode(array("result"=>$result));
	}
}

?>