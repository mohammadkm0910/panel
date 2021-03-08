<?php


namespace Model;
use PDO;
use PDOException;
use System\ServerInfo;

class Database
{
    private $conn;
    private $dbHost = ServerInfo::DB_HOST;
    private $dbName = ServerInfo::DB_NAME;
    private $dbUser = ServerInfo::DB_USERNAME;
    private $dbPass = ServerInfo::DB_PASSWORD;
    private $dbOption = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ];
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName",$this->dbUser,$this->dbPass,$this->dbOption);
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
        }
    }
    public function select($sql, $values = null)
    {
        try {
            $statement = $this->conn->prepare($sql);
            if ($values == null){
                $statement->execute();
            } else {
                $statement->execute($values);
            }
            return $statement;
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
            return false;
        }
    }
    public function insert($table,$fields,$values)
    {
        try {
            $sql = "INSERT INTO $table(".implode(", ", $fields).") VALUES ( :".implode(", :",$fields).");";
            $statement = $this->conn->prepare($sql);
            $statement->execute(array_combine($fields, $values));
            return true;
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
            return false;
        }
    }
    public function update($table,$id,$fields,$values)
    {
        $sql = "UPDATE `$table` SET";
        foreach (array_combine($fields,$values) as $field => $value) {
            if ($value)
                $sql .= " `$field`= ? ,";
            else
                $sql .= " `$field`=NULL ,";
        }
        $sql .= " `updated_at`= now()";
        $sql .= " WHERE `id` = ?";
        try {
            $statement = $this->conn->prepare($sql);
            $statement->execute(array_merge(array_filter(array_values($values)),[$id]));
            return true;
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
            return false;
        }
    }
    public function delete($table,$id)
    {
        try {
            $statement = $this->conn->prepare("DELETE FROM `$table` WHERE `id`= ? ;");
            $statement->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
            return false;
        }
    }
    public function createTable($sql)
    {
        try {
            $this->conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            echo "<span style='color: #ff0000'>error database problem: </span>".$e->getMessage()."<br>";
            return false;
        }
    }
}