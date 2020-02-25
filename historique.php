<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- View port : Responsive interface-->



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
			.noti{
			position:absolute;
			left:80%;
			top:0.5%}

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

  <body id="page-top">
  <?php 
  session_start();
  include("connexion.php");
  
  ?>

        
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

      <!-- Sidebar -->
          <ul class="sidebar navbar-nav navcolor">
          <li class="nav-item active">
          <a class="nav-link" href="home.php">
         
            <span>Accueil</span>
          </a>
        </li>
   
     
		
       <li class="nav-item ">
          <a class="nav-link" href="organismes.php">
       
            <span>Liste des produits</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="credit.php">
           
            <span>liste des boutiques</span></a>
        </li>
	
	<li class="nav-item">
          <a class="nav-link" href="historique.php">
      
            <span>Historique</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

 <div class="container-fluid navcolor">


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
            
              historique des produits
			  
			  
			  </div> 
 <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                  <thead>
                    <tr>

                      <th>index</th>
                      <th>type du produit</th>
                      <th>prix</th>
                      <th>Date d'historique</th>
					  <th>Type d'action</th>
                      <th>Id de l'index</th>
					  
                     
                    </tr>
                  </thead>
                
                  <tbody>
						<?php



							$query="select * from historique";
							$stat=$BD->query($query);
							$tabel=$stat->fetchAll();

							foreach($tabel as $ligne)
							{ 



								
								
								echo"<tr>";
								echo"<td>".$ligne['idH']."</td>";
								echo"<td>".$ligne['type']."</td>";
						        echo"<td>".$ligne['montant']."</td>";
								echo"<td>".$ligne['date']."</td>";
								echo"<td>".$ligne['typeOp']."</td>";

						       echo"<td>".$ligne['idCredit']."</td>";		
							
								
							
								
								echo"</tr>";
							}


						?>
                    
            
                  </tbody>
                </table>
				
              </div>
            </div>
           
          </div>
		         
        </div>
      </div>
    </div>
	
	
	
	

    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Vous êtes prêt à déconnecter!</div>
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