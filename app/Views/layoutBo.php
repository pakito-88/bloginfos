
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLogInfos, accès Back Office</title>
    <!-- Core CSS - Include with every page -->

      <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="<?php echo $this->assetUrl('plugins/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    


    <link href="<?php echo $this->assetUrl('plugins/pace/pace-theme-big-counter.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('css/style1.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('css/main-style.css'); ?>" rel="stylesheet" />


 
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('css/styleBo.css'); ?>" rel="stylesheet" />

   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper" class="homePage">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <h1 class="titre">Accès BackOffice</h1>

            <!-- end navbar-header -->

            <ul class="nav navbar-nav">
                    <li>
                        <!-- user image section-->
                        <!--div class="user-section">
                            
                            <div class="user-info">
                                
                            </div>
                        </div-->
                        <!--end user image section-->
                    </li>
                      <li class="selected">
                        <a href="<?php echo $this->url('default_home'); ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="selected">
                        <a href="<?php echo $this->url('statistique'); ?>"><i class="fa fa-percent" aria-hidden="true"></i> Statistiques</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('users_list'); ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Gestion des utilisateurs</a>
                    </li>
                     <li>
                        <a href="<?php echo $this->url('articles_list'); ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Gestion des articles</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('categories_list'); ?>"><i class="fa fa-globe" aria-hidden="true"></i> Gestion des catégories</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('comments_list'); ?>"><i class="fa fa-globe" aria-hidden="true"></i> Gestion des commentaires</a>
                    </li>
                </ul>

            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
               

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->url('register'); ?>"><i class="fa fa-user fa-fw"></i>Profil de l'utilisateur</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>Déconnexion</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default-navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
               
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>

        
    <main id="appContent">
        <!-- Chargement du contenu depuis des fichiers HTML externes -->


        <section>
            <?= $this->section('main_content') ?>
        </section>

    </main>

      <footer id="footer">Copyright © 2016 BlogInfos</footer>


   


    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>


</html>
