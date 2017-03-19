<?php  include("../includes/database.php"); ?>
<?php  include("../includes/session.php"); ?>

<?php  include("../includes/redirect.php"); ?>


<?php   
if (isset($_SESSION['admin_id'])) {
    redirect_to('admin.php');
} else {
    
}



?>



<?php 


$username = $password = "";



    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
   }





    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["username"])  ||  empty($_POST["password"]) )   {
            $_SESSION['uncompleteform1'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  Login failed. Try again. 
</div>";
        } else {

            $username = test_input($_POST["username"]);
            $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);

            $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            
            $loginquerys = mysqli_query($connection, $query);
            
            if ( mysqli_num_rows($loginquerys) == 1) {
                
            
                
                    while ($row = mysqli_fetch_assoc($loginquerys)) {
                        
                        
                        
                        if (password_verify(test_input($_POST["password"]), $row['password'])) {
                            
                          $_SESSION['admin_id'] = $row['id'];
                          $_SESSION['username'] = $row['username'];
                            $_SESSION['name'] = $row['name'];
                            

                            
                         redirect_to("admin.php");   
    
} else {
   $_SESSION['uncompleteform1'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  Login failed. Try again. 
</div>";
}
                        
                        
                        
                    }
                
                        
            } else {
                
            }
  

            


        }

    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1.0" name="viewport">
	<title>Ghana.</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">
	</script>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' rel='stylesheet prefetch'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' rel='stylesheet prefetch'><!-- CSS  -->
	<link href="css/style.css" media="screen,projection" rel="stylesheet" type="text/css">
	<link href="css/custom.css" media="screen,projection" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
</head>
    
<body>
    
    
    <?php  include("../includes/menu.php"); ?>
    
    
    
    <div class="row"><br><br>
    
    
    <div class="col-md-8">
        
        
    
        
           
        <form method="post" action="login.php" enctype="multipart/form-data" style="max-width: 500px; display: table; margin: 0 auto; padding-left: 30px; padding-right: 30px;">
            
            <p class="form-heading">Login Here.</p>
            
            
            <?php  
        
        
        if (isset($_SESSION['note2'])) {
        echo $_SESSION['note2'];  
            $_SESSION['note2'] = null;
        }   else {
            $_SESSION['note2'] = null;
        }
        ?>
            
                         
        <?php  
        
        
        if (isset($_SESSION['note1'])) {
        echo $_SESSION['note1'];  
            $_SESSION['note1'] = null;
        }   else {
            $_SESSION['note1'] = null;
        }
        ?>
            <br><br>
        
            <input class="input-general" type="text" name="username" placeholder="Username" value="" /> <br><br>
            
            
            
            <input class="input-general" type="password" name="password" placeholder="Password" value="" /> <br><br>
            
  
            
            
            
            
            
        
            <input class="submit-but" type="submit" name="submit" placeholder="Submit" />
        
        
        

        
        </form>
        
        
        
        
        
      
        
     
        
    </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    <div class="col-md-4 center">
        
       <?php  include("../includes/sidebar.php"); ?>
        
        
        <a class='head-link' href='create_login.php'>Sign Up</a><br>
        
        
        
        
        
                 
        <?php  
        
        
        if (isset($_SESSION['uncompleteform1'])) {
        echo $_SESSION['uncompleteform1'];  
            $_SESSION['uncompleteform1'] = null;
        }   else {
            $_SESSION['uncompleteform1'] = null;
        }
        ?>
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
</body>
    
    
</html>