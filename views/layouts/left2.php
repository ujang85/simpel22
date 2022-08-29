<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php 
                    if (Yii::$app->user->isGuest) {
                      echo "tamu";
                    } 
                    else {
                    echo Yii::$app->user->identity->username;
                }
                    ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

       

       <?=
       
             dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                //    ['label' => 'Dashboard', 'options' => ['class' => 'header']],
                //    ['label' => 'Dasboard','icon' => 'dashboard', 'url' => ['site/login'],
                ///    ['label' => 'Manajemen User','icon' => 'user', 'url' => "#", 'visible' => Yii::$app->user->isGuest],
                   
                    ['label' => 'Logout', 'url' => ['site/logout'],'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],  
                ],
            ]
        )
       ?>

    </section>

</aside>
