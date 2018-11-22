<?php  
/*
	@auth botbinoo@naver.com
	@since 2018.11.23
	@copyrighted by botbinoo.
*/
class SelectManager extends DAOManager{
	
	private $query;

	function __construct($table_name, $rows, $options){
		parent::__construct();

		$rowVal = "";
		foreach($rows as $key => $value) {
    			$rowVal = $rowVal . " " . $key . " AS " . $value . ",";
		}
		$attrs = substr($rowVal, 0, strlen($rowVal)-1);

		$this->query = "SELECT $attrs FROM $table_name WHERE 1=1 ";

		foreach($options as $key => $value) {
    			$this->query = $this->query . " AND " . $key . "=" . $this->getFormatedData($value);
		}
	}
	protected function processing(){
		echo $this->query;

		$res = mysqli_query($this->con, $this->query);
		$result = array();

		while($row=mysqli_fetch_array($res)){
			array_push($result, array('page_no'=>$row[0],'pages'=>$row[2],'page_url'=>$row[4]));
     		}
     		echo json_encode(array("result"=>$result));
	}
}

?>