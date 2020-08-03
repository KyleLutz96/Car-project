<!DOCTYPE html>
<html>
<head>
<style>

td,th {  padding: 5px;  border-bottom: 1px solid #aaa; text-align: center;}
.center{text-align: center; display: inline-block;}
body{text-align: center;}

</style>
</head>

<body>
<div>
<h1>Manage Cars</h1>
</div>

<div>

 <form action="/index.php/viewCars" method="get">

<select name="option1" autocomplete="off">
  <option value="vin">VIN</option>
  <option value="manufacturer" selected>Manufacturer</option>
  <option value="model">Model</option>
  <option value="model_year">Year</option>
  <option value="color">Color</option>
  <option value="auto_trans">Automatic</option>

</select>

<input type="text" name="search1">

<select name="option2" autocomplete="off">
  <option value="manufacturer">Manufacturer</option>
  <option value="model" selected>Model</option>
  <option value="model_year">Year</option>
  <option value="color">Color</option>
  <option value="auto_trans">Automatic</option>
</select>

<input type="text" name="search2">
 <button name="Search" type="submit" >Search</button>
</form>
</div>

<div class="center">
<table>
  <thead>
    <tr>
       <th>Vin</th>
       <th>Manufacturer</th>
       <th>Model</th>
       <th>Year</th>
       <th>Color</th>
       <th>Automatic</th>
       <th>Link Driver</th>
       <th>Delete</th>
    </tr>
  </thead>
   <tbody>
     <?php foreach ($cars as $x => $row):  ?>
	<tr>
	  <td><?php echo $row["vin"]; ?></td>
          <td><?php echo $row["manufacturer"]; ?></td>
          <td><?php echo $row["model"]; ?></td>
	  <td><?php echo $row["model_year"]; ?></td>
	  <td><?php echo $row["color"]; ?></td>
          <td><?php echo $row["auto_trans"]? "Yes": "No"; ?></td>
	<form action="/index.php/linkDriver" method="get">
	 <td>
            <input type="hidden" name="linkDriver" value="<?php echo $row["id"] ?>">
            <button type="submit" >Link Driver</button>
         </td>
	</form>
       <form action="/index.php/viewCars" method="post">
	  <td>
	    <input type="hidden" name="deleteCar" value="<?php echo $row["id"] ?>">
	    <button name="Car" type="submit" >Delete Car</button>
	  </td>
	</form>
        </tr>
       </form>
<?php endforeach?>
</tbody>
</table>
</div>

<div>
<a href="/index.php">Back to home</a>
</div>

</body>
</html>
