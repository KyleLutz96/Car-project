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
<div class="header"><h2 >Add Driver</h2></div>
<div class="center">
<form method="post">
  <label for="name">Full Name</label>
    <input type="text" name="name" id="name">
  <label for="manual">Can Drive Manual
   <label> <input type="radio" name="manual" value="1"> Yes </label>
   <label> <input type="radio" name="manual" value="0"> No  </label>
</label>

 <div class="button"><input type="submit" name="submit" value="Submit"></div>
</form>


</div>
<div>
<a href="/index.php">Back to home</a>
</div>
</body>
</html>
