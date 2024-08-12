<?php
// require realpath(__DIR__ . "/vendor/autoload.php");

// use Dotenv\Dotenv;

class BaseModel
{
    protected $table;
    protected $connection;

    public function __construct($table)
    {
        $this->table = $table;

        $DB_HOST = $_ENV['DB_HOST'];
        $DB_PORT = $_ENV["DB_PORT"];
        $DB_NAME = $_ENV["DB_NAME"];
        $DB_PASSWORD = $_ENV["DB_PASSWORD"];
        $DB_USERBAME = $_ENV["DB_USERNAME"];

        $dsn = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO($dsn, $DB_USERBAME, $DB_PASSWORD, $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e);
        }
    }

    public function findAll(string $field = "", string $value = ""): array | false
    {
        if (empty($query) && empty($value)) {
            $query = "SELECT * FROM {$this->table}";
        } else {
            $query = "SELECT * FROM {$this->table} WHERE {$field} = {$value}";
        }

        return $this->connection->query($query)->fetchAll();
    }

    public function findOne(string $field, string $value): array | false
    {
        if ($field === "id") {
            $query = "SELECT * FROM {$this->table} WHERE {$field} = {$value}";
        } else {
            $query = "SELECT * FROM {$this->table} WHERE {$field} = '{$value}'";
        }
        return $this->connection->query($query)->fetch();
    }

    public function customFetch(string $query, array $params, bool $all = true)
    {
        $smth = $this->connection->prepare($query);
        $smth->execute($params);

        if ($all) {
            return $smth->fetchAll();
        } else {
            return $smth->fetch();
        }
    }
}
