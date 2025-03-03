CREATE DATABASE free;

CREATE TABLE customer(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    address VARCHAR(100),
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(20)
);

CREATE TABLE purchase(
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    FOREIGN KEY(customer_id) REFERENCES customer(id)
);

CREATE TABLE purchase_detail(
    purchase_id INT,
    product_id INT,
    count INT,
    PRIMARY KEY(purchase_id, product_id)
);

CREATE TABLE favorite(
    customer_id INT,
    product_id INT,
    PRIMARY KEY (customer_id, product_id),
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);


CREATE TABLE product(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    price INT NOT NULL
);

INSERT INTO product VALUES(
    NULL, 'いぬ', 50
);
INSERT INTO product VALUES(
    NULL,'ねこ',180
);
INSERT INTO product VALUE(
    NULL,'たぬき',150
);
INSERT INTO product VALUE(
    NULL,'ねこ(はんぺん、諭吉、きんちゃく)',400
);
INSERT INTO product VALUES(
    NULL, '天地返しいぬ', 0
);
INSERT INTO product VALUES(
    NULL, 'さかな', 5
);