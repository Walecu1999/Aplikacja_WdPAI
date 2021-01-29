<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;

    public function __construct(
        int $id,
        string $email,
        string $password,
        string $name,
        string $surname
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setEmail($email): string
    {
        $this->email = $email;
    }
    public function setName($name): string
    {
        $this->name = $name;
    }
    public function setSurname($surname): string
    {
        $this->name = $surname;
    }
    public function setPassword($password): string
    {
        $this->password = $password;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
}