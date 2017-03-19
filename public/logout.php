<?php  include("../includes/database.php"); ?>

<?php  include("../includes/redirect.php"); ?>

<?php  include("../includes/session.php"); ?>






<?php   


$_SESSION['admin_id'] = null;
$_SESSION['username'] = null;
$_SESSION['name'] = null;


 redirect_to("login.php"); 
?>


