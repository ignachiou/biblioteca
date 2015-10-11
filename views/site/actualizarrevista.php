<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>


<a href="<?= Url::toRoute("site/registrosrevista") ?>">Ir a la lista de Revistas</a>

<h1>Editar la Revista con ID <?= Html::encode($_GET["id_revista"]) ?></h1>

<h3><?= $msg?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_revista")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "titulo")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "editorial")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "publicacion")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "serie")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fecha_de_publicacion")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "issn")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "distribucion")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "volumen")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "periodicidad")->input("text") ?>   
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


<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

