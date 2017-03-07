<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function search($isbn, $price_min, $price_max, $year_min, $year_max, $gender, $name, $author, $country, $editorial)
	{
		$request = "SELECT * FROM books WHERE 1 ";
		if ($isbn != "")
		{
			$isbn = mysqli_real_escape_string($this->db, $isbn);
			$request .= " AND isbn LIKE '%".$isbn."%' ";
		}
		if ($price_min != "")
		{
			$price_min = intval($price_min);
			$request .= " AND price >= '".$price_min."' ";
		}
		if ($price_max != "")
		{
			$price_max = intval($price_max);
			$request .= " AND price <= '".$price_max."' ";
		}
		if ($year_min != "")
		{
			$year_min = intval($year_min);
			$request .= " AND YEAR(year) >= '".$year_min."' ";
		}
		if ($year_max != "")
		{
			$year_max = intval($year_max);
			$request .= " AND YEAR(year) <= '".$year_max."' ";
		}
		if ($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$request .= " AND gender='".$gender."' ";
		}
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= " AND name LIKE '%".$name."%' ";
		}
		if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= " AND author LIKE '%".$author."%' ";
		}
		if ($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$request .= " AND country LIKE '%".$country."%' ";
		}
		if ($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$request .= " AND editorial LIKE '%".$editorial."%' ";
		}
		$request .= " ORDER BY name ASC LIMIT 50";
		$list = [];
		$res = mysqli_query($this->db, $request);
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
	}
	public function search2($isbn, $price_min, $price_max, $year_min, $year_max, $gender, $name, $author, $country, $editorial)
	{
		$where = [" 1 "];
		if ($isbn != "")
		{
			$isbn = mysqli_real_escape_string($this->db, $isbn);
			$where[] = " isbn LIKE '%".$isbn."%' ";
		}
		if ($price_min != "")
		{
			$price_min = intval($price_min);
			$where[] = " price >= '".$price_min."' ";
		}
		if ($price_max != "")
		{
			$price_max = intval($price_max);
			$where[] = " price <= '".$price_max."' ";
		}
		if ($year_min != "")
		{
			$year_min = intval($year_min);
			$where[] = " YEAR(year) >= '".$year_min."' ";
		}
		if ($year_max != "")
		{
			$year_max = intval($year_max);
			$where[] = " YEAR(year) <= '".$year_max."' ";
		}
		if ($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$where[] = " gender='".$gender."' ";
		}
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$where[] = " name LIKE '%".$name."%' ";
		}
		if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$where[] = " author LIKE '%".$author."%' ";
		}
		if ($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$where[] = " country LIKE '%".$country."%' ";
		}
		if ($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$where[] = " editorial LIKE '%".$editorial."%' ";
		}
		$request = "SELECT * FROM books WHERE ".implode('AND', $where)." ORDER BY name ASC LIMIT 50";
		$list = [];
		$res = mysqli_query($this->db, $request);
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
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
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY name DESC LIMIT 10");
		while ($book = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $book;
		}
		return $list;
	}
}
?>