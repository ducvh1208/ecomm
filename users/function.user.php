<?php
    include "../admin/connection.php"; 

	class User{

		public $db;
		
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Không thể kểt nối tới database";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($username,$password,$name,$job){

		    $password = md5($password);
			$sql="SELECT * FROM users WHERE username='$username'";

			$check =  $this->db->query($sql);
			$count_row = $check->num_rows;
			if ($count_row == 0){
				$sql1="INSERT INTO users(username, password, name, job) 
				VALUES('$username', '$password', '$name', '$job')";
				$result = mysqli_query($this->db,$sql1);
				return $result;
			}
			else {	
				return false;
			}
		}

		/*** for login process ***/
		public function check_login($username, $password){

			$password = md5($password);
			
			$sql2="SELECT id FROM users WHERE username='$username' AND password='$password'";
        	$result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_assoc($result);
			$count_row = $result->num_rows;
	        if ($count_row) {
	            $_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
				return false;
			}
		}
		
		/*** for reset password process ***/
		public function reset_password($username, $password, $newPassword){
			$password = md5($password);

			$sql2 = "SELECT id FROM users WHERE username = '$username' AND password='$password'";
			$result = mysqli_query($this->db,$sql2);
			// $user_data = mysqli_fetch_assoc($result);
			$count_row = $result->num_rows;
			if($count_row){
				$newPassword = md5($newPassword);
				$sql3 = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
				$result = mysqli_query($this->db,$sql3);
				return $result;
				if($result){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				echo '<h3 style="text-align:center; color:red;">
						Username or password incorrect 
					 </h3>';
			}

		}

		/*** for showing the name and job ***/	
    	public function get_id($id){
    		$sql3="SELECT id FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['id'];
		}
		public function get_name($id){
    		$sql2="SELECT name FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql2);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['name'];
		}

		public function get_job($id){
    		$sql3="SELECT job FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['job'];
		}
		
    	/*** starting the session ***/
	    public function get_session(){
			return $_SESSION['login'];
	    }

	    public function user_logout() {
	    	$_SESSION['login'] = FALSE;
			session_destroy();
		}
	}
?>
