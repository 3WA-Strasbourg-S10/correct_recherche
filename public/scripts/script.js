$(document).ready(function()
{
	$('.form-control').keyup(function()
	{
		var name = encodeURIComponent($('#name').val());
		var isbn = encodeURIComponent($('#isbn').val());
		var price_min = encodeURIComponent($('#price_min').val());
		var price_max = encodeURIComponent($('#price_max').val());
		var year_min = encodeURIComponent($('#year_min').val());
		var year_max = encodeURIComponent($('#year_max').val());
		var gender = encodeURIComponent($('#gender').val());
		var author = encodeURIComponent($('#author').val());
		var country = encodeURIComponent($('#country').val());
		var editorial = encodeURIComponent($('#editorial').val());
		$('#resultats').load("index.php?page=search_elem&ajax&name="+name+"&isbn="+isbn+"&price_min="+price_min+"&price_max="+price_max+"&year_min="+year_min+
			"&year_max="+year_max+"&gender="+gender+"&author="+author+"&country="+country+"&editorial="+editorial);
		history.pushState({}, "Recherche", "index.php?page=search&name="+name+"&isbn="+isbn+"&price_min="+price_min+"&price_max="+price_max+"&year_min="+year_min+
			"&year_max="+year_max+"&gender="+gender+"&author="+author+"&country="+country+"&editorial="+editorial);
	});
});