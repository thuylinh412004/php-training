<?php
require_once 'configs/database.php';

<<<<<<< HEAD
abstract class BaseModel
{
    // Database connection
    protected static $_connection;

    public function __construct()
    {
=======
abstract class BaseModel {
    // Database connection
    protected static $_connection;

    public function __construct() {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f

        if (!isset(self::$_connection)) {
            self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            if (self::$_connection->connect_errno) {
                printf("Connect failed");
                exit();
            }
        }
<<<<<<< HEAD
=======

>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
    }

    /**
     * Query in database
     * @param $sql
     */
<<<<<<< HEAD
    protected function query($sql)
    {
=======
    protected function query($sql) {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f

        $result = self::$_connection->query($sql);
        return $result;
    }

    /**
     * Select statement
     * @param $sql
     */
<<<<<<< HEAD
    protected function select($sql)
    {
=======
    protected function select($sql) {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
        $result = $this->query($sql);
        $rows = [];
        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    /**
     * Delete statement
     * @param $sql
     * @return mixed
     */
<<<<<<< HEAD
    protected function delete($sql)
    {
=======
    protected function delete($sql) {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
        $result = $this->query($sql);
        return $result;
    }

    /**
     * Update statement
     * @param $sql
     * @return mixed
     */
<<<<<<< HEAD
    protected function update($sql)
    {
=======
    protected function update($sql) {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
        $result = $this->query($sql);
        return $result;
    }

    /**
     * Insert statement
     * @param $sql
     */
<<<<<<< HEAD
    protected function insert($sql)
    {
=======
    protected function insert($sql) {
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
        $result = $this->query($sql);
        return $result;
    }

<<<<<<< HEAD
    /**
     * SELECT prepared statement (safe)
     * @param string $sql
     * @param string $types
     * @param array $params
     * @return array
     */
    protected function selectPrepared($sql, $types = '', $params = [])
    {
        $stmt = self::$_connection->prepare($sql);
        if ($stmt === false) return [];
        if ($types && $params) $this->bindParams($stmt, $types, $params);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $rows;
    }

    /**
     * INSERT prepared statement
     * @param string $sql
     * @param string $types
     * @param array $params
     * @return mixed insert_id or false
     */
    protected function insertPrepared($sql, $types = '', $params = [])
    {
        $stmt = self::$_connection->prepare($sql);
        if ($stmt === false) return false;
        if ($types && $params) $this->bindParams($stmt, $types, $params);
        $ok = $stmt->execute();
        if (!$ok) {
            $stmt->close();
            return false;
        }
        $insertId = self::$_connection->insert_id;
        $stmt->close();
        return $insertId;
    }

    /**
     * UPDATE/DELETE prepared statement
     * @param string $sql
     * @param string $types
     * @param array $params
     * @return int|false affected_rows
     */
    protected function executePrepared($sql, $types = '', $params = [])
    {
        $stmt = self::$_connection->prepare($sql);
        if ($stmt === false) return false;
        if ($types && $params) $this->bindParams($stmt, $types, $params);
        $ok = $stmt->execute();
        if (!$ok) {
            $stmt->close();
            return false;
        }
        $affected = self::$_connection->affected_rows;
        $stmt->close();
        return $affected;
    }

    /**
     * Bind parameters helper (for prepared statements)
     */
    protected function bindParams(&$stmt, $types, $params)
    {
        $bind_names[] = $types;
        for ($i = 0; $i < count($params); $i++) {
            $bind_name = 'bind' . $i;
            $$bind_name = $params[$i];
            $bind_names[] = &$$bind_name;
        }
        call_user_func_array([$stmt, 'bind_param'], $bind_names);
    }
=======
>>>>>>> fe7b58aa9dd0a5f45ce3883cc052d3d25374208f
}
