
<!DOCTYPE html>
<html>
<head>
<style>

td,th {  
  padding: 5px;  
  border-bottom: 1px solid #aaa; 
  text-align: center;
}
body {    
  text-align: center;  
  margin-top: 10%; 
}
.center {  
  border: 3px solid blue;  
  padding:0px 10px 0px 10px;
  display: inline-block;  
  text-align:center;
}
.tablediv{
	display: inline-block;
	text-align:center;
}
body{
  text-align: center;
}
dt {
  display: inline;
}
dd {
margin-left: 2px;
margin-right: 20px;
display: inline;
font-weight: bold;
}


</style>
</head>

<body>
  <div>
    <h1>Add Driver to Car</h1>
  </div>

<br><br>

<div class="center">
	<dl>
	  <dt>VIN:</dt>
	  <dd>
      <?php echo $data["car"][0]["vin"]?></dd>
        <dt>Manufacturer:</dt>
          <dd><?php echo $data["car"][0]["manufacturer"]?></dd>
        <dt>Model:</dt>
          <dd><?php echo $data["car"][0]["model"]?></dd>
        <dt>Year:</dt>
          <dd><?php echo $data["car"][0]["model_year"] ?></dd>
        <dt>Color:</dt>
          <dd><?php echo $data["car"][0]["color"] ?></dd>
        <dt>Automatic:</dt>
          <dd><?php echo $data["car"][0]["auto_trans"] ?></dd>
	</dl>

<div style="text-align: left" >Drivers: 
  <?php foreach($data["linkedDrivers"] as $x => $driver){
		echo $driver["first_last_name"]."; ";
  } 
  ?>

</div>

<div class="tablediv">
<table>
  <thead>
    <tr>
       <th>Name</th>
       <th>Manual</th>
       <th>Link</th>
    </tr>
  </thead>
   <tbody>
     <?php foreach ($data["drivers"] as $x => $row):  ?>

       <form action="/index.php/linkDriver" method="post">
       <input type="hidden" name="driverId" value="<?php echo $row["id"] ?>">
       <input type="hidden" name="carId" value="<?php echo $data["car"][0]["id"] ?>">
        <tr>
          <td><?php echo $row["first_last_name"]; ?></td>
          <td><?php echo $row["manual"]; ?></td>
          <td><button name="driver" type="submit" >Link</button></td>
        </tr>
       </form>
<?php endforeach?>
</tbody>
</table>
</div>


</div>
<div>
  <a href="/index.php">Back to home</a>
</div>

</body>
</html>
