<!DOCTYPE html>
<html>
<style>

body {    text-align: center;  margin-top: 10%; }
label {text-align: left;   display: block;  margin: 5px 0;}
.center {  border: 3px solid blue;  padding:0px 10px 0px 10px;
  display: inline-block;  text-align:center;
}
.button{
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>

<body>
<div class="header"><h2 >Create Car</h2></div>
<div class="center">
<form method="post">
  <label for="vin">Vin</label>
    <input type="text" name="vin" id="vin">
  <label for="manufacturer">Manufacturer</label>
    <input type="text" name="manufacturer" id="manufacturer">
  <label for="model">Model</label>
    <input type="text" name="model" id="model">
  <label for="year">Year</label>
    <input type="number" min="1800" max="2020" name="year" id="year">
  <label for="color">Color</label>
    <input type="text" name="color" id="color">
  <label for="automatic">Automatic</label>
  <label>  <input type="radio" name="automatic" id="automatic" value="1"> Yes </label>
  <label>  <input type="radio" name="automatic" id="automatic" value="0"> No  </label>
<div class="button"><input type="submit" name="submit" value="Submit"></div>
</form>


</div>
<div>
<a href="/index.php">Back to home</a>
</div>
</body>
</html>
