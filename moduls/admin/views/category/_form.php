<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\moduls\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'parent_id')->textInput() ?>

    <?php // echo $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name')) ?>

    <div class="form-group field-category-parent_id has-success">
          <label class="control-label" for="category-parent_id">Родительская категория</label>
          <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-invalid="false">
                <option value="0">Самостоятельная категория</option>
                <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
          </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
