<?PHP
//Console setup insteod of echo
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
// Database cred and setup
abstract class DB {
    private static $username = "root";
    private static $password = "";
    private static $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
    public static $affected_rows;
//Database connetion for 003_a
    public static function connect(){
        try{
            $pdo = new PDO(self::$dsn, self::$username, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
        } catch(PDOException $e) {
            error_log(date('[Y-m-d H:i:s]') . "Database connection error" . $e->getMessage(), 3, "errors.log");
                throw new Exception("Database connection failed.");
        }
        return $pdo;
    }
    //Database read by selecting for 003_b
    public static function select($sql, $binding_values = []){
        try{
            $pdo = self::connect();
            $query = $pdo->prepare($sql);
            $query->execute($binding_values);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $querry = null; $pdo = null; return $data;
        }
         catch(PDOException $e) {
            error_log(date('[Y-m-d H:i:s]') . "Database connection error" . $e->getMessage(), 3, "errors.log");
                throw new Exception("Database connection failed.");
        }
    }
    public static function query($sql, $binding_values = []){
        try{
            $pdo = self::connect();
            $query = $pdo->prepare($sql);
            $query->execute($binding_values);
            self::$affected_rows = $query->rowCount();
            $querry = null; $pdo = null; return $data;
         }
    catch(PDOException $e) {
            error_log(date('[Y-m-d H:i:s]') . "Database connection error" . $e->getMessage(), 3, "errors.log");
                throw new Exception("Database connection failed.");
        }
    }
}

//Use of public function query for 002

/*$sql = "INSERT INTO flight (departing_gate, arriving_gate) VALUES (?, ?), (?, ?), (?, ?), (?, ?), (?, ?) ";
	DB::query($sql, ['B', 'A', 'D' , 'C', 'F', 'E', 'H', 'G', 'J', 'I']);
	 
	if (DB::$affected_rows > 0) {
	    echo "Flight successfully added.";
	} else {
	    echo "Insert failed.";
	}*/
    
//Use of public function select for 003_b
/*$sql = "SELECT * FROM flight";
	$data = DB::select($sql);

	foreach ($data as $flights) {
        echo " |Flight: " . htmlspecialchars($flights['Id']) . "->";
	    echo " Departing_gate: " . htmlspecialchars($flights['Departing_gate']) . "";
        echo " Arriving_gate: " . htmlspecialchars($flights['Arriving_gate']) . "";
	}*/
if ($conn = true){
    debug_to_console("Yes done Connection is ok");
} else {
    debug_to_console("Oh no");
}
?>