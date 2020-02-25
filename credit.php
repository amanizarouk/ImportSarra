  <html>
  <head>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- View port : Responsive interface-->
<script>
        $(document).ready(function() {
                $('#dataTable').DataTable({});
            });
      </script>


    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
<style>
			.button{position:absolute;
			left:85%;
			top:0.5%
			}
			.montant{position:absolute;
			left:20%;
			top:0.5%}
			.noti{
			position:absolute;
			left:80%;
			top:0.5%}

.nom
  {
			 font-weight: bold;
      font-size:15px;
	  color :white;
text-transform: capitalize;}
	  .deconnexion{ position:absolute ;
             right:5%; 
 }
	  .navcolor{  background-image: linear-gradient( 90deg, #f3a0a8 0%, #dc3545 100% ); }

	</style>
  </head>
  <?php 
  session_start () ;
 include("connexion.php");?>
 
 <body id="page-top">
 <!-- "Navbar" -->
 
<nav class="navbar navbar-expand navbar-dark bg-dark  navcolor static-top">

      <a class="navbar-brand mr-1" href="index.html"></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
       
      </button>

   

       <!-- "UL" deconnexion -->
	  
      
      <ul class="navbar-nav ml-auto ml-md-0 deconnexion" >
	   <li><span class="nom"> </span></li>
        <li class="nav-item dropdown no-arrow">
        	<i class="fas fa-table"></i>

          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <p>déconnexion</p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">deconnexion</a>
          </div>
        </li>
      </ul>

	
    </nav>
	
	
	
	<div id="wrapper">
	
	 <!--sidebar-->
	<ul class="sidebar navbar-nav navcolor" >
          <li class="nav-item active">
          <a class="nav-link" href="home.php">
           
            <span>Accueil</span>
          </a>
        </li>
        <li>
          <a class="nav-link" href="organismes.php">
          <li class="nav-item active">
            <span>liste des boutiques</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="credit.php">
           
            <span>liste des produits</span></a>
        </li>
	
		<li class="nav-item">
          <a class="nav-link" href="historique.php">
      
            <span>Historique</span></a>
        </li>
		
      </ul>
	
	
	<div id="content-wrapper">
	
		<!-- ajout de produit -->
		<div class="container-fluid">
		  <div class="card mb-3">
            <div class="card-header">
              liste produit <button class="btn btn-primary button navcolor" data-toggle="modal" data-target="#myModal" >Ajouter produit</button>
			  </div> 
			  </div>
			                   <!-- ajoutememt de produit -->
			                        <div class="modal" id="myModal" >
									     <div class="modal-dialog modal-sm">
										 <div class="modal-content">
										  <div class="modal-header">
                                            <h3 class="modal-title"><center>Ajouter produit</center></h3>
		                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<div class="modal-body">
				<form method="post" action="ajoutermontant.php" enctype="multipart/form-data">
											
											<div class="form-group">
											 <label >prix</label>
                                             <input type="number" step="0.001" class="form-control" name="montant" placeholder="prix par chifre" > 
							                     
                                               <label >Type de produit</label>
							                     <select  name="CE" class="form-control" placeholder="choisir type" >
							 
                                                      
		                                                    <option value='parfum'>parfum</option>
		                                                     <option value='maquillage'>maquillage</option>
		                                                     <option value='crème'>crème</option>
				                                 </select>	
											</div>
												 
												 <div class="form-group">
												 
												 <label >Boutique</label>
							                   <select  name="idOrganisme" class="form-control" >
							  
                                                  
												              				 <?php
                                                                         
                                                                         $res=$BD->query('select DISTINCT (nom) , idOrganisme from organisme');
                                                                         $don=$res->fetchAll();
                                                                         foreach($don as $lig)
                                                                          {echo"<option value=".$lig['1'].">".$lig['0']."</option>"; }
                                                                               ?>
						                     </select>
																<br>
                                             <button type="submit" class="btn btn-primary navcolor btn-block" name="ajout">Ajouter</button>
	
                                      </div>
	</form>
							</div>
											
											
						 </div>
				 </div>
			</div>
	   </div>  
	   
	   
	   
	   
	   <!--liste des produits-->
	<div class="card-body">
		<div class="table-responsive">
		<table class="table table-bordered"  width="100%" cellspacing="0">
		 <thead>
		      <tr>
		             <th>index </th>
                      <th>type</th>
                      <th>Prix</th>
                      <th>Date d'ajouter produit </th>
					  <th>Nom de boutique</th>
                      <th>Action</th>
		      </tr>
		</thead>
		 <tbody>

		 <?php
		  $query="select * from credit";
	      $stat=$BD->query($query);
	      $tabel=$stat->fetchAll();

	         foreach($tabel as $ligne)
	           {	
               echo"<tr>";
		       echo"<td>".$ligne['idCredit']."</td>";
		       echo"<td>".$ligne['type']."</td>";
		       echo"<td>".$ligne['montant']."</td>";
		       echo"<td>".$ligne['date']."</td>";
		       $quer="select * from organisme WHERE idOrganisme=". "'".$ligne['idOrganisme']."'";
	           $sta=$BD->query($quer);
	           $tabe=$sta->fetchAll();
	           foreach($tabe as $lign)
	          {
              echo"<td>".$lign['nom']."</td>";		
	          }?>
	          <td><a class="btn btn-primary btn-sm  navcolor btn-lg" href="#edit<?php echo $ligne['idCredit'];?>" data-toggle="modal"> Modifier </a>  </td>
						
						<!-- pop up  de modification-->
						<div id="edit<?php echo $ligne['idCredit']; ?>" class="modal fade" role="dialog">
						 <div class="modal-dialog modal-sm">
						 	<form method="post"  role="form">
							<div class="modal-content">
							<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
							<input type="hidden" name="idCredi" value="<?php echo $ligne['idCredit']; ?>">
							<?php
							$id=$ligne['idCredit']; 
							
									 
										   $query="select * from credit where idCredit='$id'";
										   $stat=$BD->query($query);
										   $tabel=$stat->fetchAll();
												 foreach($tabel as $ligne)
														  {
			
													   $dat=$ligne['date'];
													   $montan=$ligne['montant'];
													   $idOrg=$ligne['idOrganisme'];
														$typ=$ligne['type'];
															 }
												 $res=$BD->query("select nom   from organisme where idOrganisme='$idOrg'");
												  $don=$res->fetchAll();
														foreach($don as $lig)
																{$nomOr=$lig['0'];


														}
															
															
							?>
							<label >prix de produit</label>
                             <input type="number"  class="form-control" name="montant" value="<?php echo $montan ;?>"  step="0.001"> 
                              <label >Type de produit</label>
							 <select  name="type" class="form-control" >
							
                                      <option value="<?php echo $typ ;?>" selected><?php echo $typ ;?></option> 
							         <?php 
							         
								
									echo'<option value="maquillage">maquillage</option>';

										echo'<option value="creme">creme</option>';
								



								?>
								
								  </select>
					
					
					
					
		             	 <label >nom du boutique</label>
				          <select  name="idOrganisme" class="form-control" >
                               <option value="<?php echo $idOrg ;?>"selected> <?php echo $nomOr;?> </option>
							     <?php
				  

									   $res=$BD->query("select nom , idOrganisme from organisme where idOrganisme!='$idOrg'");
											$don=$res->fetchAll();
												foreach($don as $lig)
												  {echo"<option value=".$lig['1'].">".$lig['0']."</option>";

                                       }
                                   ?>
				           </select>

                   <div class="modal-footer">
                   <button type="submit" class="btn btn-primary navcolor btn-block" name="confirm">confirme</button>
				   </div>
           </div>	
		   </div>
		   </div>
		 </form>
						 </div>
						</div>
					
					<?php
echo"</tr>"		;
	}?>
	
		 </tbody>
		</table>
		
		                                 <!--update avec l'insersition dans l'historiques-->
								               <?php

													 $admin=$_SESSION['nom'];
													 $date=date('y-m-d');

														if (isset($_POST['confirm']))
														{
														$id=$_POST['idCredi'];
													  $type=$_POST['type'];
													  $montant=$_POST['montant'];
													  $idOrganisme=$_POST['idOrganisme'];
													$req=" UPDATE Credit SET type='".$type."',montant='".$montant."',idOrganisme='".$idOrganisme."' WHERE idCredit='$id' ";
													$BD->exec($req);
													$dt=date('Y-m-d H:i:s');
													$typeOp="Modifier";
													 $sql = "INSERT into historique (type,montant,date,idCredit,admin,typeOp)
													 VALUES ('" .$type . "','" .$montant . "','" .$dt. "','" . $id. "','".$admin."','".$typeOp."')";
													 
													 $BD->query($sql) ;

														}

	
	
                                                      ?>       
		</div>
		</div>
		</div>
	</div>
	
	
	
	    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Vous êtes prêt à déconnecter! </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
            <a class="btn btn-primary navcolor" href="deconnecter.php">Deconnexion</a>
          </div>
        </div>
      </div>
    </div>
   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
		  </body>
  </html>