<?php
namespace app\models;
use Yii;
use yii\base\model;

class Buscar extends model{
	public $q;
	
	public function rules()
	{		
		return[
				["q", "match", "pattern" =>  '/^[0-9a-z������\s]+$/i', 'message' => 'S�lo se aceptan letras y numeros'],
								
		];		
	}
	
	public function attributeLabels()
	{
		return [
			'q' => "Buscar:",	
				
		];		
	}
}