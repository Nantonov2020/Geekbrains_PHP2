<?php
/**
 * Шаблон страницы профиля.
 * =======================
 * $text - текст
 */
?>
<p>
Страница профиля.
<br>
Вы зашли как: 

<?php
session_start();

echo($_SESSION['name']);
?>

</p>

<?=nl2br($text)?>