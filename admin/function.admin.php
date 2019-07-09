<?php
    include_once "connection.php";
    
    class Admin{

        public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Không thể kểt nối tới database";
			        exit;
			}
		}

        public function login($username, $password){

        	$password = md5($password);
			
			$sql="SELECT id FROM users WHERE username='$username' AND password='$password'";
        	$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

	        if ($count_row) {
	            $_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
				header("location:login.php");
			}
		}
		
        public function get_name($id){
    		$sql4="SELECT name FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql4);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['name'];
		}

		public function get_job($id){
    		$sql5="SELECT job FROM users WHERE id = '$id'";
	        $result = mysqli_query($this->db,$sql5);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['job'];
		}

		public function get_session(){
			return $_SESSION['login'];
	    }

		public function admin_logout() {
			session_destroy();
		}

    }
?>