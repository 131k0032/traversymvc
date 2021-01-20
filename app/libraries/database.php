<?php
// PDO databla class
// Conecta a la bd
// Crea sentencias preparadas
// Bind values
// Regresa filas y columnas

class Database {

	private $host=DB_HOST;
	private $user=DB_USER;
	private $pass=DB_PASS;
	private $dbname=DB_NAME;

	private $dbh;
	private $stmt;
	private $error;

	/*----------  Construct method  ----------*/
	public function __construct(){
		// Set DNS
		$dsn='mysql:host='.$this->host.';dbname='.$this->dbname;
		$options = array(

			PDO::ATTR_PERSISTENT => true, 
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
		);

		// PDO instance
		try {

			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			
				} catch (PDOException $e) {
					$this->error=$e->getMessage();
					echo $this->error;
			
		}
	}

	# -----------  STATEMENTS WITH QUERY  -----------
	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}

	/*----------  BIND VALUES  ----------*/
	public function bind($param, $value, $type=null){
		if (is_null($type)) {
			switch (true) {
					case is_init($value):
						$type =PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type =PDO::PARAM_BOOL;
						break;
					case is_init($value):
						$type =PDO::PARAM_INT;
						break;
					case is_null($value):
						$type =PDO::PARAM_NULL;
						break;
					default:
						$type=PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	/*----------  EXECUTE THE PREPARED STATEMENT  ----------*/
	public function execute(){
		return $this->stmt->execute();
	}

	/*----------  SETTINGS AS ARRAY OF OBJECTS  ----------*/
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/*----------  SETTING  A SINGLE RESULT AS OBJECT  ----------*/
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	/*----------  GET ROW COUNT  ----------*/
	public function rowCount(){
		return $this->stmt->rowCount();
	}

}