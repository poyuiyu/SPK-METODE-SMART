<?php
  session_start();
  include 'koneksi.php';
  require_once 'navigasi.php';

  ?>



  <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Simple Multi Attribute Rating Technique</h1>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Admin
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="alert alert-info">
                                        Selamat datang, <?=$_SESSION['username']?> . Ini adalah aplikasi pengambilan metode keputusan dengan metode SMART (Simple Multi Attribute Rating Technique). <a href="alternatif.php" class="alert-link">masukkan data siswa/alternatif</a>
                                    </div>
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php

        require_once 'foot.php';

        ?> 

