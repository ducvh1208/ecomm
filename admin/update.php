
<?php
    $conn = new PDO('mysql:host=localhost;dbname=ecommage_test', 'root', '');
    session_start();

    $query = "UPDATE users SET name = '".$_POST["name"]."', job = '".$_POST["job"]."'
            WHERE id = '".$_SESSION["id"]."'"; 
    
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    if(isset($result))
	{
		echo '<div class="alert alert-success text-center"> You have successfully updated </div>';
    }
    else{
        echo '<div class="alert alert-warning text-center"> You have unsuccessfully updated </div>';
    }
?>