<?php
require basePath("Models/BaseModel.php");

class User extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Users");
    }

    public function add(string $name, string $email, string $password, string $city, string $country): int
    {
        $query = "INSERT INTO {$this->table}(name, email, password, city, country) VALUES(:name, :email, :password, :city, :country)";
        $params = [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "city" => $city,
            "country" => $country,
        ];

        $smth = $this->connection->prepare($query);
        $smth->execute($params);

        return $this->connection->lastInsertId();
    }
}
