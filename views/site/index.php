<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">

        <p class="lead">SISTEM PENILAIAN PEGAWAI TELADAN</p>
        <p class="lead"><h2>RSUD KOTA YOGYAKARTA</h2></p>
        <p class="lead"><h2>TAHUN 2022</h2></p>     
    </div>



<div class="row">      
                <div class="col-lg-6">
                  <justify>
                  
                <p style="color:black;font-size:16px;">
                  Kami informasikan kepada segenap pegawai RSUD KOTA YOGYAKARTA, bahwasanya untuk mendukung program Pemilihan Pegawai Teladan TAHUN 2022
                  diharapkan Bapak/Ibu sekalian untuk memilih 1 kandidat untuk setiap rumpun/kelompok yang akan 
                  di nominasikan sebagai pegawai Teladan TAHUN 2022, dengan KLIK tombol PILIH KANDIDAT disamping .
                </p>   
              
                </justify>            
              </div>

              <div class="col-lg-6">
                  <justify>
                <p>
                  Silakan KLIK tombol PILIH KANDIDAT dibawah:
                  <br>
                  <br>
                  <?= Html::a('<i class="glyphicon glyphicon-user">  PILIH KANDIDAT</i>', ['/kandidat/create'],
                              ['class'=>'btn-lg btn-danger']) ?>
              </p>  

                </justify>            
              </div>
               
</div>

<br>
<h1></h1>
    <div class="body-content">       



        <div class="row">
            <div class="col-lg-6">
                <div class="info-box bg-blue">
                  <span class="info-box-icon"><i class="fa fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">DOKTER</span>
                    <span class="info-box-number">0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                      Jumlah Pegawai
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                &nbsp;
                
                <div class="info-box bg-green">
                  <span class="info-box-icon"><i class="fa fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">PERAWAT</span>
                    <span class="info-box-number">0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                     Jumlah Pegawai
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="info-box bg-yellow">
                  <span class="info-box-icon"><i class="fa fa-user-times"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">KPKL</span>
                    <span class="info-box-number">0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                      Jumlah Pegawai
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                &nbsp;
                
                <div class="info-box bg-orange">
                  <span class="info-box-icon"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">UMUM</span>
                    <span class="info-box-number">0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                     Jumlah Pegawai
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </div>
            
                  <!-- /.info-box-content -->
                </div>
            </div>
        </div>

    </div>
</div>

