<?php

require_once "pdo.php";
$price_promo = $price10 = 0;
$color = array();
$photo = array();
$jsonFile = 'cars.json';
$jsonData = json_decode(file_get_contents($jsonFile), true);
foreach ($jsonData as $row) {
    $price = floatval(preg_replace("/[^-0-9\.]/","",$row['price']));
    $price10 = bcmul($price,0.1,2);
    $price_promo = bcadd($price,$price10,2);
    $color[] = $row['attributes']['color'];
    $photo[] = $row['picture'];


  /**Insert JSON data to mysql database: EXECUTED ONCE
   * 
    $sql1 = "INSERT INTO u845027411_cartask.car (id, car_id, price, price_promo, vat, availability, status) VALUES (:id,:car_id,:price,:promo,:vat,:availability,:status)";
    $sql2 = "INSERT INTO u845027411_cartask.car_attributes (id, car_id, name, value) VALUES (:id,:car_id,:name,:value)";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute(array(
      'id' => $row['id'],
      'car_id' => $row['car_id'],
      'price' => $price,
      'promo' => $price_promo,
      'vat' => $row['vat'],
      'availability' => $row['availability'],
      'status' => $row['isActive']
    ));
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(array(
      'id' => $row['id'],
      'car_id' => $row['car_id'],
      'name' => $row['attributes']['name'],
      'value' => $row['availability']
    ));
    
**/

}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="scroll.js"></script>
 
  
</head>
<body>

<div class="d-sm-flex align-items-center justify-content-between w-100" style="height: 100vh;">
  <div class="col-md-4 mx-auto mb-4 mb-sm-0 headline">
    <span class="text-secondary text-uppercase">Car Task</span>
    <h1 class="display-4 my-4 font-weight-bold">Kindly click the <span style="color: #246EE4">button below</span></h1>
    <a href="#cartable" class="btn px-5 py-3 text-white mt-3 mt-sm-0" style="border-radius: 30px; background-color: #246EE4">CLICK</a>
  </div>

  <div class="col-md-8 h-100 clipped" style="min-height: 350px; background-image: url(https://images.unsplash.com/photo-1520050206274-a1ae44613e6d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDN8fGNhcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60); background-position: center; background-size: cover;">

  </div>
</div>
     



<div class="container" id="cartable">
  <div class="row">
    <div class="col-12">
      <table  class="table table-image">
    <thead><tr>
      <th scope="col">#</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Availability</th>
      <th scope="col">Promo Price</th>
      <th scope="col">Price</th>
      <th scope="col">VAT</th>
      <th scope="col">Color</th>
    </tr></thead><tbody>
<?php
$stmt = $pdo->query("SELECT car_attributes.name,car_attributes.value,car.price,car.price_promo,car.vat,car.status FROM u845027411_cartask.car, u845027411_cartask.car_attributes WHERE car.id = car_attributes.id AND car.car_id = car_attributes.car_id AND car.status = 1");
$c = 0;
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  if($row['value'] == 0){
      echo("<tr style='background-color: #88929c'><th scope='row'>");
      $row['value'] = "Not Available";
  }
  else{
      echo("<tr><th scope='row'>");
  }
  echo($c+1);
  echo "</th><td class='w-25'>";
  echo("<img src='".$photo[$c]."' class='img-fluid img-thumbnail'");
  echo "</td><td>";
  echo(htmlentities($row['name']));
  echo "</td><td>";
  echo(htmlentities($row['value']));
  echo "</td><td>";
  echo(htmlentities($row['price']));
  echo "</td><td>";
  echo(htmlentities($row['price_promo']));
  echo("</td><td>");
  echo(htmlentities($row['vat']));
  echo("</td><td>");
  echo("<span class='dot' style='background-color:".$color[$c].";'></span>");
  echo "</td><td>";
  $c = $c + 1;
}


?>
      </tbody>
		</table>
    </div>
  </div>
</div>

<script>

// Scroll to specific values
// scrollTo is the same
window.scroll({
  top: 2500, 
  left: 0, 
  behavior: 'smooth'
});

// Scroll certain amounts from current position 
window.scrollBy({ 
  top: 100, // could be negative value
  left: 0, 
  behavior: 'smooth' 
});

// Scroll to a certain element
document.querySelector('.hello').scrollIntoView({ 
  behavior: 'smooth' 
});

</script>

  </body>
</html>
