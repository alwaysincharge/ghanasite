<?php  include("../includes/database.php"); ?>
<?php  include("../includes/redirect.php"); ?>
<?php  include("../includes/session.php"); ?>

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
    
    
    
    <div class="row"><p class="form-heading" style="display: table; margin: 0 auto;">List of regions.</p><br><br>
    
    
    <div class="col-md-8">
        
        
    
        
        
        
        <?php  
        $query = "SELECT * FROM regions";
        $regionslist = mysqli_query($connection, $query);
        
        
        while ($regions = mysqli_fetch_assoc($regionslist)) { 
            
            
         echo "  
        <div class='regions' style='max-width: 500px; display: table; margin: 0 auto;'>
            
            <p class='form-heading'>{$regions['title']}.  </p>
        
        <a href='region.php?regions={$regions['id']}'><img width='100%' style='border-radius: 5px;' src='{$regions['img_path1']}' /></a>
            
    
            <br><br><br><br>
        
        </div>";   
        
        
        
        
        }
        
        
        
        
        
        ?>
        
        
        
        
        
      
        
     
        
    </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    <div class="col-md-4 center">
        
       <?php  include("../includes/sidebar.php"); ?>
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
</body>
    
    
</html>