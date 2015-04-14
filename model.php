<?php 
	class Model {

    protected static $dbc;
    protected static $table = 'national_parks';

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        if (!self::$dbc)
        {
    		define("DB_HOST", '127.0.0.1');
			define("DB_NAME", 'national_parks_db');
			define("DB_USER", 'np_user');
			define("DB_PASS", 'password');

            self::$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo self::$dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        if (isset($this->attributes[$name])){
        	return $this->attributes[$name];
        }
        else{
        	return null;
        }
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        // @TODO: Ensure there are attributes before attempting to save

        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert

        // @TODO: Ensure that update is properly handled with the id key

        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        // @TODO: Use prepared statements to ensure data security
        if (!empty($this->attributes)){
        	self::dbConnect();
        	$stmt = self::$dbc->prepare("SELECT * FROM " . self::$table . " WHERE id = :id");
        	
        	$stmt->bindValue(":id",    $this->attributes["id"], PDO::PARAM_STR);

        	$stmt->execute();

        	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        	if ($results){
        		foreach ($this->attributes as $key => $value) {
	        		$stmt = self::$dbc->prepare("UPDATE " . self::$table . " SET $key = :$key WHERE id = :id");

					$stmt->bindValue(":id",      $this->attributes["id"], PDO::PARAM_INT);
					$stmt->bindValue(":$key",    $value,                  PDO::PARAM_STR);

					$stmt->execute();
				}
        	}
        	else{
        		$cols = implode(", ", array_keys($this->attributes));
	        	$vals = ":" . implode(", :", array_keys($this->attributes));
        		$query = "INSERT INTO " . self::$table . " ($cols) VALUES ($vals)";
        		$stmt = self::$dbc->prepare($query);

        		foreach($this->attributes as $key => $val){
	        		$stmt->bindValue(":$key", $val, PDO::PARAM_STR);
	        	}

        		$stmt->execute();
        	}
        }
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the resultset in a variable named $result

        // The following code will set the attributes on the calling object based on the result variable's contents
        $stmt = self::$dbc->prepare("SELECT * FROM " . self::$table . " WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the previous method, return all the matching records
        $stmt = self::$dbc->prepare("SELECT * FROM " . self::$table);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

 ?>