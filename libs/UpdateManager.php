<?php  
/*
	@auth botbinoo@naver.com
	@since 2018.11.23
	@copyrighted by botbinoo.
*/
class UpdateManager extends DAOManager{
	
	private $query;

	function __construct($table_name, $rows, $options){
		parent::__construct();

		$this->query = "UPDATE $table_name SET ";
		$rowVal = "";
		foreach($rows as $key => $value) {
    			$rowVal = $this->query . " " . $key . "=" . $this->getFormatedData($value) . ",";
		}
		$attrs = substr($rowVal, 0, strlen($rowVal)-1);
		$this->query = $this->query . " " . $attrs . " WHERE 1=1 ";

		foreach($options as $key => $value) {
    			$this->query = $this->query . " AND " . $key . "=" . $this->getFormatedData(($value);
		}
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