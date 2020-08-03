<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// model.php
function searchCars($option1, $search1, $option2 = null, $search2 = null)
{
  try {

    require("DBTransaction.php");
    $transaction = new DBTransaction();
    $getCarsQuery = "select * from cars";

    if($option1 && $search1){
            $getCarsQuery = $getCarsQuery." where ".$option1." = :searchField1";
            $data["searchField1"] = $search1;

            if($option2 && $search2){
                    $getCarsQuery = $getCarsQuery." and ".$option2." = :searchField2";
                    $data["searchField2"] = $search2;
            }
    }else if($option2 && $search2){
            $getCarsQuery = $getCarsQuery." where ".$option2." = :searchField2";
            $data["searchField2"] = $search2;
    }

    $result = $transaction->queryTransaction($getCarsQuery, $data);
    return $result;


  }catch(PDOException $error){
      echo $sql . "<br>" . $error->getMessage();
  }
}



function getAllCars()
{
    require("DBTransaction.php");
    $transaction = new DBTransaction();
    $getCarsQuery = "select * from cars";
    $result = $transaction->queryTransaction($getCarsQuery, $data);
    return $result;
}

function addCar()
{
    require("DBTransaction.php");
    $transaction = new DBTransaction();
    try{
        $newCar = array(
            "vin"          => $_POST['vin'],
            "manufacturer" => $_POST['manufacturer'],
            "model"        => $_POST['model'],
            "year"         => $_POST['year'],
            "color"        => $_POST['color'],
            "automatic"    => $_POST['automatic']
          );
          $insertCarQuery = "insert into cars (vin, manufacturer, model, model_year, color, auto_trans) values(:vin,  :manufacturer, :model, :year, :color, :automatic)";
          $transaction->insertTransaction($insertCarQuery, $newCar);
          $result = $transaction->submitTransaction();

    } catch(PDOException $error) {
      echo  $error->getMessage();
    }
}

function deleteCar($id)
{

   require("DBTransaction.php");
  try{
   $transaction = new DBTransaction();

   echo "$id wasd";
   $delete_query = "DELETE from cars where id = :id";

   $transaction->deleteTransaction($delete_query, ['id' => $id]);
   echo "after transaction";

    $getCarsQuery = "select * from cars";
    $result = $transaction->queryTransaction($getCarsQuery);
    return $result;


   } catch(PDOException $error) {
      echo  $error->getMessage();
   }


}

function addDriver()
{
     require("DBTransaction.php");
     $transaction = new DBTransaction();
     try{
         $newDriver = array(
             "first_last_name" => $_POST['name'],
             "manual"          => $_POST['manual'],
           );
           $insertDriverQuery = "insert into drivers (first_last_name, manual) values(:first_last_name, :manual)";
           $transaction->insertTransaction($insertDriverQuery, $newDriver);
           $result = $transaction->submitTransaction();
          } catch(PDOException $error) {
       echo  $error->getMessage();
     }

}

function deleteDriver($id){

    require("DBTransaction.php");

  try{
    $transaction = new DBTransaction();

    $delete_query = "DELETE from drivers where id = :id";

    $transaction->deleteTransaction($delete_query, ['id' => $id]);

    $getDriversQuery = "select * from drivers";

    $result = $transaction->queryTransaction($getDriversQuery);
    return $result;
  } catch(PDOException $error) {
      echo  $error->getMessage();
  }

}

function getAllDrivers(){

   try {
         require("DBTransaction.php");

         $transaction = new DBTransaction();
         $getDriversQuery = "select * from drivers";

         $result = $transaction->queryTransaction($getDriversQuery);
         return $result;

   }catch(PDOException $error){
           echo $error->getMessage();
   }
}

function getLinkedDrivers(){

        require("DBTransaction.php");
	$transaction = new DBTransaction();

try{
      if (isset($_POST['driverId'])) {
            $_GET["linkDriver"] =  $_POST["carId"];


        $insertLinkQuery = "insert into car_drivers (driver_id, car_id) values(:driver_id, :car_id)";
        $newLink = array(
           "driver_id" => $_POST["driverId"],
           "car_id" => $_POST["carId"]
        );
        $transaction->insertTransaction($insertLinkQuery, $newLink);
     }
   }catch(PDOException $error){
         echo $error->getMessage();
   }

try{


          $getCarsQuery = "select * from cars where id = :id";
          $data["id"] = $_GET["linkDriver"];

          $car = $transaction->queryTransaction($getCarsQuery, $data);

          $getLinkedDriversQuery = "select drivers.first_last_name, drivers.id from car_drivers join drivers on drivers.id = car_drivers.driver_id where car_id = :car_id";

          $linkedDrivers = $transaction->queryTransaction($getLinkedDriversQuery,["car_id" => $_GET["linkDriver"]]);
          if($linkedDrivers){
                  echo "linked drivers";
                  foreach($linkedDrivers as $x => $driver){
                          $driverIds[] = $driver["id"];
                          $in  = str_repeat('?,', count($driverIds) - 1) . '?';
                  }
                  $getDriversQuery = "select * from drivers where id not in ($in)";

                  $drivers = $transaction->queryTransaction($getDriversQuery, $driverIds);
          }else{
                  echo "else";
                  $getDriversQuery = "select * from drivers";
                  $drivers = $transaction->queryTransaction($getDriversQuery);
          }
          return array(
             "car" => $car,
             "linkedDrivers" => $linkedDrivers,
	     "drivers" => $drivers
         );
    }catch(PDOException $error){
     echo $sql . "<br>" . $error->getMessage();
    }

}

function linkDriver($id,$carId){
     $_GET["linkDriver"] =  $_POST["carId"];

   try{

          require("DBTransaction.php");
          $transaction = new DBTransaction();

        $insertLinkQuery = "insert into car_drivers (driver_id, car_id) values(:driver_id, :car_id)";
        $newLink = array(
           "driver_id" => $_POST["driverId"],
           "car_id" => $_POST["carId"]
        );
        $transaction->insertTransaction($insertLinkQuery, $newLink);
      }catch(PDOException $error){
         echo "<br>" .$error->getMessage();
      }

}
