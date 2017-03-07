<?php
$errors = [];
$db = mysqli_connect("192.168.1.95","recherche","recherche","recherche");
session_start();
$page = "search";
function __autoload($classname)
{
	require('models/'.$classname.'.class.php');
}
if (isset($_GET['ajax']))
	require('apps/search_elem.php');
else
	require('apps/skel.php');
?>