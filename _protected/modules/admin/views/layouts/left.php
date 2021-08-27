<?
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/themes/pdi.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->fullname?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->

        <ul  class="sidebar-menu tree" data-widget="tree"><li class="header"><span><span>Menu Admin</span></span></li>
<!--            <li class="treeview"><a href="#"><i class="fa fa-pencil"></i>  <span>Admin</span> <span class="pull-right-container"></span></a></li>-->
            <li class=""><a href="<?=Url::to(['/admin/user/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Useradmin</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/shops/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Tsexlar</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/level1/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">1-Level</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/level2/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">2-Level</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/level3/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">3-Level</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/defect-list/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Defekt turi</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/vehicles/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Modellar</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/models/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Avto Model</span></a> </li>
            <li class=""><a href="<?=Url::to(['/admin/vehicle-defects/index'])?>"><i class="fa fa-pencil-square-o"></i>  <span class="white">Defektlar</span></a> </li>
        </ul>

    </section>

</aside>
<style>
    .white{
        color: white;
    }
</style>