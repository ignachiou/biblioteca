<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

//modelo para conectar la base de datos con el modelo

class Revista extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db;
    }
    
  
    public static function tableName()
    {
        return 'revista';
    }
    
}