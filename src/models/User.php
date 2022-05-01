<?php

class User {
    private $email;
    private $password;
    private $name;
    private $surname;
    private $permission;
	
    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        int $permission
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->permission = $permission;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getPermission(): int
    {
        return $this->permission;
    }

    public function setPermission(int $permission): void
    {
        $this->permission = $permission;
    }
}