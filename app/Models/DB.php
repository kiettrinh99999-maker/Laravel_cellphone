<?php
namespace App\Models;

use PDO;
use Exception;

class DB
{
    private $conn;

    public function __construct($host, $db, $user, $pass)
    {
        try {
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            $this->conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass, $options);
            echo "Kết nối thành công!"; // chỉ bật khi cần test
        } catch (Exception $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function getAll($sql)
    {
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($sql)
    {
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $cols = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);

        $sql = "INSERT INTO $table ($cols) VALUES ($placeholders)";
        $stm = $this->conn->prepare($sql);
        return $stm->execute($data); // trả về true/false
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
