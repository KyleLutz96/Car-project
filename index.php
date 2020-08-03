<?php 

require_once 'model.php';
require_once 'controllers.php';

// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/index.php' === $uri) {
    main_action();

}elseif('/index.php/addCar' === $uri){
   if(isset($_POST["submit"])){
      addCarAction();
   }else{
      addCarFormAction();
   }

}elseif('/index.php/viewCars' === $uri) {
    if(isset($_POST['deleteCar'])){
        deleteCarAction($_POST['deleteCar']);
    }elseif(( isset($_GET['option1']) && isset($_GET['search1'])) || ( isset($_GET['option2']) && isset($_GET['search2'])) ){
        searchCarsAction($_GET['option1'], $_GET['search1'], $_GET['option2'], $_GET['search2']);
    }else {
        viewCarsAction();
    }

}elseif('/index.php/addDriver' === $uri) {
    if(isset($_POST["submit"])){
       addDriverAction();
    }else{
       addDriverFormAction();
    }
}elseif('/index.php/viewDrivers' === $uri){
    if(isset($_POST['deleteDriver'])){
       deleteDriverAction($_POST['deleteDriver']);
   }else{
       viewDriversAction();
   }
}elseif('/index.php/linkDriver' === $uri){
       linkDriverAction();

}else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
