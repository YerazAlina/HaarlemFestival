<?php

class User
{
    public int $id;
    public string $email;
    public string $firstname;
    public string $lastname;
    public string $Password;
    public int $roleId;


    public function __toString()
	{
		return "User Account: $this->id";
	}
}