<?php
/**
 * Шаблон страницы с регистрацией.
 * =======================
 * $text - текст
 */
?>
<p style='color:red;'>
<?=nl2br($err)?>
</p>
<br><form method='POST' action='#'>
Введите логин: <input type='text' name='name'><br><br>
Введите пароль(не менее 6 символов):<input type='password' name='pass1'><br><br>
Подтвердите пароль:<input type='password' name='pass2'><br><br>
Введите e-mail:<input type='text' name='email'><br><br>
<input type='submit' value='Зарегистрироваться'>
</form>

<?=nl2br($text)?>