<?php  include("../includes/database.php"); ?>
<?php  include("../includes/session.php"); ?>

<?php  include("../includes/redirect.php"); ?>






<?php 


$username = $password = $name = "";



    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
   }





    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty(trim($_POST["username"]))  ||  empty(trim($_POST["password"])) ||  empty(trim($_POST["name"])) )   {
                $_SESSION['morethanone1'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  You cannot leave any field blank. Try again.
</div>";
        } else {
            
            $username = test_input($_POST["username"]);
            
            $name = test_input($_POST["name"]);
                
            $password = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);
            
            $querys = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            $results = mysqli_query($connection, $querys);
            
            if (mysqli_num_rows($results) > 0) {
                $_SESSION['morethanone'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  That username is already taken. <br><br> Be creative. Try something else.
</div>";
            } else {
                

            $query = "INSERT INTO users (username, password, name) VALUES ( '{$username}', '{$password}', '{$name}' )";
    
            $admin = mysqli_query($connection, $query);
                
        $_SESSION['note2'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  Thanks for creating your profile. You have to sign in again.
</div>";  
    
            redirect_to("logout.php");  
                
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
        
        
    
        
           
        <form method="post" action="create_login.php" enctype="multipart/form-data" style="max-width: 500px; display: table; margin: 0 auto; padding-left: 30px; padding-right: 30px;">
            
            <p class="form-heading">Sign Up.</p>
        
        
            <input class="input-general" type="text" name="username" placeholder="Username" value="" /> <br><br>
            
            <input class="input-general" type="text" name="name" placeholder="Name" value="" /> <br><br>
            
            <input class="input-general" type="password" name="password" placeholder="Password" value="" /> <br><br>
            
  
            
            
            
            
            
        
            <input class="submit-but" type="submit" name="submit" placeholder="Submit" />
        
        
        
        
        
        </form>
        
        
        
        
        
      
        
     
        
    </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    <div class="col-md-4 center">
        
       <?php  include("../includes/sidebar.php"); ?>
        
        
        
        
                <?php  
        
        
        if (isset($_SESSION['morethanone1'])) {
        echo $_SESSION['morethanone1'];  
            $_SESSION['morethanone1'] = null;
        }   else {
            $_SESSION['morethanone1'] = null;
        }
        ?>
        
        
        
                 
        <?php  
        
        
        if (isset($_SESSION['morethanone'])) {
        echo $_SESSION['morethanone'];  
            $_SESSION['morethanone'] = null;
        }   else {
            $_SESSION['morethanone'] = null;
        }
        ?>
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
</body>
    
    
</html>