<?php

namespace Models;

class User
{
    private $idUser;
    private $user;
    private $password;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

	public function getIdUser()
	{
		return $this->idUser;
	}

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }
}
