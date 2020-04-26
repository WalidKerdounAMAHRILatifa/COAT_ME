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
                                <a class="nav-link active" href="GestionDesProduits.php"  ><i class="fa fa-fw fa-rocket"></i>Gestion des Produits</a>
                              
                            </li>
                            <li class="nav-item" style="margin-top: 40px;">
                                <a class="nav-link" href="GestionDesClients.php" ><i class="fa fa-fw fa-user-circle"></i>Gestion des Clients</a>
                       
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
        <div class="dashboard-wrapper"  style="background-color: #ffc75047;">
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
                                                <li class="breadcrumb-item active" aria-current="page">Gestion des Produits</li>

                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


                               <div class="col-xl-12 ">
                                <div class="card">
                                    <h5 class="card-header">Tous Les Produits<button type="button" class="btn btn-primary" name="btn_add" style="float: right;"data-toggle="modal" data-target="#add">Ajouter un produit</button></h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Nom Produit</th>
                                                        <th class="border-0">prix Produit</th>
                                                        <th class="border-0">Taille Produit</th>
                                                        <th class="border-0">Quantite</th>
                                                        <th class="border-0">Description </th>
                                                        <th class="border-0">Genre</th>
                                                        <th class="border-0">Couleur</th>
                                                        <th class="border-0 ">Materiels</th>
                                                        <th class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                    <?php  
                            
                                        require_once('../database.php');
                                        $resul = $conn->prepare("SELECT id_Produit,nom_Produit,image_Produit,prix_Produit,size_Produit,Quantite_Produit,description_Produit,gender,couleur,materiels FROM produit");
                                        $resul->execute();
                                        for($i=0; $row = $resul->fetch(); $i++){
                                            $id=$row['id_Produit'];
                                    
                                    ?>            
                                            <form method="GET" action="#delete?<?php echo $row['id_Produit']; ?>" > 
                                                    <tr>
                                                        <td>
                                                            <div class="m-r-10"><img src="../imageProduit/<?php echo $row['image_Produit']; ?>" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <input type="text" name="id_Produit" value="<?php echo $row['id_Produit']; ?>" hidden>
                                                        <td><?php echo $row['nom_Produit']; ?></td>
                                                        <td><?php echo $row['prix_Produit']; ?></td>
                                                        <td><?php echo $row['size_Produit']; ?></td>
                                                        <td><?php echo $row['Quantite_Produit']; ?></td>
                                                        <td><?php echo $row['description_Produit']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td><?php echo $row['couleur']; ?></td>
                                                        <td><?php echo $row['materiels']; ?></td>
                                                        <td> 
                                                        <button name="btn_edit" data-toggle="modal" data-target="#edit" style="background-color: transparent;border:0px;"><i class="fa fa-edit fa-2x" style="color:#4bb8a1;"></i></button>

                                                        <button name="btn_delete" data-toggle="modal" data-target="#delete" style="background-color: transparent;border:0px;"><i class="fa fa-trash fa-2x" style="color:#4bb8a1;"></i></button>
                                                        
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer Un Produit</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de vouloir supprimer ce produit?</p>
                                                                <?php 
                                                                if(isset($_GET['id_Produit'])){
                                                                    $id= $_GET['id_Produit'];
                                                                }
                                                                     ?>
                                                            </div>
                                                                <form method="POST" action="GestProduit.php">
                                                                    <input type="hidden" name="id_Produit" value="<?php echo $id;?>">
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
                                                        <div class="modal-content" style="width: 48em;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifier un Produit</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <form method="post" action="GestProduit.php"  enctype="multipart/form-data">
                                                                    <input type="hidden" name="id_Produit" value="<?php echo $id;?>">
                                                                    <table class="table1">
                                                                        <?php  
                            
                                                                        require_once('../database.php');
                                                                        $resul = $conn->prepare("SELECT nom_Produit,image_Produit,prix_Produit,size_Produit,Quantite_Produit,description_Produit,gender,couleur,materiels FROM produit WHERE id_Produit=$id ");
                                                                        $resul->execute();
                                                                        for($i=0; $row = $resul->fetch(); $i++){?>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nom de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nom_Produit" placeholder="nom_Produit" class="form-control" value="<?php echo $row['nom_Produit']; ?>"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Prix de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="number" name="prix_Produit" placeholder="prix_Produit" class="form-control" value="<?php echo $row['prix_Produit']; ?>"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Taille de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="text" name="size_Produit" placeholder="prix_Produit" class="form-control" value="<?php echo $row['size_Produit']; ?>"required />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Genre</label><br><small>(concerne soit:)</small></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="gender" class="custom-control-input"value="women" <?php if($row['gender'] == 'women')echo 'checked="checked"'; ?>><span class="custom-control-label"  >Femme</span>
                                                                                </label>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="gender" class="custom-control-input" value="men"<?php if( $row['gender'] == 'men') echo 'checked="checked"'; ?>><span class="custom-control-label"  >Homme</span>
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Quantite de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="number" name="Quantite_Produit" placeholder="Quantite_Produit" class="form-control"required value="<?php echo $row['Quantite_Produit']; ?>"/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Description de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="description_Produit" placeholder="description_Produit" class="form-control"value="<?php echo $row['description_Produit']; ?>"required  /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Couleur de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="text" name="couleur" placeholder="prix_Produit" class="form-control" value="<?php echo $row['couleur']; ?>"required />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Materiels de Produit</label><br><small>(Informations Tissus)</small></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="materiels" placeholder="materiels" class="form-control"value="<?php echo $row['materiels']; ?>"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Image de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="file" name="image_Produit" value="<?php echo $row['image_Produit']; ?>"></td>
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

                                                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content" style="width: 48em;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Produit</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="GestProduit.php"  enctype="multipart/form-data">
                                                                    <table class="table1">
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Nom de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="nom_Produit"  class="form-control"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Prix de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="number" name="prix_Produit" class="form-control "required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Taille de Produit</label><br><small>(doit etre separer par virgule:S,M,L,XL)</small></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <input type="text" name="size_Produit" class="form-control"required />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Genre</label><br><small>(concerne soit:)</small></td>
                                                                            <td width="30"></td>
                                                                            <td>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="gender" checked="" class="custom-control-input" value="women"><span class="custom-control-label" >Femme</span>
                                                                                </label>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" name="gender" class="custom-control-input" value="men"><span class="custom-control-label" >Homme</span>
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Quantite de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="number" name="Quantite_Produit" class="form-control"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Description de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="description_Produit"  class="form-control"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Couleur de Produit</label><br><small>(Noir,Rouge,Vert,Blanc,Jaune,bleu,Gris,Marron:)</small></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="couleur"  class="form-control"required /></td> 
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Materiels de Produit</label><br><small>(Informations Tissus)</small></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="text" name="materiels" class="form-control"required /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label style="color:#3a87ad; font-size:16px;">Image de Produit</label></td>
                                                                            <td width="30"></td>
                                                                            <td><input type="file" name="image_Produit"></td>
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
            <div class="footer">
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