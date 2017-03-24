<?php
class Database {

    private static $db;
    private $connection;

    private function __construct() {
    	try 
		{
		    $this->connection = new PDO('mysql:host='.$GLOBALS['config']['sql']['host'].';dbname='.$GLOBALS['config']['sql']['dbname'].';', $GLOBALS['config']['sql']['username'], $GLOBALS['config']['sql']['password']);
		    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
        catch (PDOException $e)
		{
			dnd($e);
		}
    }

    function __destruct() {
        $this->connection = null;
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new self();
        }
        return self::$db->connection;
    }
	public static function select($sql, $params) {
		$stmt = self::getConnection()->prepare($sql);
		foreach ($params as $key => $value) {
			$stmt->bindParam($key + 1, (!empty($value) ? $value : ""));
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function insert($sql, $params) {
		$stmt = self::getConnection()->prepare($sql);
		foreach ($params as $key => $value) {
			$stmt->bindParam($key + 1, (!empty($value) ? $value : ""));
		}
		$stmt->execute();
		return self::getConnection()->lastInsertId();
	}
	public static function update($sql, $params) {
		$stmt = self::getConnection()->prepare($sql);
		foreach ($params as $key => $value) {
			$stmt->bindParam($key + 1, (!empty($value) ? $value : ""));
		}
		$stmt->execute();
	}
	public static function selectRow($sql, $params) {
		$result = self::select($sql, $params);
		if (isset($result[0]))
			return $result[0];
		else 
			return false;
	}
}

?>