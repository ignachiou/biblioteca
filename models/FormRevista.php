<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormRevista extends model{
	
	public $id_revista;
	public $titulo;
	public $editorial;
	public $publicacion;
	public $serie;
	public $fecha_de_publicacion;
	public $issn;
	public $distribucion;
	public $volumen;
	public $periodicidad;
	public $url;
	public $img;
	public $descriptor_1;
	public $descriptor_2;
	public $descriptor_3;
	public $descriptor_4;

	
	public function rules(){
		
		return [
				['id_revista', 'integer', 'message' => 'Id incorrecto'],
				['titulo', 'required', 'message' => 'Campo requerido'],
				['titulo', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['titulo', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
				['editorial', 'required', 'message' => 'Campo requerido'],
				['editorial', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['editorial', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
				['publicacion', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['publicacion', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
				['serie', 'required', 'message' => 'Campo requerido'],
				['serie', 'match', 'pattern' => '/^[0-9a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['serie', 'match', 'pattern' => '/^.{1,20}$/', 'message' => 'Mínimo 1 máximo 20 caracteres'],
				['fecha_de_publicacion', 'required', 'message' => 'Campo requerido'],
				['fecha_de_publicacion', 'match', 'pattern' => '/^[0-9\s]+$/i', 'message' => 'solo se aceptan numeros'],
				['fecha_de_publicacion', 'match', 'pattern' => '/^.{1,5}$/', 'message' => 'Mínimo 1 máximo 5 caracteres'],
				['issn','match','pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['issn','match','pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 caracteres  máximo 50 caracteres'],
				['volumen', 'required', 'message' => 'Campo requerido'],
				['volumen', 'match', 'pattern' => '/^[0-9a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['volumen', 'match', 'pattern' => '/^.{1,20}$/', 'message' => 'Mínimo 1 máximo 20 caracteres'],
				['periodicidad', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['periodicidad', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],	
				['volumen', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
				['distribucion', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
				['distribucion', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
				['descriptor_1', 'required', 'message' => 'Campo requerido'],
				['descriptor_1', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['descriptor_1', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 caracteres y máximo 50 caracteres'],
				['descriptor_2', 'required', 'message' => 'Campo requerido'],
				['descriptor_2', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['descriptor_2', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 caracteres  máximo 50 caracteres'],
				['descriptor_3', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['descriptor_3', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 caracteres  máximo 50 caracteres'],
				['descriptor_4', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
				['descriptor_4', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 caracteres  máximo 50 caracteres'],
		
				//['img', 'file',/*'skipOnEmpty' => false,*/
						/*'uploadRequired' => 'No has seleccionado ningun archivo', //Error
						'maxSize' => 1024*1024*1, //1 MB
						'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
						'minSize' => 10, //10 Bytes
						'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
						'extensions' => 'jpg, gif,png',
						'wrongExtension' => 'El archivo {img} no contiene una extensión permitida {extensions}', //Error
						'maxFiles' => 1,
						'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
				],*/
		];
		
	}
	
	/*public function attributeLabels()
	{
		return [
				'img_tesis' => 'Seleccionar imagenes en formato .jpg .gif o .png:',
		];
	}*/
}