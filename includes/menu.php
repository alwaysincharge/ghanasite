


    <a  href="../public/index.php"><h1 class="center main-heading">
    
    
    <?php 
       $query = "SELECT * FROM mainpage WHERE id = 1 LIMIT 1";  
        $headingresult = mysqli_query($connection, $query);
        
        while ($main = mysqli_fetch_assoc($headingresult)) { echo $main['main_name']; }
        
    ?>
    
    
    
    
    
    
</h1></a>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="center">
       
    <a class="head-link" href="index.php" class="../public/head-link">Home</a>
   
        <a class="head-link" href="../public/regions.php">All Regions</a>
        
                <a class="head-link" href="../public/login.php">Log In</a>
        
          <a class="head-link" href="../public/admin.php">Admin</a>
    
    </div>


 


