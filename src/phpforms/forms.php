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
    $value =" ";
    $valuerr ="";
    $bill =0;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["units"])){
            $valuerr = "please enter units";
        }
        else{
            $value = test_units($_POST["units"]);   
            if (!preg_match('/^\d*[.]?\d*$/',$value)) {
                $valuerr = "integer or float value only";
              }
        }
    }
    function test_units($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
      if($value<=50){
          $bill= $value*3.50;
      }
      if($value>50){
          if($value<=150){
              $bill = (50*3.50)+(($value-50)*4);
          }
          else{
              if($value<=250){
                  $bill = (50*3.50)+(100*4)+(($value-150)*5.20);
              }
              else
              $bill = 250*6.50;
          }
      }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
      Enter in units:<input type="text" name="units" value="<?php echo $value; ?>"><span>* <?php echo $valuerr;?></span>
      <br>
      <input type="submit" value="calculate">
    </form>
    <h2>your bill</h2>
    <?php echo "Rs".$bill; ?>

</body>
</html>