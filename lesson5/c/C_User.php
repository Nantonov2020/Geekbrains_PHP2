<?php
//
// Конттроллер страницы чтения.
//
include_once('m/M_User.php');

class C_User extends C_Base
{
	//
	// Конструктор.
	//
	
	/**
	 * Метод отображает форму ввода регистрационных данных.
	 */
	public function action_reg(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST')	{
			$name = htmlspecialchars($_POST['name']);		
			$pass1 = htmlspecialchars($_POST['pass1']);
			$pass2 = htmlspecialchars($_POST['pass2']);
			$email = htmlspecialchars($_POST['email']);
			$err = M_User::save($name, $pass1, $pass2, $email);

			if ($err=='')	{
				$this->title .= '::Вход';
				$text = "Вы успешно зарегистрировались.";
				$this->content = $this->Template('v/v_input.php', array('text' => $text));
			}else{
				$this->title .= '::Регистрация';
				$text = '';
				$this->content = $this->Template('v/v_reg.php', array('text' => $text, 'err' => $err));
			}
		} else {
		$this->title .= '::Регистрация';
		$text = '';
		$err='';
		$this->content = $this->Template('v/v_reg.php', array('text' => $text, 'err' => $err));
		}
	}

	/**
	 * Метод выводит форму для входа на сайт.
	 */
	public function action_input(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST')	{
			$name = htmlspecialchars($_POST['name']);		
			$pass = htmlspecialchars($_POST['pass']);

			$err = M_User::input($name, $pass);

			if ($err != '')	{
				$this->title .= '::Вход';
				$text = $err;
				$this->content = $this->Template('v/v_input.php', array('text' => $text));
			} else {
				$this->action_profile();
			}
		} else {
		$this->title .= '::Вход';
		$text = "";
		$this->content = $this->Template('v/v_input.php', array('text' => $text));
		}
	}

	/**
	 * Метод переходит на страницу профиля пользователя.
	 */
	public function action_profile(){
		session_start();
		if ($_SESSION['name']) {
			$this->title .= '::Профиль';
			$text = '';
			$this->content = $this->Template('v/v_profile.php', array('text' => $text));
		} else {
			$this->action_input();
		}
	}

	public function action_exit(){
		session_start();
		$_SESSION['name'] = "";
		$_SESSION['pass'] = "";
		$this->action_input();
	}

	public function action_auth(){
		/*$this->title .= '::Авторизация';
        $user = new M_User();
		$info = "Пользователь не авторизован";
        if($_POST){
            $login = $_POST['login'];
            $info = $user->auth("log","past"));
		    $this->content = $this->Template('v_auth.php', array('text' => $info));
		}
		else{
		   $this->content = $this->Template('v/v_auth.php');
		}


		*/	
	}
	
	public function __toString(){
        return "title:".$this->title."<br>================================<br>";
    }

}
