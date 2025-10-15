<?php
namespace App\Models;

use PDO;
use Exception;

class DB
{
    private static $instance = null; // biến tĩnh giữ kết nối duy nhất
    private $conn;

    private function __construct()
    {
        $host = env('host');
        $db   = env('db');
        $user = env('user');
        $pass = env('pass');

        try {
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            $this->conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass, $options);
        } catch (Exception $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    // Hàm lấy thể hiện duy nhất (singleton)
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    // Lấy PDO connection gốc nếu cần
    public function getConnection()
    {
        return $this->conn;
    }

    public function getAll($table, $options = [])
    {
        $sql = "SELECT ";

        // Cột cần lấy
        $sql .= isset($options['columns']) ? $options['columns'] : '*';
        $sql .= " FROM {$table}";

        // JOIN
        if (!empty($options['join'])) {
            $sql .= " " . $options['join'];
        }

        // WHERE
        if (!empty($options['where'])) {
            $sql .= " WHERE " . $options['where'];
        }

        // GROUP BY
        if (!empty($options['groupBy'])) {
            $sql .= " GROUP BY " . $options['groupBy'];
        }

        // HAVING
        if (!empty($options['having'])) {
            $sql .= " HAVING " . $options['having'];
        }

        // ORDER BY
        if (!empty($options['orderBy'])) {
            $sql .= " ORDER BY " . $options['orderBy'];
        }

        // LIMIT
        if (!empty($options['limit'])) {
            $sql .= " LIMIT " . $options['limit'];
        }

        $stm = $this->conn->prepare($sql);
        $stm->execute($options['params'] ?? []);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $options = [])
    {
        $options['limit'] = 1;
        $result = $this->getAll($table, $options);
        return $result[0] ?? null;
    }

    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $cols = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);

        $sql = "INSERT INTO $table ($cols) VALUES ($placeholders)";
        $stm = $this->conn->prepare($sql);
        return $stm->execute($data);
    }

    public function update($table, $data = [], $condition = '')
    {
        $update = '';
        foreach ($data as $key => $value) {
            $update .= "$key = :$key,";
        }
        $update = rtrim($update, ',');

        $sql = "UPDATE $table SET $update";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $stm = $this->conn->prepare($sql);
        return $stm->execute($data);
    }

    public function delete($table, $condition = '')
    {
        $sql = "DELETE FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $stm = $this->conn->prepare($sql);
        return $stm->execute();
    }
}
