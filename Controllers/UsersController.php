<?php

class UsersController
{
    public function signupView()
    {
        loadView("Users/register");
    }

    public function loginView()
    {
        loadView("Users/login");
    }
}
