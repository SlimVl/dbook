<?php

//// Инициализируем сессию
//session_start();
//
//// Простой способ сделать глобально доступным подключение в БД
//function pdo(): PDO
//{
//    static $pdo;
//
//    if (!$pdo) {
//        $config = include __DIR__.'/config.php';
//        // Подключение к БД
//        $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
//        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    }
//
//    return $pdo;
//}

// Используем для подключения к базе данных MySQL
class Database
{
    // Учётные данные базы данных
    private $host = "localhost";
    private $db_name = "dbook";
    private $username = "root";
    private $password = "";
    public $conn;

    // Получаем соединение с базой данных
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Ошибка соединения с БД: " . $exception->getMessage();
        }

        return $this->conn;
    }
}