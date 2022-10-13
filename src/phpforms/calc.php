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
          
        if (!preg_match('/^\d*[.]?\d*$/',$num1)) {
            $valuerr1 = "integer or decimal value only";
          }
        else
        $num1 = test_units($_POST["num1"]); 
    }
    if(empty($_POST["num2"])){
        $valuerr2 = "please enter number";
    }
    else{
         
        if (!preg_match('/^\d*[.]?\d*$/',$num2)) {
            $valuerr2 = "integer or decimal value only";
          }
        else
        $num2 = test_units($_POST["num2"]);    
    }

}
function test_units($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$symbols = $_POST["symbol"];
$result = "";
    switch ($symbols) {
        case "+":
           $result =$num1 + $num2;
            break;
        case "-":
           $result= $num1 - $num2;
            break;
        case "X":
            $result= $num1 * $num2;
            break;
        case "/":
            $result= $num1 / $num2;
    }

?>
<div id="mydiv">
	<h2>calculator</h2>
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p>
            Number 1:<input type="text" name="num1" value="<?php echo $num1; ?>"><span>*<?php echo $valuerr1; ?></span>
            </p>
            <p>
            Number 2:<input type="text" name="num2" value="<?php echo $num2; ?>"><span>*<?php echo $valuerr2; ?></span>
            </p>
            <p>Result :<span style="padding-left:16px"><input type="text" name="result" value="<?php echo $result; ?>">
             </span>
            </p>
            <p style="padding-left:65px">
            <input type="submit" name="symbol" value="+">
            <input type="submit" name="symbol" value="-">
            <input type="submit" name="symbol" value="X">
            <input type="submit" name="symbol" value="/">
            </p>
	  </form>
    </div>


</body>
</html>