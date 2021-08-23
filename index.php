<!DOCTYPE html>
<html>
<head>
<title>Title</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
<?
require('menu.php');
$menu = new menu();
?>

<div class="container">
	<div class="row">
		<div class="col-4 bg-light">
			<?=$menu->print_tree($menu->tree());?>
		</div>
		<div class="col-8">
			Hello World!
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function open_menu(e) {
	if ($(e).parent().find('ul').first().is(':hidden')) { 
		
		$(e).parent().find('ul').first().slideDown('fast');
		$(e).find('i').attr('class', 'bi bi-chevron-down float-right');
	} else { 
		$(e).parent().find('ul').slideUp('fast');
		$(e).parent().find('a > i').attr('class', 'bi bi-chevron-right float-right');
	}
}
$(function() {
    $('.top').find('li').each(function() {
		if ($(this).find('ul').length > 0) { 
			$(this).find('ul').slideUp('fast');
			$(this).find('a > i').attr('class', 'bi bi-chevron-right float-right');
		}
	});
});
</script>
</body>
</html>