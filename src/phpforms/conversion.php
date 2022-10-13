<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["num1"])){
               $valuerr1 = "please enter number";
        }
        else{
            $num1 = test_units($_POST["num1"]); 
            if ($num1<0) {
                $valuerr1 = "time can't be negative";
            }
        }
        if(!isset($_POST['same'])){
            $valuerr2 = "<p style='color:red;'>Select a radio button</p>";
        }
    }
    function test_units($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($num1>0){
        if(!$_POST['num1']=="" && !$_POST['same']==""){
     $radio = $_POST["same"];
    //  echo $radio;
     if($radio=='mins'){
     $cvt= $num1*60;
     $result= "1 hour"." "."="." ".$cvt." "."mins";
     }
     if($radio=='secs'){
     $cvt1= $num1*3600;
     $result= "1 hour"." "."="." ".$cvt1." "."seconds";
     }
    }
}
    ?>
    <div style="display:flex; flex-direction:column; align-items:center;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="display:flex; flex-direction:column;justify-content:space-evenly;">
            <input type="text" name="num1" style="text-align:center; height:40px; width:250px" value="<?php echo $num1; ?>"> <span>*<?php echo $valuerr1; ?></span><br><br>
            <p><input type="radio" name="same" value="mins">hours to mins</p><br><br>
            <p><input type="radio" name="same" value="secs">hours to second</p><br><br>
            <?php if(isset($valuerr2)) echo $valuerr2; ?>
            <input type="submit" value="convert" style="height:40px; width:250px">
        </form>
        <p><?php echo $result?></p>
    </div>
</body>
</html>