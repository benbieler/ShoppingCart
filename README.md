# ShoppingCart

[![Join the chat at https://gitter.im/benbieler/ShoppingCart](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/benbieler/ShoppingCart?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Codacy Badge](https://www.codacy.com/project/badge/523309ca2c2545bbb0305ec8f7629981)](https://www.codacy.com/app/benjaminbieler2014/ShoppingCart)

A simple shopping cart  based on Symfony 2, Angularjs and jQuery
![A picture showing the finished product](https://github.com/benbieler/ShoppingCart/blob/master/src/ShopBundle/Resources/public/img/ShoppingCart.PNG)

#Contribute
Clone the repository:
```
git clone https://github.com/benbieler/ShoppingCart.git
```
In order to use the app properly you will have to create a table, with the following name and fields:

```sql
DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `description` VARCHAR(50) NULL DEFAULT NULL,
  `price` DECIMAL(50) NULL DEFAULT NULL,
  `currentOwner` VARCHAR(50) NULL DEFAULT NULL,
  `new field` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```
Then you will have to add some data.

To run the internal web server:

```
php app/console server:run
```
Now you can access the app under:
```
http://localhost:8000/show
```

To install the bower dependencies: 
```
npm install -g bower
bower install
```
#LICENSE
[License] (https://github.com/benbieler/ShoppingCart/blob/master/LICENSE)
