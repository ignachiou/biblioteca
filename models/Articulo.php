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
    
   // public static function getLastId(){
    	
    	//$id =null;
    
    	
    	//$count=Yii::$app->db->createCommand("SELECT MAX(id_revista) AS id FROM revista")->query()->one();
    	//$query= mysql_query("SELECT MAX(id_revista) AS id FROM revista");
    	
    	
    	//if ($row = mysql_fetch_row($query))
    			
    	//	$id = trim($row[0]);
    			
    	//$id = $count;//->read();
   		   	
   			//return $id;
 		
    	
    	//$dns = 'mysql:host=localhost;dbname=biblio';
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
    	
   // }
    
    public static function tableName()
    {
        return 'articulo';
    }
    
}