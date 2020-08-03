<!DOCTYPE html>
<html>
<head>
<style>

td,th{  
  padding: 5px;  
  border-bottom: 1px solid #aaa; 
  text-align: center;
}
.center{
  text-align: center; 
  display: inline-block;
}
body{
  text-align: center;
}

</style>
</head>

<body>
<div>
  <h1>Manage Drivers</h1>
</div>


<div class="center">
<table>
  <thead>
    <tr>
       <th>Name</th>
       <th>Manual</th>
       <th>Delete</th>
    </tr>
  </thead>
   <tbody>
     <?php foreach ($drivers as $x => $row):  ?>

       <form action="/index.php/viewDrivers" method="post">
       <input type="hidden" name="deleteDriver" value="<?php echo $row["id"] ?>">
        <tr>
          <td><?php echo $row["first_last_name"]; ?></td>
          <td><?php echo $row["manual"]? "Yes" : "No" ; ?></td>
          <td> <button name="driver" type="submit" >Delete Driver</button> </td>
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

