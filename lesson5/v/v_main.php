<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Читать текст</a> |
		<a href="index.php?c=page&act=edit">Редактировать текст</a> |

		<?php
			session_start();
			if ($_SESSION['name']){
				echo '<a href="index.php?c=user&act=profile">Профиль</a>';
				echo ' | <a href="index.php?c=user&act=exit">Выход</a>';
			} else {
				?>
				<a href="index.php?c=user&act=reg">Зарегистрироваться</a> |
				<a href="index.php?c=user&act=input">Вход</a> |
				<?php
			}
		?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</body>
</html>
