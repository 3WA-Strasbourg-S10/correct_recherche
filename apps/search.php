<?php
$isbn = "";
if (isset($_GET['isbn']))
	$isbn = $_GET['isbn'];
$price_min = "";
if (isset($_GET['price_min']))
	$price_min = $_GET['price_min'];
$price_max = "";
if (isset($_GET['price_max']))
	$price_max = $_GET['price_max'];
$year_min = "";
if (isset($_GET['year_min']))
	$year_min = $_GET['year_min'];
$year_max = "";
if (isset($_GET['year_max']))
	$year_max = $_GET['year_max'];
$gender = "";
if (isset($_GET['gender']))
	$gender = $_GET['gender'];
$name = "";
if (isset($_GET['name']))
	$name = $_GET['name'];
$author = "";
if (isset($_GET['author']))
	$author = $_GET['author'];
$country = "";
if (isset($_GET['country']))
	$country = $_GET['country'];
$editorial = "";
if (isset($_GET['editorial']))
	$editorial = $_GET['editorial'];
$manager = new BookManager($db);
$genders = $manager->findGenders();
require('views/search.phtml');
?>