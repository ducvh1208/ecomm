<?php
    if(isset($_GET['getUser'])){
        $format = strtolower($_GET['fomat']) == 'json' ? 'json' : 'xml';
        $users = array();
        require_once ("connection.php");
        $db;
		function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Không thể kểt nối tới database";
			        exit;
			}
		}
            $sql = "select * from users";
        $query = mysqli_query($this->db,$sql);

        while($username == mysqli_fetch_assoc($query)){
            $users[] = array('username' => $username);
        }

        if($format == 'json'){
            header('Content-type: application/json');
            echo json_encode(array('users'=>$users));
        }
        else{
            header('Conten-type: text/xml');
            echo '<users>';
                foreach( $users as $index => $username ){
                    if(is_array($username)){
                        foreach($username as $key => $value ){
                            echo '<',key,'>';
                            if(is_array($value)){
                                foreach($value as $tag => $val){
                                    echo '<',tag,'>',htmlentities,'</',tag,'>';
                                }
                            }
                            echo '</',key,'>';
                        }
                    }
                }
            echo '</users>';
        }
        mysqli_close();
    }

    else{
        echo "không có dữ liệu trả về";
    }
    
?>