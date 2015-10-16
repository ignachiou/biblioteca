<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

//modelo para conectar la base de datos con el modelo

class Articulo extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function getLastId(){
    	
    	$id = null;
    	
    	$servername = "localhost";
    	$username = "root";
    	$password = "";
    	$dbname = "biblio";
    	
    	// se crea la conexion con la BD
    	$conn = Yii::$app->db;//new mysqli($servername, $username, $password, $dbname);
    	// chequeamos que exista conexion
    	/*if ($conn->c) {
    		die("Connection failed: " . $conn->connect_error);
    	}*/
    	$query = "SELECT max(id_revista) FROM revista";
    	
    	
    	 $model1 = $table->findBySql($query)->one();
    	//$conn->createCommand($sql, $id)->queryAll();
    	
    	//$sql = "SELECT max(id_revista) FROM revista";
    	//$result = $conn;
    	//$row = $result;
    	
    	// $row = $result;
    	//$id = var_dump($row);
    	
    	//$id = $id[$row];
    		 
    		//echo "<br> id: ". $id[$row] .  "<br>";
    		 
    	
    	
    	/*if ($result->num_rows > 0) {
    		// output data of each row
    		// $row = $result;
    		while($row = $result->fetch_assoc()) {
    	
    	
    			echo "<br> id: ". $id = $row["max(id_revista)"].  "<br>";
    			
    			return $id;
    		}
    	} else {
    		echo "0 results";
    	}*/
    	
    	
    	return $model1;
    	mysqli_close($conn);
    	
    	//$id =null;
    
    	
    	//$count=Yii::$app->db->createCommand("SELECT MAX(id_revista) AS id FROM revista")->query()->one();
    	//$query= mysql_query("SELECT MAX(id_revista) AS id FROM revista");
    	
    	
    	//if ($row = mysql_fetch_row($query))
    			
    	//	$id = trim($row[0]);
    			
    	//$id = $count;//->read();
   		   	
   			//return $id;
 		
    	
    	//$dns = 'mysql:host=localhost;
    	//dbname=biblio';
        //$username = 'root';
        //$paswoord = '';
    	
    	//$connection=new CDbConnection($dsn,$username,$password);
    	//$connection->active=true;
    	
    	//$myModel = new Articu;
    	//if($myModel->save())
    		//$lastId = $myModel->primaryKey;
    	
    	//$connection = Yii::$app->db;
    	//$last = $connection->lastInsertID;
    	//Yii::$app->db->getLastInsertID('revista');
    	//return $lastId;
    	
    }
    
    public static function tableName()
    {
        return 'articulo';
    }
    
}