<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Revista;
?>

<a href="<?= Url::toRoute("site/registrosrevista") ?>">Ir a la lista de Revistas </a>

<h1>Crear Articulos</h1>
<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
 	'enableClientValidation' => true,
		"options" => ["enctype" => "multipart/form-data"],
]);
?>

<div class="form-group">
 <?= $form->field($model, "titulo_articulo")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "autor")->input("text") ?>   
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT max(id_revista) FROM revista";
$result = $conn->query($sql);


     // output data of each row
    // $row = $result;
     $row = $result->fetch_assoc();
     echo "<br> id: ". $row["max(id_revista)"].  "<br>";


?>

<div class="form-group">
 <?= $form->field($model, "id_revista")->
 dropDownList( 		ArrayHelper::map(Revista::find()->all(),'id_revista','id_revista')
 		//ArrayHelper::map(Revista::find()->all(), 'id_revista', MAX(array ('id_revista')))
 		//['prompt'=>'agarra Revista']
 		)
 ?>
</div>



<div class="form-group">
 <?= $form->field($model, "resumen")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_1")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_2")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_3")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_4")->input("text") ?>   
</div>

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"])?>

<?php $form->end() ?>