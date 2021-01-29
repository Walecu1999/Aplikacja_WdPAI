<?php


require_once 'AppController.php';

class UserController extends AppController
{
    private $userRepository;

    public function psycho()
    {
        $this->userRepository = new UserRepository();

        $this->render2('psycho', ['profiles'=>$this->userRepository->getVolunteers()]);
    }
}