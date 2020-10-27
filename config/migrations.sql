CREATE TABLE `babylon`.`leaders` ( 
    `id` INT NULL AUTO_INCREMENT, 
    `name` VARCHAR(50) NOT NULL , 
    `year_start` VARCHAR(10) NOT NULL , 
    `year_end` VARCHAR(10) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;

    CREATE TABLE `babylon`.`food` ( 
        `id` INT NULL AUTO_INCREMENT, 
        `name` VARCHAR(50) NOT NULL , 
        `qty` INT NOT NULL , 
        `leader_id` INT NOT NULL , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;