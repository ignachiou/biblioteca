<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/registros") ?>">Ir a la lista de Objetos Bibliograficos </a>

<h1>Crear Objeto Bibliografico</h1>
<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
 	'enableClientValidation' => true,
		"options" => ["enctype" => "multipart/form-data"],
]);
?>




<div class="form-group">
 <?= $form->field($model, "nombre_objeto_bibliografico")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "autor")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "editorial")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fecha")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "tema")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "resumen")->textarea(['rows'=>4]) ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "lengua")->input("text") ?>   
</div>


<div class="form-group">
 <?= $form->field($model, "isbn")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_a")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_b")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_c")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "descriptor_d")->input("text") ?>   
</div>


<?= $form->field($model, "img[]")->fileInput(['multiple' => true]) ?>


<?= Html::submitButton("Crear", ["class" => "btn btn-primary"])?>

<?php $form->end() ?>