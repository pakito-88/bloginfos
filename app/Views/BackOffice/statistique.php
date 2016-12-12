<?php $this->layout('layoutBo', ['title' => 'statistique']) ; ?>


  <?php $this->start('main_content'); ?>


 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLogInfos</title>
    <!-- Core CSS - Include with every page -->

    <!-- <link rel="stylesheet" type="text/css" href="assets/css/styleNajet.css"> -->

    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" /><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/styleBo.css" rel="stylesheet" />

   </head>
        <div class="col-lg-12">
            <h2 class="stats">Statistiques</h2>
        </div>
 <!--  page-wrapper -->
        <div id="page-wrapper">
          
                <!--quick info section -->
                <div class="col-lg-3">
                    
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-user fa-3x"  aria-hidden="true"></i>&nbsp;<b>10 </b>Nouveaux inscrits en un jour

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                       <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>&nbsp;<b>16 </b> Articles publiés cette semaine  
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-arrow-up fa-3x" aria-hidden="true"></i></i>&nbsp;<b>5000 </b> Nouveaux inscrits pour l'année 2016

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa fa-user-times fa-3x" aria-hidden="true"></i>&nbsp;<b>5% </b>D'utilisateurs absents du site
                    </div>
                </div>
                <!--end quick info section -->
            </div>


             <div class="row">
                <div class="col-lg-8">

             <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Taff pour Seb Tableau SQL
                            
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

               
                    <!--End Chat Panel Example-->
                </div>
            </div>


         


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    <?php $this->stop('main_content'); ?>
