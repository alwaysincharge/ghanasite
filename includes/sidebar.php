<img width="200" class="main-img" src="<?php 
       $query = "SELECT * FROM mainpage WHERE id = 1 LIMIT 1";  
        $flagresult = mysqli_query($connection, $query);
        
        while ($flagimg = mysqli_fetch_assoc($flagresult)) { echo $flagimg['img_path']; }
        
    ?>">
        
        
        
        
        
        
        
        
        
        
        
        
        
        <br><br>
        <form method="get" action="../public/results.php">
        <input name="keywords" class="search-main" placeholder="Search for regions..." />
        
        <input style="display: none;" type="submit" name="submit" value="submit" />
        </form>
        <br>
        