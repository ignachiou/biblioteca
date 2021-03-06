<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarObjetoBibliografico;
use yii\widgets\ActiveForm;
use yii\web\response;
use app\models\FormObj;
use app\models\Objeto;
use app\models\Buscar;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\helpers\Url;
use app\models\FormRegister;
use app\models\Usuarios;
use app\models\User;
use yii\db\TableSchema;
use yii\web\UploadedFile;
use app\models\FormUpload;
use app\models\app\models;
use app\models\FormAct;
use app\models\FormTesis;
use app\models\Tesis;
use app\models\FormRevista;
use app\models\Revista;
use app\models\FormArticulo;
use app\models\Articulo;



class SiteController extends Controller
{
	//lo siguiente corresponde al control de 
	//usuarios donde 1 es el mas simple y 3 
	//el mayor rango
	
	public function actionMostrar()
	{	
		$msg = null;
		$dirname = "C:/xampp/htdocs/basic/imagenes/monografias/11/";
		$images = glob($dirname."*.jpg");
		foreach($images as $image) {
			echo '<img src="'.$image.'" /><br />';
		}
		
		
		/*$posts[1] = 'prueba numero 1';
		$msg = null;
		
		if(dirname("C:/xampp/htdocs/basic/imagenes/56/1.jpg"))
		{
		
			foreach ($posts as $post)
			{
				$url = 'C:/xampp/htdocs/basic/imagenes/56/1.jpg';
				if (preg_match('#<img src="([\w./-_]+)"#i', $post, $matches))
					{
						$url = $matches[1];
					}	
			
			}

			
		}
		else 
		{
			$msg = "la carpeta a la que quiere acceder no existe";
		}*/
	
		return $this->render("mostrar",["msg" => $msg]);
	}
	
	public function actionUpload()
	{
	
		$model = new FormUpload;
		$msg = null;
	
		if ($model->load(Yii::$app->request->post()))
		{
			$model->file = UploadedFile::getInstances($model, 'file');
	
			if ($model->file && $model->validate()) {
				foreach ($model->file as $file) {
					$file->saveAs('C:/xampp/htdocs/basic/imagenes/' . $file->baseName . '.' . $file->extension);
					$msg = "<p><strong class='label label-info'>subida realizada con �xito</strong></p>";
				}
			}
		}
		return $this->render("upload", ["model" => $model, "msg" => $msg]);
	}
	
public function actionSimple()
{
		/*$table = new Objeto;
		
		$model = $table->find()->all();
		*/
		
		$form = new Buscar;
		$search = null;//guardamos la busqueda realizada en esta variable
		if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
		{
			if ($form->validate())//validamos el campo
			{
				$search = Html::encode($form->q); //evita ataques xss 
				/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
				$query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
				$model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
				*/
				$query = Objeto::find()
				->where(["like","id_objeto",$search])
				->orwhere(["like","nombre",$search])
				->orwhere(["like","autor",$search])
				->orwhere(["like","editorial",$search])
				->orwhere(["like","fecha",$search])
				->orwhere(["like","tema",$search])
				->orwhere(["like","resumen",$search])
				->orwhere(["like","lengua",$search])
				->orwhere(["like","colaborador",$search])
				->orwhere(["like","desc1",$search])
				->orwhere(["like","desc2",$search])
				->orwhere(["like","desc3",$search])
				->orwhere(["like","desc4",$search]);
				$countQuery = clone $query;
				$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
				$model = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
				
			}
			
			else {
				$form->getErrors();
				
			}
			
		}
		else 
		{
			$query = Objeto::find();
			$countQuery = clone $query;
			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
			$model = $query->offset($pages->offset)
			->limit($pages->limit)
			->all();
			
		}
		
		return $this->render("simple",['model' => $model, "form" => $form, "search" => $search, "pages" => $pages]);
	}

public function actionCatalog()
{

	return $this->render("crear");
}

public function actionAdmin()
{
	
	
	/*$table = new Objeto;
	
	$model = $table->find()->all();
	*/
	$this->layout = 'adminlayout';
	
	$form = new Buscar;
	$search = null;//guardamos la busqueda realizada en esta variable
	if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
	{
		if ($form->validate())//validamos el campo
		{
			$search = Html::encode($form->q); //evita ataques xss
			/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
			 $query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
			 $model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
			*/
			$query = Usuarios::find()
			->where(["like","id",$search])
			->orwhere(["like","usuario",$search])
			->orwhere(["like","email",$search])
			->orwhere(["like","role",$search]);
			$countQuery = clone $query;
			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
			$model = $query->offset($pages->offset)
			->limit($pages->limit)
			->all();
	
		}
			
		else {
			$form->getErrors();
	
		}
			
	}
	else
	{
		$query = Usuarios::find();
		$countQuery = clone $query;
		$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
		$model = $query->offset($pages->offset)
		->limit($pages->limit)
		->all();
			
	}
	
	return $this->render("admin",['model' => $model, "form" => $form, "search" => $search, "pages" => $pages]);
	
	
	//return $this->render("admin");
}

public function actionActualizarusuario()
{
	$model = new FormAct;
	$msg = null;

	if($model->load(Yii::$app->request->post()))
	{
		if($model->validate())
		{
			$table = Usuarios::findOne($model->id);
			if($table)
			{
				$table->usuario = $model->usuario;
				$table->email = $model->email;
				$table->rol = $model->rol;
				
				if ($table->update())
				{
					$msg = "El Usuario ha sido actualizado correctamente";
				}
				else
				{
					$msg = "El Usuario no ha podido ser actualizado";
				}
			}
			else
			{
				$msg = "El Usuario seleccionado no ha sido encontrado";
			}
		}
		else
		{
			$model->getErrors();
		}
	}


	if (Yii::$app->request->get("id"))
	{
		$id = Html::encode($_GET["id"]);
		if ((int) $id)
		{
			$table = Usuarios::findOne($id);
			if($table)
			{
				$model->id = $table->id;
				$model->usuario = $table->usuario;
				$model->email = $table->email;
				$model->rol = $table->rol;
				
			}
			else
			{
				return $this->redirect(["site/admin"]);
			}
		}
		else
		{
			return $this->redirect(["site/admin"]);
		}
	}
	else
	{
		return $this->redirect(["site/admin"]);
	}
	 return $this->render("actualizarusuario", ["model" => $model, "msg" => $msg]);
}

public function actionEliminarusuario()
{
	if(Yii::$app->request->post())
	{
		$id = Html::encode($_POST["id"]);
		if((int) $id)
		{
			if(Usuarios::deleteAll("id=:id", [":id" => $id]))
			{
				echo"Usuario con la ID $id, ha sido eliminado. Redireccionando";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/admin")."'> ";

				//eliminamos todos los archivos y el directorio que los contiene
				//primero se deben eliminar los archivos de la carpeta antes de poder eliminar la carpeta como tal
					
			}
			else
			{
				echo "H ocurrido un ERROR al tratar de eliminar el Usuario, redireccionamos ";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/admin")."'> ";
					
			}

		}
		else
		{
			echo "H ocurrido un ERROR al tratar de eliminar el Usuario, redireccionamos ";
			echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/admin")."'> ";

		}
	}
	else
	{
			
		return$this->redirect(["site/admin"]);
		
	}

}
	
	
 private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }
  
 public function actionConfirm() //el usuario confirma su registro desde correo
 {
    $table = new Usuarios;
    if (Yii::$app->request->get())
    {
   
        //Obtenemos el valor de los par�metros get
        $id = Html::encode($_GET["id"]);
        $authKey = $_GET["authKey"];
    
        if ((int) $id)
        {
            //Realizamos la consulta para obtener el registro
            $model = $table
            ->find()
            ->where("id=:id", [":id" => $id])
            ->andWhere("authKey=:authKey", [":authKey" => $authKey]);
 
            //Si el registro existe
            if ($model->count() == 1)
            {
                $activar = Usuarios::findOne($id);
                $activar->activate = 1;
                if ($activar->update())
                {
                    echo "Ha sido registrado de manera exitosa";
                    echo "<meta http-equiv='refresh' content='5; ".Url::toRoute("site/login")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al realizar el registro";
                    echo "<meta http-equiv='refresh' content='5; ".Url::toRoute("site/login")."'>";
                }
             }
            else //Si no existe redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        }
        else //Si id no es un n�mero entero redireccionamos a login
        {
            return $this->redirect(["site/login"]);
        }
    }
 }
 
 public function actionRegister()
 {
  //Creamos la instancia con el model de validaci�n
  $model = new FormRegister;
   
  //Mostrar� un mensaje en la vista cuando el usuario se haya registrado
  $msg = null;
   
  //Validaci�n mediante ajax
  if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
   
  //Validaci�n cuando el formulario es enviado v�a post
  //Esto sucede cuando la validaci�n ajax se ha llevado a cabo correctamente
  //Tambi�n previene por si el usuario tiene desactivado javascript y la
  //validaci�n mediante ajax no puede ser llevada a cabo
  if ($model->load(Yii::$app->request->post()))
  {
   if($model->validate())
   {
    //Preparamos la consulta para guardar el usuario
    $table = new Usuarios;
    $table->usuario = $model->usuario;
    $table->email = $model->email;
    //Encriptamos el password
    $table->clave = crypt($model->clave, Yii::$app->params["salt"]);
    //Creamos una cookie para autenticar al usuario cuando decida recordar la sesi�n, esta misma
    //clave ser� utilizada para activar el usuario
    $table->authKey = $this->randKey("abcdef0123456789", 200);
    //Creamos un token de acceso �nico para el usuario
    $table->accessToken = $this->randKey("abcdef0123456789", 200);
     
    //Si el registro es guardado correctamente
    if ($table->insert())
    {
     //Nueva consulta para obtener el id del usuario
     //Para confirmar al usuario se requiere su id y su authKey
     $user = $table->find()->where(["email" => $model->email])->one();
     $id = urlencode($user->id);
     $authKey = urlencode($user->authKey);
      
     $subject = "Confirmar registro";
     $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
     $body .= "<a href='http://biblio.local/index.php?r=site/confirm&id=".$id."&authKey=".$authKey."'>Confirmar</a>";
      
     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($user->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();
     
     $model->usuario = null;
     $model->email = null;
     $model->clave = null;
     $model->repita_clave = null;
     
     $msg = "Dirigete a tu correo y confirma tu suscripcion";
    }
    else
    {
     $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }
     
   }
   else
   {
    $model->getErrors();
   }
  }
  return $this->render("register", ["model" => $model, "msg" => $msg]);
 }
 
 public function actionActualizarrevista()
 {
 	$model = new FormRevista;
 	$msg = null;
 
 	if($model->load(Yii::$app->request->post()))
 	{
 		if($model->validate())
 		{
 			$table = Revista::findOne($model->id_revista);
 			if($table)
 			{
 				$table->titulo_revista = $model->titulo;
 				$table->editorial_revista = $model->editorial;
 				$table->publicacion_revista = $model->publicacion;
 				$table->serie_revista = $model->serie;
 				$table->fecha_revista = $model->fecha_de_publicacion;
 				$table->issn_revista = $model->issn;
 				$table->distribucion_revista = $model->distribucion;
 				$table->volumen_revista = $model->volumen;
 				$table->periodicidad_revista = $model->periodicidad;
 				$table->desc1_revista = $model->descriptor_1;
 				$table->desc2_revista = $model->descriptor_2;
 				$table->desc3_revista = $model->descriptor_3;
 				$table->desc4_revista = $model->descriptor_4;
 				if ($table->update())
 				{
 					$msg = "La Revista ha sido actualizado correctamente";
 				}
 				else
 				{
 					$msg = "La Revista no ha podido ser actualizado";
 				}
 			}
 			else
 			{
 				$msg = "La Revista seleccionado no ha sido encontrado";
 			}
 		}
 		else
 		{
 			$model->getErrors();
 		}
 	}
 
 
 	if (Yii::$app->request->get("id_revista"))
 	{
 		$id_revista = Html::encode($_GET["id_revista"]);
 		if ((int) $id_revista)
 		{
 			$table = Revista::findOne($id_revista);
 			if($table)
 			{
 				$model->id_revista = $table->id_revista;
 				$model->titulo= $table->titulo_revista;
 				$model->editorial = $table->editorial_revista;
 				$model->publicacion = $table->publicacion_revista;
 				$model->serie = $table->serie_revista;
 				$model->fecha_de_publicacion = $table->fecha_revista;
 				$model->issn = $table->issn_revista;
 				$model->distribucion = $table->distribucion_revista;
 				$model->volumen= $table->volumen_revista;
 				$model->periodicidad = $table->periodicidad_revista;
 				$model->descriptor_1 = $table->desc1_revista;
 				$model->descriptor_2 = $table->desc2_revista;
 				$model->descriptor_3 = $table->desc3_revista;
 				$model->descriptor_4 = $table->desc4_revista;
 
 
 			}
 			else
 			{
 				return $this->redirect(["site/registrosrevista"]);
 			}
 		}
 		else
 		{
 			return $this->redirect(["site/registrosrevista"]);
 		}
 	}
 	else
 	{
 		return $this->redirect(["site/registrosrevista"]);
 	}
 	return $this->render("actualizarrevista", ["model" => $model, "msg" => $msg]);
 }
	
 public function action()
 {
 	$model = new FormTesis;
 	$msg = null;
 
 	if($model->load(Yii::$app->request->post()))
 	{
 		if($model->validate())
 		{
 			$table = Tesis::findOne($model->id_tesis);
 			if($table)
 			{
 				$table->titulo_tesis = $model->titulo;
 				$table->redactor_tesis = $model->redactor;
 				$table->tutor_tesis = $model->tutor;
 				$table->cotutor_tesis = $model->cotutor;
 				$table->fecha_tesis = $model->fecha_de_publicacion;
 				$table->resumen_tesis = $model->resumen;
 				$table->desc1_tesis = $model->descriptor1_tesis;
 				$table->desc2_tesis = $model->descriptor2_tesis;
 				$table->desc3_tesis = $model->descriptor3_tesis;
 				$table->desc4_tesis = $model->descriptor4_tesis;
 				if ($table->update())
 				{
 					$msg = "La Tesis ha sido actualizado correctamente";
 				}
 				else
 				{
 					$msg = "La Tesis no ha podido ser actualizado";
 				}
 			}
 			else
 			{
 				$msg = "La Tesis seleccionado no ha sido encontrado";
 			}
 		}
 		else
 		{
 			$model->getErrors();
 		}
 	}
 
 
 	if (Yii::$app->request->get("id_tesis"))
 	{
 		$id_tesis = Html::encode($_GET["id_tesis"]);
 		if ((int) $id_tesis)
 		{
 			$table = Tesis::findOne($id_tesis);
 			if($table)
 			{
 				$model->id_tesis = $table->id_tesis;
 				$model->titulo= $table->titulo_tesis;
 				$model->redactor = $table->redactor_tesis;
 				$model->tutor = $table->tutor_tesis;
 				$model->cotutor = $table->cotutor_tesis;
 				$model->fecha_de_publicacion = $table->fecha_tesis;
 				$model->resumen = $table->resumen_tesis;
 				$model->descriptor1_tesis = $table->desc1_tesis;
 				$model->descriptor2_tesis = $table->desc2_tesis;
 				$model->descriptor3_tesis = $table->desc3_tesis;
 				$model->descriptor4_tesis = $table->desc4_tesis;
 
 
 			}
 			else
 			{
 				return $this->redirect(["site/registrostesis"]);
 			}
 		}
 		else
 		{
 			return $this->redirect(["site/registrostesis"]);
 		}
 	}
 	else
 	{
 		return $this->redirect(["site/registrostesis"]);
 	}
 	return $this->render("", ["model" => $model, "msg" => $msg]);
 }
 
	public function actionActualizar()
	{
		$model = new FormObj;
        $msg = null;
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Objeto::findOne($model->id_objeto);
                if($table)
                {
                    $table->nombre = $model->nombre_objeto_bibliografico;
                    $table->autor = $model->autor;
                    $table->editorial = $model->editorial;  
                    $table->fecha = $model->fecha;  
                    $table->colaborador = $model->colaborador;
                    $table->lengua = $model->lengua;
                    $table->tema = $model->tema;
                    $table->resumen = $model->resumen;
                    $table->isbn = $model->isbn;
                    $table->desc1 = $model->descriptor_a;
                    $table->desc2 = $model->descriptor_b;
                    $table->desc3 = $model->descriptor_c;
                    $table->desc4 = $model->descriptor_d;
                    if ($table->update())
                    {
                        $msg = "El Objeto Bibliografico ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El Objeto Bibliografico no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El Objeto Bibliografico seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id_objeto"))
        {
            $id_objeto = Html::encode($_GET["id_objeto"]);
            if ((int) $id_objeto)
            {
                $table = Objeto::findOne($id_objeto);
                if($table)
                {
                    $model->id_objeto = $table->id_objeto;
                    $model->nombre_objeto_bibliografico = $table->nombre;
                    $model->autor = $table->autor;
                    $model->editorial = $table->editorial;   
                    $model->fecha = $table->fecha;    
                    $model->tema = $table->tema;
                    $model->colaborador = $table->colaborador;
                    $model->lengua = $table->lengua;
                    $model->resumen = $table->resumen;  
                    $model->isbn = $table->isbn;              
                    $model->descriptor_a = $table->desc1; 
                    $model->descriptor_b = $table->desc2;
                    $model->descriptor_c = $table->desc3; 
                    $model->descriptor_d = $table->desc4;
                    
                    
                }
                else
                {
                    return $this->redirect(["site/registros"]);
                }
            }
            else
            {
                return $this->redirect(["site/registros"]);
            }
        }
        else
        {
                return $this->redirect(["site/registros"]);
        }
        return $this->render("actualizar", ["model" => $model, "msg" => $msg]);
	}
	
	public function actionEliminarrevista()
	{
		if(Yii::$app->request->post())
		{
			$id_revista = Html::encode($_POST["id_revista"]);
			if((int) $id_revista)
			{
				if(Revista::deleteAll("id_revista=:id_revista", [":id_revista" => $id_revista]))
				{
					echo"Revista con la ID $id_revista, ha sido eliminado. Redireccionando";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrosrevista")."'> ";
	
					//eliminamos todos los archivos y el directorio que los contiene
					//primero se deben eliminar los archivos de la carpeta antes de poder eliminar la carpeta como tal
	
	
	/*
					{
						foreach (glob("C:/xampp/htdocs/basic/imagenes/revista/".$id_revista."/*.*") as $archivos_carpeta)
						{
							unlink($archivos_carpeta); //eliminamos todos los archivos dentro de la carpeta
						}
						rmdir("C:/xampp/htdocs/basic/imagenes/revista/".$id_revista); //eliminamos la carpeta.
							
					}*/
				}
				else
				{
					echo "H ocurrido un ERROR al tratar de eliminar la tesis, redireccionamos ";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrosrevista")."'> ";
	
				}
	
			}
			else
			{
				echo "H ocurrido un ERROR al tratar de eliminar la tesis, redireccionamos ";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrosrevista")."'> ";
	
			}
		}
		else
		{
	
			return$this->redirect(["site/registrosrevista"]);
		}
	
	}
	
	public function actionEliminartesis()
	{
		if(Yii::$app->request->post())
		{
			$id_tesis = Html::encode($_POST["id_tesis"]);
			if((int) $id_tesis)
			{
				if(Tesis::deleteAll("id_tesis=:id_tesis", [":id_tesis" => $id_tesis]))
				{
					echo"Tesis con la ID $id_tesis, ha sido eliminado. Redireccionando";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrostesis")."'> ";
	
					//eliminamos todos los archivos y el directorio que los contiene
					//primero se deben eliminar los archivos de la carpeta antes de poder eliminar la carpeta como tal
						
						
						
					{
						foreach (glob("C:/xampp/htdocs/basic/imagenes/tesis/".$id_tesis."/*.*") as $archivos_carpeta)
						{
							unlink($archivos_carpeta); //eliminamos todos los archivos dentro de la carpeta
						}
						rmdir("C:/xampp/htdocs/basic/imagenes/tesis/".$id_tesis); //eliminamos la carpeta.
							
					}
				}
				else
				{
					echo "H ocurrido un ERROR al tratar de eliminar la tesis, redireccionamos ";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrostesis")."'> ";
						
				}
	
			}
			else
			{
				echo "H ocurrido un ERROR al tratar de eliminar la tesis, redireccionamos ";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registrostesis")."'> ";
	
			}
		}
		else
		{
				
			return$this->redirect(["site/registrostesis"]);
		}
	
	}
	
	public function actionEliminar()
	{
		if(Yii::$app->request->post())
		{
			$id_objeto = Html::encode($_POST["id_objeto"]);
			if((int) $id_objeto)
			{
				if(Objeto::deleteAll("id_objeto=:id_objeto", [":id_objeto" => $id_objeto]))
				{
					echo"Objeto Bibliografico con la ID $id_objeto, ha sido eliminado. Redireccionando";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registros")."'> ";
										
				//eliminamos todos los archivos y el directorio que los contiene
				//primero se deben eliminar los archivos de la carpeta antes de poder eliminar la carpeta como tal
					
					
					
					{
						foreach (glob("C:/xampp/htdocs/basic/imagenes/".$id_objeto."/*.*") as $archivos_carpeta)
						{
							unlink($archivos_carpeta); //eliminamos todos los archivos dentro de la carpeta							
						}
						rmdir("C:/xampp/htdocs/basic/imagenes/".$id_objeto); //eliminamos la carpeta.
					
					}
				}
				else 
				{
					echo "H ocurrido un ERROR al tratar de eliminar el Objeto Bibliografico, redireccionamos ";
					echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registros")."'> ";
					
				}
				
			}
			else
			 {
				echo "H ocurrido un ERROR al tratar de eliminar el Objeto Bibliografico, redireccionamos ";
				echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/registros")."'> ";	
				
			}
		}
		else
		 {
			
			return$this->redirect(["site/registros"]);	
		}
		
	}
	
	public function actionRegistrosrevista(){
		
		$this->layout = 'adminlayout';
		$form = new Buscar;
		$search = null;//guardamos la busqueda realizada en esta variable
	
		if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
		{
			if ($form->validate())//validamos el campo
			{
				$search = Html::encode($form->q); //evita ataques xss
				/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
				 $query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
				 $model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
				*/
				$query = Revista::find()
				->where(["like","id_revista",$search])
				->orWhere(["like","titulo_revista",$search])
				->orwhere(["like","editorial_revista",$search])
				->orwhere(["like","issn_revista",$search])
				->orwhere(["like","desc1_revista",$search])
				->orwhere(["like","desc2_revista",$search])
				->orwhere(["like","desc3_revista",$search])
				->orwhere(["like","desc4_revista",$search]);
				$countQuery = clone $query;
				$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
				$model = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
	
			}
	
	
	
			else {
				$form->getErrors();
	
			}
	
	
	
		}
		else
		{
			$query = Revista::find();
			$countQuery = clone $query;
			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
			$model = $query->offset($pages->offset)
			->limit($pages->limit)
			->all();
	
		}
	
	
		return $this->render("registrosrevista",['model' => $model, "form" => $form, "search" => $search, "pages" => $pages]);
	
	}
	
	
	public function actionRegistrostesis(){
		$this->layout = 'adminlayout';
		
		$form = new Buscar;
		$search = null;//guardamos la busqueda realizada en esta variable
		
		if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
		{
			if ($form->validate())//validamos el campo
			{
				$search = Html::encode($form->q); //evita ataques xss
				/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
				 $query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
				 $model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
				*/
				$query = Tesis::find()
				->where(["like","id_tesis",$search])
				->orWhere(["like","titulo_tesis",$search])
				->orwhere(["like","redactor_tesis",$search])
				->orwhere(["like","tutor_tesis",$search])
				->orwhere(["like","cotutor_tesis",$search])
				->orwhere(["like","fecha_tesis",$search])
				//->orwhere(["like","universidad_tesis",$search])
				->orwhere(["like","resumen_tesis",$search])
				->orwhere(["like","desc1_tesis",$search])
				->orwhere(["like","desc2_tesis",$search])
				->orwhere(["like","desc3_tesis",$search])
				->orwhere(["like","desc4_tesis",$search]);
				$countQuery = clone $query;
				$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
				$model = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
		
			}
		
		
		
			else {
				$form->getErrors();
		
			}
		
		
		
		}
		else
		{
			$query = Tesis::find();
			$countQuery = clone $query;
			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
			$model = $query->offset($pages->offset)
			->limit($pages->limit)
			->all();
		
		}
		
		
		return $this->render("registrostesis",['model' => $model, "form" => $form, "search" => $search, "pages" => $pages]);
		
	}
	
	public function actionRegistros() //se crea una tabla con todos los registros que existen en la base de datos, 
									  //ademas podemos realizar busquedas en ella
	{
		$this->layout = 'adminlayout';
		/*$table = new Objeto;
		
		$model = $table->find()->all();
		*/
		
		$form = new Buscar;
		$search = null;//guardamos la busqueda realizada en esta variable
		if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
		{
			if ($form->validate())//validamos el campo
			{
				$search = Html::encode($form->q); //evita ataques xss 
				/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
				$query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
				$model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
				*/
				$query = Objeto::find()
				->where(["like","id_objeto",$search])
				->orwhere(["like","nombre",$search])
				->orwhere(["like","autor",$search])
				->orwhere(["like","editorial",$search])
				->orwhere(["like","fecha",$search])
				->orwhere(["like","tema",$search])
				->orwhere(["like","resumen",$search])
				->orwhere(["like","lengua",$search])
				->orwhere(["like","colaborador",$search])
				->orWhere(["like","isbn",$search])
				->orwhere(["like","desc1",$search])
				->orwhere(["like","desc2",$search])
				->orwhere(["like","desc3",$search])
				->orwhere(["like","desc4",$search]);
				$countQuery = clone $query;
				$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
				$model = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
				
			}
			
			
			
			else {
				$form->getErrors();
				
			}
			
			
			
		}
		else 
		{
			$query = Objeto::find();
			$countQuery = clone $query;
			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
			$model = $query->offset($pages->offset)
			->limit($pages->limit)
			->all();
			
		}
		
		
		
		
		return $this->render("registros",['model' => $model, "form" => $form, "search" => $search, "pages" => $pages]);
	}
	
	public function actionCreararticulo() //creamos los objetos bibliograficos que seran insertados en la tabla de la Base de Datos
	{
		$this->layout = 'adminlayout';
		$model = new FormArticulo;
		$msg = null;
		$query = null;
/*************************************************************************************************************************************/
		/*$form = new Buscar;
		$search = null;//guardamos la busqueda realizada en esta variable, utilizamos esto para poder llenar el campo Id_revista
	*/
		if($model->load(Yii::$app->request->post())) //se utiliza el metodo post para una url limpia
		{
	
	
			if($model->validate() /*&& $model->img*/)
			{
				//$search = Html::encode($form->q); //evita ataques xss
				///$table1 =  new Revista;
				$table = new Articulo;
				
				/*$table2 = new Revista;
				
				if($table2->save(false))
				
					$lastId = $table2->primaryKey;*/
				
				//$model1 = Articulo::getLastId();
				
				//$model2 = Articulo::getDb(Articulo::getLastId());
				
				//$model1 = Articulo::getLastId();//Yii::$app->db->getLastInsertID('revista');
				
				//$lastId = Yii::$app->db->getLastInsertID('revista');
				
				 //$query = "SELECT * FROM articulo ORDER BY id_articulo DESC LIMIT 1";//realizamos una consulta SQL
				// $query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
				 //$model1 = $table->findBySql($query)->one(); //extrae todos los registros que coincidan con la consulta almacenando en models
				 //$model2 = $model1 + 1;
				
				
				//$id_revista = lastval();//$mysqli->insert_id;
				
				$table->titulo_articulo = $model->titulo_articulo;
				$table->resumen_articulo = $model->resumen;
				$table->autor_articulo = $model->autor;
				//$table->url_articulo = 'C:/xampp/htdocs/basic/imagenes/revista/';
				
				//$query = "SELECT * FROM biblio WHERE id_revista =(SELECT MAX (id_revista) FROM revista)";// LIKE '%$search%'";
				//$query = "SELECT id_revista FROM revista ORDER BY id_revista DESC LIMIT 1";
				//$mysqli->query($query);
				$table->id_revista =$model->id_revista;
				
				$table->desc1_articulo = $model->descriptor_1;
				$table->desc2_articulo = $model->descriptor_2;
				$table->desc3_articulo = $model->descriptor_3;
				$table->desc4_articulo = $model->descriptor_4;
	
				//$model->img;
				}
				if($table->insert() )
				{
	
					$id = $table->id_articulo;
					$msg = "Has subido los datos de la revista con ID unica ".$id." de manera correcta";
					$model-> titulo_articulo = null;
					$model -> id_revista = null;
					$model-> resumen = null;
					$model-> autor = null;
					$model-> descriptor_1 = null;
					$model-> descriptor_2 = null;
					$model-> descriptor_3 = null;
					$model-> descriptor_4 = null;
					//$model->img = UploadedFile::getInstances($model, 'img');
	
	
	
					/*if (!is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))  // creo directorios dentro de imagenes con la id
					 {													// del OB donde guardare las imagenes.
					 	
					 mkdir('C:/xampp/htdocs/basic/imagenes/tesis'.$id, 777);//le otorgo permiso de lectura y escritura
					 	
	
					 }
	
					 if($model->img && is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))
					 { //pendiente error al validar el modelo de las imagenes
					 	
					 foreach ($model->img as $img)
					 {
					 $img->saveAs('C:/xampp/htdocs/basic/imagenes/tesis'.$id."/". $img->baseName . '.' . $img->extension);
					 //$msg = "<p><strong class='label label-info'>subida de archivos lograda con exito</strong></p>";
					 }
					 	
					 }
	
					 else
					 {
					 $msg = "No se ha creado ninguna carpeta o no se ha podido realizar la subida de imagenes";
					 	
					 }*/
	
					return $this->redirect(["site/registrosrevista"]);
						
				}
				else
				{
					$model->getErrors();
	
				}
					
					
			}
	
		
			
		return $this->render("creararticulo",['model' => $model, 'msg' => $msg]);
	}
	
	public function actionCrearrevista() //creamos los objetos bibliograficos que seran insertados en la tabla de la Base de Datos
	{
		$this->layout = 'adminlayout';
		$model = new FormRevista;
		$msg = null;
	
		if($model->load(Yii::$app->request->post())) //se utiliza el metodo post para una url limpia
		{
	
	
			if($model->validate() /*&& $model->img*/)
			{
				$table = new Revista;
				$table->titulo_revista = $model->titulo;
				$table->editorial_revista = $model->editorial;
				$table->publicacion_revista = $model->publicacion;
				$table->serie_revista = $model->serie;
				$table-> fecha_revista= $model->fecha_de_publicacion;
				$table->issn_revista = $model->issn;
				$table->url_revista = 'C:/xampp/htdocs/basic/imagenes/revista/';
				$table->distribucion_revista = $model->distribucion;
				$table->volumen_revista = $model->volumen;
				$table->periodicidad_revista = $model->periodicidad;
				$table->desc1_revista = $model->descriptor_1;
				$table->desc2_revista = $model->descriptor_2;
				$table->desc3_revista = $model->descriptor_3;
				$table->desc4_revista = $model->descriptor_4;
				
				//$model->img;
	
				if($table->insert() )
				{
	
					$id = $table->id_revista;
					$msg = "Has subido los datos de la revista con ID unica ".$id ." de manera correcta";
					$model-> titulo = null;
					$model-> editorial = null;
					$model-> publicacion = null;
					$model-> serie = null;
					$model-> fecha_de_publicacion = null;
					$model-> issn = null;
					$model-> distribucion = null;
					$model-> volumen = null;
					$model-> periodicidad = null;
					$model-> descriptor_1 = null;
					$model-> descriptor_2 = null;
					$model-> descriptor_3 = null;
					$model-> descriptor_4 = null;
					//$model->img = UploadedFile::getInstances($model, 'img');
	
	
	
					/*if (!is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))  // creo directorios dentro de imagenes con la id
						{													// del OB donde guardare las imagenes.
							
						mkdir('C:/xampp/htdocs/basic/imagenes/tesis'.$id, 777);//le otorgo permiso de lectura y escritura
							
	
						}
	
						if($model->img && is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))
						{ //pendiente error al validar el modelo de las imagenes
							
						foreach ($model->img as $img)
						{
						$img->saveAs('C:/xampp/htdocs/basic/imagenes/tesis'.$id."/". $img->baseName . '.' . $img->extension);
						//$msg = "<p><strong class='label label-info'>subida de archivos lograda con exito</strong></p>";
						}
							
						}
	
						else
						{
						$msg = "No se ha creado ninguna carpeta o no se ha podido realizar la subida de imagenes";
							
						}*/
	
					return $this->redirect(["site/creararticulo"]);
					
				}
				else
				{
					$model->getErrors();
	
				}
					
					
			}
	
		}
			
		return $this->render("crearrevista",['model' => $model, 'msg' => $msg]);
	}
	
	
	public function actionCreartesis() //creamos los objetos bibliograficos que seran insertados en la tabla de la Base de Datos
	{
		$this->layout = 'adminlayout';
		$model = new FormTesis;
		$msg = null;
	
		if($model->load(Yii::$app->request->post())) //se utiliza el metodo post para una url limpia
		{
				
				
			if($model->validate() /*&& $model->img*/)
			{
				$table = new Tesis;
				$table->titulo_tesis = $model->titulo;
				$table->redactor_tesis = $model->redactor;
				$table->tutor_tesis = $model->tutor;
				$table->cotutor_tesis = $model->cotutor;				
				$table->fecha_tesis = $model->fecha_de_publicacion;
				$table->resumen_tesis = $model->resumen;
				$table->url = 'C:/xampp/htdocs/basic/imagenes/tesis/';
				$table->desc1_tesis = $model->descriptor1_tesis;
				$table->desc2_tesis = $model->descriptor2_tesis;
				$table->desc3_tesis = $model->descriptor3_tesis;
				$table->desc4_tesis = $model->descriptor4_tesis;
	
				//$model->img;
	
				if($table->insert() )
				{
						
					$id = $table->id_tesis;
					$msg = "Has subido los datos de la Tesis con ID unica ".$id ." de manera correcta";
					$model-> titulo = null;
					$model-> redactor = null;
					$model-> tutor = null;
					$model-> cotutor = null;
					$model-> universidad = null;
					$model-> resumen = null;
					$model-> fecha_de_publicacion = null;
					$model-> descriptor1_tesis = null;
					$model-> descriptor2_tesis = null;
					$model-> descriptor3_tesis = null;
					$model-> descriptor4_tesis = null;
					
					//$model->img = UploadedFile::getInstances($model, 'img');
						
						
						
					/*if (!is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))  // creo directorios dentro de imagenes con la id
					{													// del OB donde guardare las imagenes.
							
						mkdir('C:/xampp/htdocs/basic/imagenes/tesis'.$id, 777);//le otorgo permiso de lectura y escritura
							
	
					}
						
					if($model->img && is_dir('C:/xampp/htdocs/basic/imagenes/tesis'.$id))
					{ //pendiente error al validar el modelo de las imagenes
							
						foreach ($model->img as $img)
						{
							$img->saveAs('C:/xampp/htdocs/basic/imagenes/tesis'.$id."/". $img->baseName . '.' . $img->extension);
							//$msg = "<p><strong class='label label-info'>subida de archivos lograda con exito</strong></p>";
						}
							
					}
	
					else
					{
						$msg = "No se ha creado ninguna carpeta o no se ha podido realizar la subida de imagenes";
							
					}*/
	
					return $this->redirect(["site/registrostesis"]);
					
				}
				else
				{
					$model->getErrors();
	
				}
					
					
			}
	
		}
			
		return $this->render("creartesis",['model' => $model, 'msg' => $msg]);
	}
	
	
	
	public function actionCrear() //creamos los objetos bibliograficos que seran insertados en la tabla de la Base de Datos
	{
		$this->layout = 'adminlayout';
		$model = new FormObj;
		$msg = null;
		
		if($model->load(Yii::$app->request->post())) //se utiliza el metodo post para una url limpia
		{
			
			
			if($model->validate() && $model->img)
			{
				$table = new Objeto;
				$table->nombre = $model->nombre_objeto_bibliografico;
				$table->autor = $model->autor;
				$table->editorial = $model->editorial;
				$table->fecha = $model->fecha; 			
				//$table->colaborador = $model->colaborador;
				$table->lengua = $model->lengua;
				$table->tema = $model->tema;
				$table->resumen = $model->resumen;
				$table->url = 'C:/xampp/htdocs/basic/web/imagenes/monografias/';
				$table->isbn = $model->isbn;
				$table->desc1 = $model->descriptor_a;
				$table->desc2 = $model->descriptor_b;
				$table->desc3 = $model->descriptor_c;
				$table->desc4 = $model->descriptor_d;
				
				$img = $model->img;					
				
				if($table->insert() )
				{				
					
					$id = $table->id_objeto;
					$msg = "Has subido los datos de la Monografia con ID unica ".$id ."de manera correcta";
					$model-> nombre_objeto_bibliografico = null;
					$model-> autor = null;
					$model-> editorial = null;
					$model-> fecha = null;
					$model-> tema = null;
					$model-> resumen = null;
					$model-> lengua = null;
					//$model-> colaborador = null;
					$model->isbn = null;
					$model-> descriptor_a = null;
					$model-> descriptor_b = null;
					$model-> descriptor_c = null;
					$model-> descriptor_d = null;
					$model->img = UploadedFile::getInstances($model, 'img');						
					
					
					
					if (!is_dir('C:/xampp/htdocs/basic/web/imagenes/monografias/'.$id))  // creo directorios dentro de imagenes con la id
					{													// del OB donde guardare las imagenes.
					
					mkdir('C:/xampp/htdocs/basic/web/imagenes/monografias/'.$id, 777);//le otorgo permiso de lectura y escritura
				
											
					}
					
					if($model->img && is_dir('C:/xampp/htdocs/basic/web/imagenes/monografias/'.$id))
					{ //pendiente error al validar el modelo de las imagenes
					
						foreach ($model->img as $img)
						{
							$img->saveAs('C:/xampp/htdocs/basic/web/imagenes/monografias/'.$id."/". $img->baseName . '.' . $img->extension);
							//$msg = "<p><strong class='label label-info'>subida de archivos lograda con exito</strong></p>";
							
							
						}
						return $this->redirect(["site/registros"]);
					
					}
						
					else
					{
						$msg = "No se ha creado ninguna carpeta o no se ha podido realizar la subida de imagenes";
					
					}		
							
			}
			else
			{
				$model->getErrors();
		
			}
			
			
		  }
		
		}
					
		return $this->render("crear",['model' => $model, 'msg' => $msg]);
	}
		
	
	public function actionValidarobjeto() //ejemplo de como validar un objeto
	{
		
		
		
		$model = new ValidarObjetoBibliografico;
		$msg = null;
		
		if($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
		{
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);	
			
		}
		if($model->load(Yii::$app->request->post()))
		{ 
			
			if ($model->validate()){
				
				//aca va la consulta a la base de datos
				$msg = "Cargado el Objeto Bibliografico exitosamente".id_objeto;
				$model->nombre_objeto = null; //limpiamos los campos
				}
				else {
					$model->getError();
					
				}
			
		}
		
		return $this->render("validarobjeto", ['model' => $model, 'msg' => $msg]);
	}
	
	
	
	
public function behaviors() //funcion de control de roles
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout','mostrar','viewer', 'crear', 'registros', 'admin', 'editarusuario','creartesis','registrostesis','','registrosrevista','crearrevista','actualizarrevista','aaaaa'],
            'rules' => [
                [
                    //El administrador tiene permisos sobre las siguientes acciones
                    'actions' => ['logout','admin', 'viewer', 'editarusuario','mostrar', 'registros','crear','creartesis','registrostesis','','registrosrevista','actualizarrevista','crearrevista','aaaaa'],
                    //Esta propiedad establece que tiene permisos
                    'allow' => true,
                    //Usuarios autenticados, el signo ? es para invitados
                    'roles' => ['@'],
                    //Este m�todo nos permite crear un filtro sobre la identidad del usuario
                    //y as� establecer si tiene permisos o no
                    'matchCallback' => function ($rule, $action) {
                        //Llamada al m�todo que comprueba si es un administrador
                        return User::isUserAdmin(Yii::$app->user->identity->id);
                    },
                ],
                [
                //Los usuarios catalog tienen permisos sobre las siguientes acciones
                'actions' => ['logout', 'crear','registros'],
                //Esta propiedad establece que tiene permisos
                'allow' => true,
                //Usuarios autenticados, el signo ? es para invitados
                'roles' => ['@'],
                //Este m�todo nos permite crear un filtro sobre la identidad del usuario
                //y as� establecer si tiene permisos o no
                'matchCallback' => function ($rule, $action) {
                	//Llamada al m�todo que comprueba si es un usuario simple
                	return User::isUserCatalog(Yii::$app->user->identity->id);
                },
                ],
                [
                   //Los usuarios simples tienen permisos sobre las siguientes acciones
                   'actions' => ['logout', 'simple'],
                   //Esta propiedad establece que tiene permisos
                   'allow' => true,
                   //Usuarios autenticados, el signo ? es para invitados
                   'roles' => ['@'],
                   //Este m�todo nos permite crear un filtro sobre la identidad del usuario
                   //y as� establecer si tiene permisos o no
                   'matchCallback' => function ($rule, $action) {
                      //Llamada al m�todo que comprueba si es un usuario simple
                      return User::isUserSimple(Yii::$app->user->identity->id);
                  },
               ],
               
               
            ],
        ],
 //Controla el modo en que se accede a las acciones, en este ejemplo a la acci�n logout
 //s�lo se puede acceder a trav�s del m�todo post
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	$form = new Buscar;
    	$search = null;//guardamos la busqueda realizada en esta variable
    	if($form->load(Yii::$app->request->get()))//cuando el formulario de busqueda es enviado
    	{
    		if ($form->validate())//validamos el campo
    		{
    			$search = Html::encode($form->q); //evita ataques xss
    			/*$query = "SELECT * FROM objeto WHERE id_objeto LIKE '%$search%' OR ";//realizamos una consulta SQL
    			 $query .= "nombre LIKE '%$search%' OR autor LIKE '%$search%'";
    			 $model = $table->findBySql($query)->all(); //extrae todos los registros que coincidan con la consulta almacenando en models
    			*/
    			$query = Objeto::find()
    			->where(["like","nombre",$search])
    			->orwhere(["like","autor",$search])
    			->orwhere(["like","editorial",$search])
    			->orwhere(["like","fecha",$search]);
    			$countQuery = clone $query;
    			$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
    			$model = $query->offset($pages->offset)
    			->limit($pages->limit)
    			->all();
    	
    		}
    			
    		else {
    			$form->getErrors();
    	
    		}
    			
    	}
    	else
    	{
    		$query = Objeto::find();
    		$countQuery = clone $query;
    		$pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
    		$model = $query->offset($pages->offset)
    		->limit($pages->limit)
    		->all();
    			
    	}
        return $this->render('index',['model' => $model, 'form' => $form, 'search' => $search, 'pages' => $pages]);
    }

    public function actionLogin()
    	{
    		if (!\Yii::$app->user->isGuest) {

				if (User::isUserAdmin(Yii::$app->user->identity->id))
				{
					
 					return $this->redirect(["site/admin"]);
				}
				if (User::isUserCatalog(Yii::$app->user->identity->id))
				{
					return $this->redirect(["site/registros"]);
				}
				else
				{
 					return $this->redirect(["site/simple"]);
				}
     	}

        $model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) 
		{
        	if (User::isUserAdmin(Yii::$app->user->identity->id))
			{
 				return $this->redirect(["site/admin"]);
			}
			if  (User::isUserCatalog(Yii::$app->user->identity->id))
			{
				return $this->redirect(["site/registros"]);
			}
			else
			{
 				return $this->redirect(["site/simple"]);
			}

     		} else {
         		return $this->render('login', [
             		'model' => $model,
        		 ]);
    	 }
 }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
