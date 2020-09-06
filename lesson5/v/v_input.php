<?php
/**
 * Шаблон страницы с регистрацией.
 * =======================
 * $text - текст
 */
?>
<?=nl2br($text)?>
<br><br>
<form method='POST' action='#'>
Введите логин: <input type='text' name='name'><br><br>
Введите пароль:<input type='password' name='pass'><br><br>
<input type='submit' value='Вход'>
</form>

