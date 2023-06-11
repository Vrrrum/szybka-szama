CREATE TABLE `Users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar NOT NULL,
	`user_password` varchar NOT NULL,
	`user_email` varchar NOT NULL,
	`user_contact_number` INT NOT NULL,
	`user_type` varchar NOT NULL,
	`creation_date` DATE NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `Restaurants` (
	`restaurant_id` INT NOT NULL AUTO_INCREMENT,
	`restaurant_name` varchar NOT NULL,
	`menu` varchar NOT NULL,
	`restaurant_contact_number` INT NOT NULL,
	`owner_id` INT NOT NULL,
	PRIMARY KEY (`restaurant_id`)
);

CREATE TABLE `Dishes` (
	`dish_id` INT NOT NULL AUTO_INCREMENT,
	`dish_name` varchar NOT NULL,
	`caloric_values` INT NOT NULL,
	`allergen_id` INT NOT NULL,
	`price` INT NOT NULL,
	PRIMARY KEY (`dish_id`)
);

CREATE TABLE `Orders` (
	`order_id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`restaurant_id` INT NOT NULL,
	`dishes_id` INT NOT NULL,
	`full_price` INT NOT NULL,
	PRIMARY KEY (`order_id`)
);

CREATE TABLE `Allergens` (
	`allergen_id` INT NOT NULL AUTO_INCREMENT,
	`allergen_name` INT NOT NULL,
	PRIMARY KEY (`allergen_id`)
);

ALTER TABLE `Restaurants` ADD CONSTRAINT `Restaurants_fk0` FOREIGN KEY (`owner_id`) REFERENCES `Users`(`user_id`);

ALTER TABLE `Dishes` ADD CONSTRAINT `Dishes_fk0` FOREIGN KEY (`allergen_id`) REFERENCES `Allergens`(`allergen_id`);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk0` FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurants`(`restaurant_id`);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk2` FOREIGN KEY (`dishes_id`) REFERENCES `Dishes`(`dish_id`);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk3` FOREIGN KEY (`full_price`) REFERENCES `Dishes`(`price`);






