<?php
 $products = array(
    "Electronics" => array(
      "Television" => array(
        array(
        "id" => "PR001",
        "name" => "MAX-001",
        "brand" => "Samsung"
        ),
        array(
        "id" => "PR002",
        "name" => "BIG-301",
        "brand" => "Bravia"
        ),
        array(
        "id" => "PR003",
        "name" => "APL-02",
        "brand" => "Apple"
        )
      ),
      "Mobile" => array(
        array(
        "id" => "PR004",
        "name" => "GT-1980",
        "brand" => "Samsung"
        ),
        array(
        "id" => "PR005",
        "name" => "IG-5467",
        "brand" => "Motorola"
        ),
        array(
        "id" => "PR006",
        "name" => "IP-8930",
        "brand" => "Apple"
        )
      )
    ),
    "Jewelry" => array(
      "Earrings" => array(
        array(
        "id" => "PR007",
        "name" => "ER-001",
        "brand" => "Chopard"
        ),
        array(
        "id" => "PR008",
        "name" => "ER-002",
        "brand" => "Mikimoto"
        ),
        array(
        "id" => "PR009",
        "name" => "ER-003",
        "brand" => "Bvlgari"
        )
      ),
      "Necklaces" => array(
        array(
        "id" => "PR010",
        "name" => "NK-001",
        "brand" => "Piaget"
        ),
        array(
        "id" => "PR011",
        "name" => "NK-002",
        "brand" => "Graff"
        ),
        array(
        "id" => "PR012",
        "name" => "NK-003",
        "brand" => "Tiffany"
        )
      )
    )
        );
        echo "<h2>"."Advance Task 1"."</h2>";
  echo '<table width="400px" height="400px" border="1px" style="border-collapse:collapse;">';
  echo "<thead><tr><th>category</th><th>subcategory</th><th>ID</th><th>Name</th><th>Brand</th></tr></thead>";
  echo "<tbody>";
  foreach($products as $key => $value){
      foreach($value as $key1 => $val1){
          foreach($val1 as $key2 => $val2){
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$key1."</td>";
              foreach($val2 as $key3 => $val3)
              echo "<td>".$val3."</td>";
              echo "</tr>";
          }
      }
  }
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<h2>"."Advance Task 2"."</h2>";
  echo '<table width="400px" height="200px" border="1px" style="border-collapse:collapse;">';
  echo '<thead><tr><th>category</th><th>subcategory</th><th>ID</th><th>Name</th><th>Brand</th></tr></thead>';
  echo "<tbody>";
  foreach($products as $key => $value){
      foreach($value as $key1 => $val1){
          foreach($val1 as $key2 => $val2){
            if($key1=="Mobile"){
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$key1."</td>";
              foreach($val2 as $key3 => $val3)
              echo "<td>".$val3."</td>";
              echo "</tr>";
            }
          }
      }
  }
  echo "</tbody>";
  echo "</table>";

  echo "<h2>"."Advance Task 3"."</h2>";
  foreach($products as $key => $value){
      foreach($value as $key1 => $val1){
        echo "<br>";
          foreach($val1 as $key2){
            if($key2["brand"] == "Samsung"){
              echo "Product Id:".$key2["id"]."<br>";
              echo "Product Name:".$key2["name"]."<br>";
              echo "subCategory:".$key1."<br>";
              echo "category:".$key."<br>";
            }
      }
  }
} echo "<h2>"."task 4 ,5 ..delete..and update.."."</h2>";
  foreach($products as $key => $value){
      foreach($value as $key1 => $val1){
          foreach($val1 as $key2 => $val2){ 
            if($val2["id"]=="PR003"){
              unset($products[$key][$key1][$key2]);
            }
          }
      }
  }
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "</tbody>";
  echo "</table>";
  echo '<table width="400px" height="400px" border="1px" style="border-collapse:collapse;" "padding-top:10px;">';
  echo "<thead><tr><th>category</th><th>subcategory</th><th>ID</th><th>Name</th><th>Brand</th></tr></thead>";
  echo "<tbody>";
  foreach($products as $key => $value){
      foreach($value as $key1 => $val1){
          foreach($val1 as $key2){ 
            echo "<tr>";
            if($key2["id"]=="PR002"){
              $key2["name"] =  "BIG-555";
            }
              echo "<td>".$key."</td>";
              echo "<td>".$key1."</td>";
              foreach($key2 as $key3 ) {
                  echo "<td>".$key3."</td>";
              }
              echo "</tr>"; 
          }
      }
  }
  echo "</tbody>";
  echo "</table>";
?>