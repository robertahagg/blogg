<?php

namespace Blog\Domain;

use Blog\Utils\Unique;

class Users
{
    use Unique;

    protected $firstname;
    protected $lastname;
    protected $username;
    protected $email;
    protected $password;

    public function __construct($id, $firstname, $lastname, $username, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->setId($id);
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
