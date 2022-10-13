<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        $file_name = $_FILES['file']['name'];
        // print_r($file);
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $extension_array = explode('.',$file_name);
        $extension = strtolower(end($extension_array));
        // print_r($extension);
        $types = array('png');
        // print_r($file_size);
        if(in_array($extension,$types)){
          if($file_size<=200000){
            $file_upload = 'upload/'.$file_name;
            move_uploaded_file($file_tmp,$file_upload);
            $_SESSION[$_FILES['file']['name']] = $file_upload;
          }
          else{
            echo '<h2 style="color:red;">image size should be less than 2 mb</h2>';
          }
        }
        else{
          echo '<h2 style="color:red">images should be of type png only</h2>';
        }
    }
    
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="file" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<h3><a href="delete.php">Delete Gallery</a></h3>
 <div style="display:flex; width:100vw; flex-wrap:wrap; padding-top:10px; margin:5px;">
   <?php foreach($_SESSION as $key=> $val){?>
    <p style="margin:10px;"><img src='<?php echo $val; ?>' alt="" style="height: 100px; width:100px"><br>
  <?php echo $key;?></p>
   <?php } ?>
   
</div>
</body>
</html>