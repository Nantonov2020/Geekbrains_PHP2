<?
class M_User {
	function auth($login,$pass){
	    //....
        return true;
    }

    /**
     * Метод отвечает за запись данных пользователя в БД при регистрации.
     */
    static function save($name, $pass1, $pass2, $email){
        $err = "";
        if ($pass1 != $pass2) $err .= "Подтверждение пароля не совпадает с паролем. ";
        if (mb_strlen($pass1) < 6) $err .= "Пароль не должен быть меньше 6 символов. ";
        if (mb_strlen($name) < 3) $err .= "Логин не должен быть меньше 3 символов. ";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $err .= "Введите корректный адрес электронной почты. ";

        if ($err == ''){
            $pass = md5($pass1);
            include_once('M_connectBD.php');
            $sth = $db->prepare("INSERT INTO users (name, pass, email) VALUES (?, ?, ?)");
            $sth->execute(array($name, $pass, $email));
        }
        return $err;
    }


    static function input($name, $pass){
        $err ='';
        if ((mb_strlen($pass) < 6)||(mb_strlen($name) < 3)) $err .= "Некорректно введен логин или пароль.";
        $pass = md5($pass);
        include_once('M_connectBD.php');
        $sth = $db->prepare("SELECT count(*) FROM users WHERE (name='?' AND pass='?')");
        $sth->execute(array($name, $pass));

        if ($sth < 1) {
            $err = 'Логин или пароль введены некорректно.';
            } else {
                session_start();
                $_SESSION['name'] = $name;
                $_SESSION['pass'] = $pass; 
            }

        return $err;
    }

}