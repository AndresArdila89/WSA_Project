<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENTS
#Andres Ardila      2021-04-10      db_connection.php file created
#Andres Ardila      2021-04-10      create DBConnect class
#Andres Ardila      2021-04-10      added try and catch to find errors in the connection
#Andres Ardila      2021-04-10      set the user-1921557 for the connection (only stored procedures and views)

if($debug)
{
    echo "DBConnection class loaded";
}
class Dbh{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    
 
    #PDO = PHP Data Object 
    #DSN = Data Source Name information require to connect to the database
    #DBH = Database Handle
    #STH = Statement handle
    #The PDO constructor receives dsn, username, password and options[]
    
    public function connect(){
        $this->servername = "localhost";
        $this->username = "user-1931557";
        $this->password = "1931557";
        $this->dbname = "database_1931557";
        $this->charset = "utf8mb4";
        
        try
        { 
            $dsn = "mysql:host=" . $this->servername . 
                   ";dbname=" . $this->dbname . 
                   ";charset=" . $this->charset;

            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
        }
        catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}
?>