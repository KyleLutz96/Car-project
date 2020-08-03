  CREATE TABLE cars (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    vin VARCHAR(255) NOT NULL UNIQUE,
    manufacturer VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    model_year year(4) NOT NULL,
    color VARCHAR(255) NOT NULL,
    auto_trans TINYINT(1)
  );

  CREATE TABLE drivers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_last_name VARCHAR(255) NOT NULL,
    manual TINYINT(1) NOT NULL
  );

  CREATE TABLE car_drivers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    driver_id INT,
    car_id INT,
    FOREIGN KEY (driver_id) REFERENCES drivers(id) ON DELETE CASCADE,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
  ); 


