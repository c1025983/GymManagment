<?php
class Database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->link->connect_error) {
            $this->error = "Connection fail: " . $this->link->connect_error;
            return false;
        }
    }
    //select

    public function select($query) {
        $result = $this->link->query($query) or die("Error in query: " . $this->link->error . "<br> Query: " . $query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    //inser (read)
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        if ($this->link->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    //update
    public function update($table, $data, $where) {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $query = "UPDATE $table SET $set WHERE $where";
        if ($this->link->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    //delete
    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        if ($this->link->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}

?>
