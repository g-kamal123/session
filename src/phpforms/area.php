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
                $valuerr1 = "area/perimeter can't be negative";
              }
           
        }
        if(empty($_POST["num2"])){
            $valuerr2 = "please enter number";
        }
        else{
             
            $num2 = test_units($_POST["num2"]); 
            if ($num2<0) {
                $valuerr2 = "area/perimeter can't be negative";
              }
        }
    
    }
    function test_units($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($num1>0 && $num2>0){
        $area = $num1*$num2;
        $perimeter = 2*($num1+$num2);
    }
  ?>

  <div id="mydiv">
	<h2>Area</h2>
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>
            Number 1:<input type="text" name="num1" value="<?php echo $num1; ?>"><span>*<?php echo $valuerr1; ?></span>
            </p>
            <p>
            Number 2:<input type="text" name="num2" value="<?php echo $num2; ?>"><span>*<?php echo $valuerr2; ?></span>
            </p>
            <p style="padding-left:65px">
            <input type="submit" name="symbol" value="Calculate Area and Perimeter">
            </p>
	  </form>
  </div>
  <div>
      <p><?php echo "Area is"." ".$area." "."sq. mtr.";?></p>
      <p><?php echo "Perimeter is"." ".$perimeter." "."mtr.";?></p>
  </div>
</body>
</html>