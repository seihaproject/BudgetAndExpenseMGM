<?php
require_once('initialize.php');
class conn {
	public $server = DB_SERVER;
	public $user = DB_USERNAME;
	public $password = DB_PASSWORD;
	public  $db = DB_NAME ;
 public $connection;
 public function __construct(){
      $this->connection = mysqli_connect($this->server,$this->user,$this->password,$this->db);
      if(!$this->connection){
        die('error');
      }
	}
public function getConnection(){
		return $this->connection;
}
}
class Login extends conn{
	public $username;
	public $password;
	private $sql;
	
	//public $login;
	//$db = new Login;
	//$connection =  $Login->getConnection;
	
		

		
	
	public function setlogin($username,$password){
		$this->sql= "select * from users where username = '$username' and password = md5('$password')"; 
		//$sql = "select "
		$conn = $this->getConnection();
        $result = mysqli_query($conn,$this->sql);
		$row = $result->num_rows;
		if($row>0){
			header('location:/classes/mytest.php');
		}else{

			echo "can't login";
		}

	 
	}
	
}
class car{
	public static $color = "red";
	public static function getcolor(){
		echo self::$color;

	}
	 

}
class component extends conn{
	private $sql;
	private $stmt;
	
	//private $select = "<select></select>";
	//private $obj;
	
	
	function filldataCombobox(){
		$this->sql = "select * from categories";
		$connnew = $this->getConnection();
		$this->stmt = mysqli_stmt_init($connnew);
	    mysqli_stmt_prepare($this->stmt,$this->sql);
		mysqli_stmt_execute($this->stmt);
        $result = mysqli_stmt_get_result($this->stmt);
		return $result;
		
		/*
		echo $select="<select class='form-control'><option>--Select category--</option>";
		while($row=mysqli_fetch_array($result)){
			 $id = $row['id'];
			 $name = $row['categoryName'];
			 echo "<option value='$id'>$name</option>";
			
			
		}
		echo "</select>";
		return $select;
		*/
		
	
		
		
		
		
		

	
			

	}
	



}

class expenseFill extends conn{
	private $sql;
	private $result;
	function getdataExpense(){
		$this->sql = "select expenses.id, categories.categoryName, expenses.amount, expenses.dateCreated, expenses.remark from expenses inner join categories on expenses.categoryId = categories.id ";
		$newcon = $this->getConnection();
		$this->stmt = mysqli_stmt_init($newcon);
		mysqli_stmt_prepare($this->stmt,$this->sql);
		mysqli_stmt_execute($this->stmt);
		$this->result = mysqli_stmt_get_result($this->stmt);
		return $this->result;


		


	}


}

class fillData extends conn{
private $sql;
private $result;
function data()
{
	$this->sql = "select budgets.id, budgets.amount, categories.categoryName, budgets.dateCreated, budgets.remark from budgets inner join categories on budgets.categoryId = categories.id ";
	$newcon = $this->getConnection();
	
	$this->stmt = mysqli_stmt_init($newcon);
	mysqli_stmt_prepare($this->stmt,$this->sql);
	mysqli_stmt_execute($this->stmt);
	$this->result = mysqli_stmt_get_result($this->stmt);
	

	return $this->result;
	


		
}



		
}

?>