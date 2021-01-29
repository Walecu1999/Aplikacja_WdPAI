<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function main()
    {
        $this->render2('main');
    }
    public function psycho()
    {
        $this->render2('psycho');
    }
}