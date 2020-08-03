<?php

function main_action(){
   require 'templates/main.php';
}

function addCarFormAction(){
   require 'templates/addCar.php';
}

function addCarAction(){
   addcar();
   require 'templates/addCar.php';
}

function viewCarsAction(){
   $cars = getAllCars();
   require 'templates/viewCars.php';
}

function searchCarsAction($option1, $search1, $option2 = null, $search2 = null){
   if($option1 && $search1){
      if($option2 && $search2){
         $cars = searchCars($option1, $search1, $option2, $search2);
      }else{
         $cars = searchCars($option1, $search1);
      }
   }elseif($option2 && $search2){
      $cars = searchCars($option2, $search2);
   }else{
      $cars = getAllCars();
   }

   require 'templates/viewCars.php';
}

function deleteCarAction($id){
  $cars =  deleteCar($id);
  require 'templates/viewCars.php';
}

function addDriverFormAction(){
   require 'templates/addDriver.php';
}

function addDriverAction(){
   addDriver();
   require 'templates/addDriver.php';
}

function deleteDriverAction($id){
   $drivers =  deleteDriver($id);
   require 'templates/viewDrivers.php';
}

function viewDriversAction(){
   $drivers = getAllDrivers();
   require 'templates/viewDrivers.php';
}

function linkDriverAction(){
   $data = getLinkedDrivers();
   require 'templates/linkDriver.php';
}


