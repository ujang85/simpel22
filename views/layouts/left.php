<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel user2-160x160.jpg-->
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

       

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['site/logout'],'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                    

                    [
                        'label' => 'Administrator',
                        'icon' => 'dashboard',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data User', 'icon' => 'user', 'url' =>'#'],
                        //     ['label' => 'Setting Hak Akses User', 'icon' => 'key', 'url' => ['/mimin/user/index']],
                             ['label' => 'Ubah Password User', 'icon' => 'key', 'url' => ['/user2/ubahpassword']],
                        //     ['label' => 'Buat Akun User', 'icon' => 'certificate', 'url' => ['/site/signup']],
                        ],],
                //    ['label' => 'DATA PEGAWAI','icon' => 'user-plus', 'url' =>['/pegawai/index']],
                //    ['label' => 'PILIH KANDIDAT','icon' => 'user-plus', 'url' =>['/kandidat/create']],
                /*    [
                        'label' => 'PENILAIAN PEGAWAI',
                        'icon' => 'cube',
                        'url' => '#',
                        'items' => [
                           
                                    ['label' => 'DOKTER', 'icon' => 'send', 'url' => ['/penilaian/index']],
                                    ['label' => 'PERAWAT', 'icon' => 'send', 'url' => ['/penilaian-perawat/index']],
                                    ['label' => 'KPKL', 'icon' => 'send', 'url' => ['/penilaian-kpkl/index']],
                                    ['label' => 'UMUM', 'icon' => 'send', 'url' => ['/penilaian-umum/index']],
                                 //   ['label' => 'ALL', 'icon' => 'send', 'url' => ['/penilaian/indexall'],'visible'=> Yii::$app->user->identity->unit=='1'],

                                  //  ['label' => 'Monitoring Peminjaman','icon' => 'user', 'url' => ['/transaksi/indexuser'], 'visible'=> Yii::$app->user->identity->hak_akses==2]
                        ],], 
                    ['label' => 'DAFTAR NILAI','icon' => 'user-plus', 'url' =>['/penilaian-pegawai/index']], */
                        
                            [
                                'label' => 'SKOR',
                                'icon' => 'calendar-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'DOKTER/MEDIS', 'icon' => 'circle-o', 'url' => ['/kandidat/skormedis']],
                                    ['label' => 'PERAWAT', 'icon' => 'circle-o', 'url' => ['/kandidat/skorperawat']],
                                    ['label' => 'KPKL', 'icon' => 'circle-o', 'url' => ['/kandidat/skorkpkl']],
                                    ['label' => 'UMUM', 'icon' => 'circle-o', 'url' => ['/kandidat/skorumum']],
                                ],], 

                            ],
                        
            ]
        ) 
        ?>

    </section>

</aside>
