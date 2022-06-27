<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render('login', ['messages' => ['Enter a valid email address !']]);
        }

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if($user->getPermission() == 2)
            $_SESSION['permission'] = 2;
        $_SESSION['email'] = $email;
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/search");
    }

    public function logout()
    {
        if ($this->isGet()) {
            session_destroy();
            return $this->render('login');
        }
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $permission = $_POST['permission'];

        if($email === "" || $password === "" || $confirmedPassword === "" || $name === ""|| $surname === "" ) {
            return $this->render('register', ['messages' => ['Complete all the necessary information!']]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render('register', ['messages' => ['Enter a valid email address !']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $permission_value = 1;
        if($permission) {
            $permission_value = 2;
        }
        $user = new User($email, md5($password), $name, $surname, $permission_value);

        if($this->userRepository->addUser($user) === false)
            return $this->render('register', ['messages' => ['This email address already exists!']]);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}