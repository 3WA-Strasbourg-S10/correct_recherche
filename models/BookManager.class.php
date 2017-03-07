<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function findGenders()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT gender FROM books GROUP BY gender ORDER BY gender");
		while ($gender = mysqli_fetch_assoc($res))
		{
			$list[] = $gender['gender'];
		}
		return $list;
	}
	public function findAll()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY year DESC LIMIT 10");
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
	}
}
?>