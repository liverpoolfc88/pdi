<?php

use yii\helpers\Url; ?>
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

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    .ahref{
        color: white;
    }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="card">

                <table id="customers">
                    <thead>
                    <tr>
                        <th>T/r</th>
                        <th> <a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'm.model_name'])?>">Model<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'tsex'])?>">Tsex<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'level1'])?>">Level1<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'level2'])?>">Level2<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'level3'])?>">Level3<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'dlist.defect_name'])?>">Defekt<i class='fas fa-sort-alpha-down'></i></a></th>
                        <th><a class="ahref " href="<?=Url::to(['/site/defcount','sort' => 'd_count'])?>">Soni<i class='fas fa-sort-alpha-down'></i></a></th>
                    </tr>
                    </thead>
                   <tbody>
                   <? foreach ($model as $key=>$m): ?>
                   <tr>
                       <td><?=$key+1?></td>
                       <td><?=$m['model_name']?></td>
                       <td><?=$m['tsex']?></td>
                       <td><?=$m['level1']?></td>
                       <td><?=$m['level2']?></td>
                       <td><?=$m['level3']?></td>
                       <td><?=$m['defect_name']?></td>
                       <td><?=$m['d_count']?></td>


                   </tr>
                  <? endforeach; ?>

                   </tbody>

                </table>
            </div>
        </div>
    </div>
</section>