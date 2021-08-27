<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDefectsSearch */
/* @var $form yii\widgets\ActiveForm */
//var_dump($model2); die();
?>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .ahref {
        color: white;
    }
</style>
<section style="padding-bottom: 15px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin([
                ]); ?>
                <div class="col-md-3">
                    <?= DatePicker::widget([
                        'options' => ['placeholder' => 'Dan ',
                            'class' => 'inputform',
                        ],
                        'name' => 'startDT',
                        'value' => ($value['startDT']) ? $value['startDT'] : '',
                        'pluginOptions' => [

                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>
                <div class="col-md-3">
                    <?= DatePicker::widget([
                        'options' => ['placeholder' => 'Gacha',
                            'class' => 'inputform',
                        ],
                        'name' => 'endDT',
                        'value' => ($value['endDT']) ? $value['endDT'] : '',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>
                <div class="col-md-3">
                    <input <?= ($value['shop']) ? 'checked' : '' ?> name="shop" type="checkbox">
                    <label>Tsexlar bo`yicha</label>
                    <input <?= ($value['model']) ? 'checked' : '' ?> name="model" type="checkbox">
                    <label>Modellar bo`yicha</label>
                    <input <?= ($value['defect']) ? 'checked' : '' ?> name="defect" type="checkbox">
                    <label>Defektlar bo`yicha</label>
                </div>
                <div class="col-md-3">
                    <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>


        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div>
                    <? if (isset($model1)) : ?>
                        <table id="customers">
                            <thead>
                            <tr>
                                <th>T/r</th>
                                <th>Tsexlar</th>
                                <th>Defektlar soni</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            foreach ($model1 as $key => $m1):
                                ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $m1['sh_name'] ?></td>
                                    <td><?= $m1['count'] ?></td>
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    <? endif; ?>
                    <? if (isset($model2)) : ?>
                        <table id="customers">
                            <thead>
                            <tr>
                                <th>T/r</th>
                                <th>Tsexlar</th>
                                <th>defect_name</th>
                                <th>Defektlar soni</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($model2 as $key => $m1): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $m1['sh_name'] ?></td>
                                    <td><?= $m1['defect_name'] ?></td>
                                    <td><?= $m1['count'] ?></td>
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>

                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>