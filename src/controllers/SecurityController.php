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
    public function logout(){
        if(isset($_COOKIE['id'])){
            $this->userRepository->logOut($_COOKIE['id']);
            unset($_COOKIE['id']);
            setcookie('id', null, -1, '/');
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);
        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
//        if ($user->getPassword() !== password_hash($password, PASSWORD_DEFAULT) ){
         if(!password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        setcookie('id', $user->getId(), time()+(86400 * 30), "/");
        $user = $userRepository->getUser($email);
        $userRepository->logUser($user->getId());

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/main");
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

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }
        if($email=="" | $password=="" | $name=="" | $surname==""){
            return $this->render('register', ['messages' => ['Wprowadz dane']]);
        }
        $user = new User(0, $email,password_hash($password, PASSWORD_DEFAULT), $name, $surname);
        $this->userRepository->addUser($user);
        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}