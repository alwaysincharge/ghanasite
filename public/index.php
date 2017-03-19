<?php  include("../includes/database.php"); ?>
<?php  include("../includes/redirect.php"); ?>
<?php  include("../includes/session.php"); ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1.0" name="viewport">
	<title>Ghana.</title>
     <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">
	</script>
    
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
        
    <p class="main-para center">   
<?php 
       $query = "SELECT * FROM mainpage WHERE id = 1 LIMIT 1";  
        $pararesult = mysqli_query($connection, $query);
        
        while ($para = mysqli_fetch_assoc($pararesult)) { echo nl2br($para['content']); }
        
    ?></p>  <br><br>  
        
        
      
        
        
     
        
    </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    <div class="col-md-4 center">
        
<?php  include("../includes/sidebar.php"); ?>
        
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
</body>
    
    
</html>