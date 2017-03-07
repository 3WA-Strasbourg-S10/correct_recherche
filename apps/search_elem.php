<?php
$manager = new BookManager($db);
$list = $manager->findAll();
foreach ($list AS $book)
{
	require('views/search_elem.phtml');
}
?>