<?php

    include_once "function.admin.php";

    $admin = new Admin();

    $id = $_SESSION['id'];

    if (!$admin->get_session()){
        header("location:login.php");
    }

    if (isset($_POST['logout'])){
        $admin->admin_logout();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <title> Change infomation </title>
    
    </head>
    <body>
        <div class="container mt-5" style="width: 500px">
            <h3 class="text-center"> Change information </h3>
            <span id="message"></span>
            <form id="form_edit" action="" method="POST">
                <div class="form-group">
                    <label> Name : </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=$admin->get_name($id);?>">
                </div>
                <div class="form-group">
                    <label> Job :  </label>
                    <input type="text" class="form-control" id="job" name="job" value="<?=$admin->get_job($id);?>">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" id="update" name="update" value="Save">
                    <input type="submit" class="btn btn-danger" id="logout" name="logout" value="Logout">
                </div>
            </form>
        </div>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#update").on('click',function(e){                    
                    e.preventDefault();
                    var form_data = $("#form_edit").serialize();
		
                        $.ajax({
                            url:"update.php",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                                $('#name').val();
                                $('#job').val();
                                $('#message').html(data);
                            }
                        })
                        
                });
            });
        </script>
    </body>
</html>