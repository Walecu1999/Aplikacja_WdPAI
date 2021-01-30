<?php


require_once 'AppController.php';

class UserController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();

        $this->userRepository = new UserRepository();
    }

    public function psycho()
    {
//        $this->userRepository = new UserRepository();

        $this->render2('profiles', ['profiles'=>$this->userRepository->getUsers(3)]);
    }

    public function volunteers()
    {
    //    $this->userRepository = new UserRepository();

        $this->render2('profiles', ['profiles'=>$this->userRepository->getUsers(2)]);
    }

    public function authors()
    {
      //  $this->userRepository = new UserRepository();

        $this->render2('profiles', ['profiles'=>$this->userRepository->getUsers(4)]);
    }

    public function team(){

//        $this->userRepository = new UserRepository();
        $users = array_merge(
            $this->userRepository->getUsers(2),
            $this->userRepository->getUsers(3),
            $this->userRepository->getUsers(4)

        );

        $this->render2('profiles', ['profiles'=>$users]);

    }

}