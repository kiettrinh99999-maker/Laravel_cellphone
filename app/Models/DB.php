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
            $this->conn = new PDO("mysql:host={$host};port=3306;dbname={$db}", $user, $pass, $options);
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
           if (isset($options['columns'])) {
        if (is_array($options['columns'])) {
            $sql .= implode(', ', $options['columns']);
        } else {
            $sql .= $options['columns'];
        }
        } else {
            $sql .= '*';
        }
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
    try {
        // Log::info("Insert attempt", ['table' => $table, 'data_keys' => array_keys($data)]);

        $keys = array_keys($data);
        $cols = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);

        $sql = "INSERT INTO $table ($cols) VALUES ($placeholders)";
        
        // Log::info("SQL prepared", ['sql' => $sql]);

        $stm = $this->conn->prepare($sql);
        
        if (!$stm) {
            $errorInfo = $this->conn->errorInfo();
            // Log::error("Prepare statement failed", ['error' => $errorInfo]);
            throw new Exception("SQL Prepare failed: " . ($errorInfo[2] ?? 'Unknown error'));
        }

        // Log::info("Executing with data", ['data' => $data]);
        $result = $stm->execute($data);

        if (!$result) {
            $errorInfo = $stm->errorInfo();
            throw new Exception("SQL Execute failed: " . ($errorInfo[2] ?? 'Unknown error'));
        }

        $lastInsertId = $this->conn->lastInsertId();
        // Log::info("Insert successful", ['last_insert_id' => $lastInsertId]);

        return $lastInsertId;

    } catch (Exception $e) {
        throw $e; // Re-throw để controller bắt
    }
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