CREATE DATABASE IF NOT EXISTS Restaurant;

USE Restaurant;

CREATE TABLE user
(
	username VARCHAR(20) PRIMARY KEY NOT NULL,
    email VARCHAR(20) NOT NULL,
    fullname VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    sex VARCHAR(10) NOT NULL, 
    age INT NOT NULL
);

CREATE TABLE item_promotion
(
	item_promotion_id VARCHAR(20) NOT NULL,
    item_id INT NOT NULL PRIMARY KEY
);

CREATE TABLE item_category
(
	category_id INT AUTO_INCREMENT PRIMARY KEY,
	category VARCHAR(50) NOT NULL,
    sub_category VARCHAR(50) NOT NULL
);

ALTER TABLE item_category AUTO_INCREMENT = 1;


CREATE TABLE item
(
	item_id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(25) NOT NULL,
    subcategory VARCHAR(25) NOT NULL,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(7,2) NOT NULL,
    image_path VARCHAR(100) NOT NULL,
    discount INT NULL,
    rating INT DEFAULT 0,
    date_added DATETIME NOT NULL,
    available BOOLEAN DEFAULT TRUE,
    number_of_orders INT DEFAULT 0,
    category_id INT NOT NULL,
    FOREIGN KEY item_item_category(category_id)
		REFERENCES item_category(category_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY item_item_promotion(item_id)
		REFERENCES item_promotion(item_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

ALTER TABLE item AUTO_INCREMENT=1;


CREATE TABLE login
(
	username VARCHAR(20) PRIMARY KEY NOT NULL,
	password VARCHAR(255) NOT NULL,
	activated BOOLEAN DEFAULT TRUE,
	role VARCHAR(20) NOT NULL,
	login_time DATETIME NOT NULL,
	login_count INT NOT NULL,
    FOREIGN KEY login_user(username)
		REFERENCES user(username)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE user_cart
(
	username VARCHAR(20) NOT NULL,
    item_id INT NOT NULL,
    rating INT DEFAULT 0,
    quantity INT NOT NULL,
    date_added DATETIME NOT NULL,
    PRIMARY KEY(username,item_id),
    FOREIGN KEY user_cart_user(username)
		REFERENCES user(username)
        ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY user_cart_item(item_id)
		REFERENCES item(item_id)
        ON UPDATE CASCADE
);

CREATE TABLE feedback
(
	feedbackid INT AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    message VARCHAR(100) NOT NULL,
    feedback_type VARCHAR(20) DEFAULT "product",
    submitted_date DATETIME NOT NULL,
    reply VARCHAR(100) DEFAULT NULL,
    reply_status BOOLEAN DEFAULT FALSE,
    PRIMARY KEY(feedbackid,username),
    FOREIGN KEY feedback_user(username)
		REFERENCES user(username)
        ON UPDATE CASCADE ON DELETE CASCADE        
);

ALTER TABLE feedback AUTO_INCREMENT=1;

CREATE TABLE order_item
(
	username VARCHAR(20) NOT NULL,
    item_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    email VARCHAR(20) NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    delivery_time DATETIME NOT NULL,
    payment decimal(7,2) NOT NULL,
    remarks VARCHAR(200) NULL,
    submitted_time DATETIME NOT NULL,
    order_number INT AUTO_INCREMENT,
    PRIMARY KEY (username,item_id),
    UNIQUE KEY (order_number),
    FOREIGN KEY order_item_user(username)
		REFERENCES user(username)
        ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY order_item_item(item_id)
		REFERENCES item(item_id)
        ON UPDATE CASCADE
);

ALTER TABLE order_item AUTO_INCREMENT=1;

CREATE TABLE saved_item
(
	username VARCHAR(20) NOT NULL,
    item_id INT NOT NULL,
    date_added DATETIME NOT NULL,
    PRIMARY KEY (username,item_id),
    FOREIGN KEY saved_item_user(username)
		REFERENCES user(username)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY saved_item_item(item_id)
		REFERENCES item(item_id)
        ON UPDATE CASCADE
);


CREATE TABLE promotion
(
	promotion_id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL,
    date_added DATETIME NOT NULL,
    promotion_date DATETIME NOT NULL,
    venue VARCHAR(20) NOT NULL,
    remarks VARCHAR(100) NULL,
    item_id INT NOT NULL,
    FOREIGN KEY promotion_item(item_id)
		REFERENCES item(item_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

ALTER TABLE promotion AUTO_INCREMENT=1;

CREATE TABLE user_report
(
	username VARCHAR(20) PRIMARY KEY NOT NULL,
    number_of_logins INT DEFAULT 0,
    last_login DATETIME NOT NULL,
    orders INT DEFAULT 0,
    feedbacks INT DEFAULT 0,
    FOREIGN KEY user_report_user(username)
		REFERENCES user(username)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE item_report
(
	item_id INT PRIMARY KEY NOT NULL,
    number_of_orders INT DEFAULT 0,
    rating INT DEFAULT 0,
    FOREIGN KEY item_report_item(item_id)
		REFERENCES item(item_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE staff
(
	username VARCHAR(20) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    department VARCHAR(20) NOT NULL,
    role VARCHAR(10) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    staff_id VARCHAR(20) NOT NULL,
    FOREIGN KEY staff_user(username)
		REFERENCES user(username)
);




