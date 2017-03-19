<?php  include("../includes/session.php"); ?>

<?php  include("../includes/database.php"); ?>


<?php  include("../includes/redirect.php"); ?>

<?php  

if (!isset($_SESSION['admin_id']))

redirect_to('login.php');

?>

<?php 

    
    
  // This function formats the input data. 
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
   }

$main_name = $content = "";

if (isset($_POST['submit']) )  {
    
    $main_name =  mysqli_real_escape_string($connection, test_input($_POST['main_name']));
    
    $content = mysqli_real_escape_string($connection, test_input($_POST['content']));
    
 
    $filetmp = $_FILES['flag']['tmp_name'];
    
    
    $filename = $_FILES['flag']['name'];
    
    $filetype = $_FILES['flag']['type'];
    
    
    $filepath = "photo/" .(time() + 679) .$filename; 
    
    
    if (!($_FILES["flag"]["size"] < 3000000) ) {
    $_SESSION['imgsize'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  The image you tried to upload is too large. Our file limit is 3MB.
</div>"; }    
    
    else  {
        
    
        if(($filetype != "image/jpg" && $filetype != "image/png" && $filetype != "image/jpeg"
        && $filetype != "image/gif") || (empty(trim($_POST["main_name"]))  ||  empty(trim($_POST["content"])) ) ) {
    
        $_SESSION['uncompleteform'] = "<br><div style='width: 300px;  font-family: 'Josefin Slab', serif;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  All fields of the form have to be filled. <br><br> Images have to be in popular formats.
</div>"; }  else {    
        
        move_uploaded_file($filetmp, $filepath);
    
    
    
   
         
         
         
    $query = "INSERT INTO mainpage (img_name, img_path, img_type, main_name, content) VALUES ('$filename', '$filepath', '$filetype', '$main_name', '$content')";
    
    $resultupload = mysqli_query($connection, $query);
    
    redirect_to("index.php");
     
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
  
        
        <form method="post" action="create_mainpage.php" enctype="multipart/form-data" style="max-width: 500px; display: table; margin: 0 auto; padding-left: 30px; padding-right: 30px;">
            
            <p class="form-heading">Create Main Page.</p>
        
        
            <input class="input-general" type="text" name="main_name" placeholder="Title" value="<?php
                                                                                                 
                                                                                              if (isset($_POST['main_name'])) { echo $_POST['main_name'];  } else {
                                                                                                  $_POST['main_name'] = null; } ?>" /> <br><br>
            
            
            
            
            
            
            <textarea style="resize: none; height: 300px; width: 500px;" class="input-general" type="text" name="content" placeholder="Content"><?php
                                                                                                 
                                                                                              if (isset($_POST['content'])) { echo $_POST['main_name'];  } else {
                                                                                                  $_POST['content'] = null; } ?></textarea> <br><br>
            
            
            
            
            
            
            
            
            
            
            
             
       <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file" style="color: black; background: white; border: 2px solid #ddd; border-radius: 5px;"><span class="fileupload-new" style=" font-family: georgia; font-size: 15px;">Upload flag</span>
    <span class="fileupload-exists" style=" font-family: georgia; font-size: 15px;">Change</span><input type="file" name="flag" placeholder="Upload the Ghana flag" /></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>
            
            
            
            
            
        
            <input class="submit-but" type="submit" name="submit" placeholder="Submit" />
        
        
        
        
        
        </form>
        
        
        
       <br><br>
        
    </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    <div class="col-md-4 center">
        
<?php  include("../includes/sidebar.php"); ?>
        
        
                
        <?php  
        
        
        if (isset($_SESSION['imgsize'])) {
        echo $_SESSION['imgsize'];  
            $_SESSION['imgsize'] = null;
        }   else {
            $_SESSION['imgsize'] = null;
        }
        ?>
        
        <?php 
        
        if (isset($_SESSION['uncompleteform'])) {
        echo $_SESSION['uncompleteform'];  
            $_SESSION['uncompleteform'] = null;
        }   else {
            $_SESSION['uncompleteform'] = null;
        }
        
         
        ?>
        <br><br><br>
        
    </div>
    
    
    </div>
    
    
    
    
   <script>
    !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
    </script>  
    
    
    
</body>
    
    
</html>