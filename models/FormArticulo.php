<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormArticulo extends model{

public $id_articulo;
public $titulo_articulo;
public $autor;
public $resumen;
public $url;
public $id_revista;
public $descriptor_1;
public $descriptor_2;
public $descriptor_3;
public $descriptor_4;



public function rules()
 {
  return [
   ['id_articulo', 'integer', 'message' => 'Id incorrecto'],
   [['id_revista'],'safe'],
   ['titulo_articulo', 'required', 'message' => 'Campo requerido'],
   ['titulo_articulo', 'match', 'pattern' => '/^[0-9a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
   ['titulo_articulo', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['autor', 'required', 'message' => 'Campo requerido'],
   ['autor', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['autor', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
   ['resumen', 'required', 'message' => 'Campo requerido'],
   ['resumen', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['resumen', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
   ['descriptor_1', 'required', 'message' => 'Campo requerido'],
   ['descriptor_1', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
   ['descriptor_1', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['descriptor_2', 'required', 'message' => 'Campo requerido'],
   ['descriptor_2', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
   ['descriptor_2', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['descriptor_3', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
   ['descriptor_3', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['descriptor_4', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Solo se aceptan letras'],
   ['descriptor_4', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
  		
  /* ['img', 'file',/*'skipOnEmpty' => false,
   		'uploadRequired' => 'No has seleccionado ningun archivo', //Error
  		'maxSize' => 1024*1024*1, //1 MB
   		'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
  		'minSize' => 10, //10 Bytes
  		'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
  		'extensions' => 'jpg, gif,png',
  		'wrongExtension' => 'El archivo {img} no contiene una extensión permitida {extensions}', //Error
  		'maxFiles' => 500,
  		'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
  		],*/
  ];
 }
 public function attributeLabels()
 {
 	return ['id_revista' => 'Id REVISTA',
 			'img' => 'Seleccionar imagenes en formato .jpg .gif o .png:',
 	];
 }
 
}