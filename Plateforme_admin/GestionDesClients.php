<?php
session_start();
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Coat Me: Mantaux et Vestes Pour les Femmes&Hommes</title>
</head>

<body >
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper" >
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: #131313;">
                <a  href="index.html"><img src="../images/icons/logo4.png"style="width: 150px;height: 100px;"></a>
              
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">

                                            <?php  
                            
                                            if(isset($_SESSION['username'])==true){
                                                echo $_SESSION['username'];
                                            }
                                            ?>

                                     </h5>
                                    <span class="status"></span><span class="ml-2">Admin</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="#"><form method='POST' action='GestProduit.php' ><button type='submit' class="fas fa-power-off mr-2 btn btn-dark"name='logout' >Se deconnecter</button></form>  </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark" style="margin-top: 35px;background-color: #131313;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item " style="margin-top: 40px;">
                                <a class="nav-link " href="GestionDesProduits.php"  ><i class="fa fa-fw fa-rocket"></i>Gestion des Produits</a>
                              
                            </li>
                            <li class="nav-item" style="margin-top: 40px;">
                                <a class="nav-link active" href="GestionDesClients.php" ><i class="fa fa-fw fa-user-circle"></i>Gestion des Clients</a>
                       
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper"  style="background-color: #4bb8a169;">
            <div class="dashboard-ecommerce" >
                <div class="container-fluid dashboard-content " style="padding-left: 0px;padding-right: 0px;" >
                         <div class="row" style="margin-top: 20px;">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title" style="margin-left: 30px;">E-commerce Admin Plateforme </h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb" style="margin-left: 20px;">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Gestion des Clients</li>

                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


                               <div class="col-xl-12 ">
                                <div class="card">
                                    <h5 class="card-header">Tous Les Clients<button type="button" class="btn btn-primary" name="btn_add" style="float: right;"data-toggle="modal" data-target="#add">Ajouter un Client</button></h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Nom </th>
                                                        <th class="border-0">Prenom </th>
                                                        <th class="border-0">Email </th>
                                                        <th class="border-0">Telephone</th>
                                                        <th class="border-0">mot de passe</th>
                                                        <th class="border-0">Adresse </th>
                                                        <th class="border-0">Pays</th>
                                                        <th class="border-0">Role</th>
                                                        <th class="border-0 ">NickName</th>
                                                        <th class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                    <?php  
                            
                                        require_once('../database.php');
                                        $resul = $conn->prepare("SELECT id_Personne,nom_Personne,prenom_Personne,email_Personne,tele_Personne,psw_Personne,adresse,pays,role,nickname FROM personne");
                                        $resul->execute();
                                        for($i=0; $row = $resul->fetch(); $i++){
                                            $id=$row['id_Personne'];
                                    
                                    ?>            
                                            <form method="GET" action="#delete?<?php echo $row['id_Personne']; ?>" > 
                                                    <tr>
                                                        <input type="text" name="id_Personne" value="<?php echo $row['id_Personne']; ?>" hidden>
                                                        <td><?php echo $row['nom_Personne']; ?></td>
                                                        <td><?php echo $row['prenom_Personne']; ?></td>
                                                        <td><?php echo $row['email_Personne']; ?></td>
                                                        <td><?php echo $row['tele_Personne']; ?></td>
                                                        <td><?php echo $row['psw_Personne']; ?></td>
                                                        <td><?php echo $row['adresse']; ?></td>
                                                        <td><?php echo $row['pays']; ?></td>
                                                        <td><?php echo $row['role']; ?></td>
                                                        <td><?php echo $row['nickname']; ?></td>
                                                        <td> 
                                                        <button name="btn_edit" data-toggle="modal" data-target="#edit" style="background-color: transparent;border:0px;"><i class="fa fa-edit fa-2x" style="color:#ffc750;"></i></button>

                                                        <button name="btn_delete" data-toggle="modal" data-target="#delete" style="background-color: transparent;border:0px;"><i class="fa fa-trash fa-2x" style="color:#ffc750;"></i></button>
                                                        
                                                    </td>
                                                    </tr>
                                                </form>
                                                    <?php }?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                             <!-- Modal -->
                                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer Un Client</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de vouloir supprimer ce Client?</p>
                                                                <?php 
                                                                if(isset($_GET['id_Personne'])){
                                                                    $id= $_GET['id_Personne'];
                                                                }
                                                                     ?>
                                                            </div>
                                                                <form method="POST" action="GestClient.php">
                                                                    <input type="hidden" name="id_Personne" value="<?php echo $id;?>">
                                                                    <div class="modal-footer">
                                                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Non</a>
                                                                        <button type="submit" class="btn btn-primary" name="btn_delete">Oui</button>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content" style="width: 32em;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifier un Client</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <form method="post" action="GestClient.php"  enctype="multipart/form-data">
                                                                    <input type="hidden" name="id_Personne" value="<?php echo $id;?>">
                                                                    <table class="table1">
                                                                        <?php  
                            
                                                                        require_once('../database.php');
                                                                        $resul = $conn->prepare("SELECT nom_Personne,prenom_Personne,email_Personne,tele_Personne,psw_Personne,adresse,pays,role,nickname FROM personne WHERE id_Personne=$id ");
                                                                        $resul->execute();
                                                                        for($i=0; $row = $resul->fetch(); $i++){?>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nom de Client</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nom_Personne" class="form-control" value="<?php echo $row['nom_Personne']; ?>" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Prenom de Client</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="prenom_Personne" class="form-control" value="<?php echo $row['prenom_Personne']; ?>" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Email </label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="email" name="email_Personne" class="form-control" value="<?php echo $row['email_Personne']; ?>"required />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Role</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="role" class="custom-control-input"value="Admin" <?php if($row['role'] == 'Admin')echo 'checked="checked"'; ?>><span class="custom-control-label"  >Admin</span>
                                                                                </label>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="role" class="custom-control-input" value="Client"<?php if( $row['role'] == 'Client') echo 'checked="checked"'; ?>><span class="custom-control-label"  >Client</span>
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Telephone</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="tel" name="tele_Personne" class="form-control" value="<?php echo $row['tele_Personne']; ?>"/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Mot de Passe</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="psw_Personne" class="form-control"value="<?php echo $row['psw_Personne']; ?>"required  /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Adresse</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="text" name="adresse" class="form-control" value="<?php echo $row['adresse']; ?>" />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Pays</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="pays" class="form-control"value="<?php echo $row['pays']; ?>" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nickname</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nickname" class="form-control" required value="<?php echo $row['nickname']; ?>"></td>
                                                                        </tr>
                                                                    <?php }?>
                                                                    </table>
                                                                   
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                                                                <button type="submit" name="btn_edit"class="btn btn-primary">Modifier</button>
                                                            </div>
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content" style="width: 32em;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Client</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <form method="post" action="GestClient.php"  enctype="multipart/form-data">
                                                                    <input type="hidden" name="id_Personne" value="<?php echo $id;?>">
                                                                    <table class="table1">
                                                            
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nom de Client</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nom_Personne" class="form-control"  /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Prenom de Client</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="prenom_Personne" class="form-control"  /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Email </label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="email" name="email_Personne" class="form-control" required />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Role</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="role" class="custom-control-input"value="Admin"><span class="custom-control-label"  >Admin</span>
                                                                                </label>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="role" class="custom-control-input" value="Client" checked><span class="custom-control-label"  >Client</span>
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Telephone</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="tel" name="tele_Personne" class="form-control" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Mot de Passe</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="psw_Personne" class="form-control"required  /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Adresse</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="text" name="adresse" class="form-control"  />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Pays</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="pays" class="form-control" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nickname</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nickname" class="form-control" required></td>
                                                                        </tr>
                                                                    </table>
                                                                   
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                                                                <button type="submit" name="btn_add"class="btn btn-primary">Ajouter</button>
                                                            </div>
                                                             </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer" style="margin-top: 20em;">
                <div class="container-fluid">
                   <p class="stext-107 cl6 txt-center" style="float: right;">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Ce Site est Realisé par <a href="index.php" target="_blank">KERDOUN Walid && AMAHRI Latifa</a>

                    </p>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>