<?php

require basePath("Models/User.php");
require basePath("Validation.php");

class UsersController
{
    private $db;

    public function __construct()
    {
        $this->db = new User();
    }
    public function signupView()
    {
        loadView("Users/register");
    }

    public function loginView()
    {
        loadView("Users/login");
    }

    public function create(): void
    {
        // *todo ADD FLASH MESSAGES

        $name = $_POST["name"] ?? "";
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";
        $confirmPassword = $_POST["confirm_password"] ?? "";
        $city = $_POST["city"] ?? "";
        $country = $_POST["country"] ?? "";

        inspect("password: " . $password . " | length: " . strlen($password));
        $errors = [];

        $user = $this->db->findOne("email", $email, "User");

        if ($user) {
            $errors[] = ["message" => "Email already in use"];
        }

        if (!(Validation::string($name, 3))) {
            $errors[] = ["message" => "Name should have at least 3 characters"];
        }

        if (!(Validation::string($password, 6))) {
            $errors[] = ["message" => "password should have at least 6 characters"];
        }

        if (!Validation::string($email, 1)) {
            $errors[] = ["message" => "Enter a valid email"];
        }

        if (!Validation::confirmPassword($password, $confirmPassword)) {
            $errors[] = ["message" => "The passwords do not match"];
        }

        if (!empty($errors)) {
            Session::set("error_messages", $errors);
            inspect($errors);
            loadView("Users/register", [
                "user" => [
                    "name" => $name,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                ],
                "errors" => $errors
            ]);
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $userId = $this->db->add($name, $email, $hashed_password, $city, $country);

        Session::set("user", [
            "id" => $userId,
            "name" => $name,
            "email" => $email,
            "city" => $city,
            "country" => $country,
            "user_type" => $user["user_type"]
        ]);

        Session::set("success_messages", [["message" => "User Created Successfully"]]);

        header("location: /");
    }

    public function login(): void
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->db->findOne("email", $email);
        $errors = [];

        if ($user && password_verify($password, $user["password"])) {
            Session::set("user", [
                "id" => $user["id"],
                "name" => $user["name"],
                "email" => $user["email"],
                "city" => $user["city"],
                "country" => $user["country"],
                "user_type" => $user["user_type"]
            ]);
            Session::set("success_messages", [["message" => "User logged in"]]);

            header("location: /");
        } else {
            $errors[] = ["message" => "Incorrect credentials"];
            Session::set("error_messages", $errors);
            loadView("Users/login");
        }
    }

    public function logout()
    {
        Session::clearAll();
        header("location: /");
    }
}
