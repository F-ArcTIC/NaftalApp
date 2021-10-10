
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css" />
     <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>


</head>
<body>

<style type="text/css">
    /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

.red {
  color: red !important;
}
.green {
  color: green !important;
}
.blue {
  color: blue !important;
}
label {
    font-weight: bold;
}
a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: -250px;
    height: 100vh;
    z-index: 999;
    background: #304352;
    color: #fff;
    transition: all 0.3s;
    overflow-y: scroll;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

#sidebar.active {
    left: 0;
}

#dismiss {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    color:#292E49;
    background: #d7d2cc;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

#dismiss:hover {
    background: #292E49;
    color: #d7d2cc;
}

.overlay {
    display: none;
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 998;
    opacity: 0;
    transition: all 0.5s ease-in-out;
}
.overlay.active {
    display: block;
    opacity: 1;
}

#sidebar .sidebar-header {
    padding-top: 50px;
    padding-bottom: 0px;

}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color:  #292E49;
    background:#d7d2cc ;
    font-weight: bold;
}

#sidebar ul li.active2>a,
a[aria-expanded="true"] {
    color: #d7d2cc;
    background:  #292E49;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #292E49;
     background: initial;
    font-weight: bold;
    
}
a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
    position: absolute;
    top: 0;
    right: 0;
}
.scroll {
        margin-left: 30px;
        float: left;
        overflow-y: scroll;
        margin-bottom: 25px;
        background: #aaa;
    }

    

    .scroll::-webkit-scrollbar-track {
        border: 1px solid #000;
        padding: 2px 0;
        background-color: #404040;
    }

    .scroll::-webkit-scrollbar {
        width: 5px;
    }

    .scroll::-webkit-scrollbar-thumb {
        border-radius: 10px;
        box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #737272;
        border: 1px solid #000;
    }
    .dropdown-item{
      border-top: 1px solid #eee;
    }
</style>
    <div class="overlay"></div>      <!--Section: Intro-->



<nav id="sidebar" style="background: #d7d2cc;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #d7d2cc, #304352);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #d7d2cc, #304352); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 
        ">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <a href="#"><img src="../../photo/1200px-LogoNAFTAL.svg.png" style="height: 70px; background-size: contain!important;position: relative;  z-index: auto !important; width: 160px;"></a>
                <h3></h3>
                </div>
                                            

                   
                    <ul class="list-unstyled components" id="sidecomp">
                         <h5 style="color: #292E49;">Une Relation de Confiance</h5>
                         <br>
                         <div class="dropdown-divider"></div>
                         <br>
                        <li id="Acceuil">  
                        <a href="#pageSubmenu0" data-toggle="collapse" aria-expanded="false"><i class="fas fa-home"> </i> Accueil<i class="fas fa-angle-down" style="float: right;" id="linkcons"></i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu0" >
                        <li id="AOL" >
                            <a href="index.php" >Appel d'offre</a>
                        </li>
                        <li id="ggL">
                            <a href="index_gg.php">Gré à Gré</a>
                        </li>
                        <li class="pqL" >
                            <a href="index_pq.php">Pré-qualification </a>
                        </li>
                    
                       
                    </ul>
                </li>
                        <li id="Commissions">   
                    
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">Commissions<i class="fas fa-angle-down" style="float: right;" id="linkcom"></i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1" >
                        <li id="CVT" >
                            <a href="Décisioncvt.php" >Commission CVT</a>
                        </li>
                        <li id="CM">
                            <a href="CM.php">Commission CM</a>
                        </li>
                        <li id="COP" >
                            <a href="COP.php">Commission COP </a>
                        </li>
                    
                        <li id="CEOT" >
                            <a href="CEOT.php"> Commission CEOT</a>
                        </li>
                        <li id="adhoc" >
                            <a href="adhocPQ.php"> Commission ADHOC PQ</a>
                        </li>
        
                       
                    </ul>
                </li>
                <li id="PV">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">PVs<i class="fas fa-angle-down" style="float: right;" id="linkPV"></i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2" >
                        <li id="PVCVT" >
                            <a href="pvCvt.php" >PV CVT</a>
                        </li>
                        <li id="PVCM">
                            <a href="pvcmb.php">PV CM</a>
                        </li>
                        <li id="PVCOPt" >
                            <a href="pv_copt.php">PV COP technique </a>
                        </li>
                    
                        <li id="PVCEOT" >
                            <a href="pv_et.php"> PV CEOT</a>
                        </li>
                                                <li id="PVCOPf" >
                            <a href="pv_copf.php">PV COP financier </a>
                        </li>
                        <li id="PVPQ" >
                            <a href="pv_pq.php">PV ADHOC PQ </a>
                        </li>
        
                       
                    </ul>
                    </li>
                    <li id="membres" >
                            <a href="membres.php" >Membres</a>
                        </li>
                    <li id="Placard" >
                            <a href="Placard.php" >Placards</a>
                    </li>
                     <li id="Shortlist" >
                            <a href="Shortl.php" >Shortlist</a>
                    </li>
                                            <li id="Commissions">   
                    
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false">Bilan<i class="fas fa-angle-down" style="float: right;" id=""></i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu7" >
                        <li id="" >
                            <a href="../bilan/annulation.php" >Annulation AO et PQ</a>
                        </li>
                        <li id="">
                            <a href="../bilan/bilanGG.php">Situation contrat GG</a>
                        </li>
                        
                    
                        <li id="" >
                            <a href="../bilan/publi.php"> Publication</a>
                        </li>
                        <li id="" >
                            <a href="../bilan/traveauxCM.php"> Situation des traveaux CM</a>
                        </li>
                         <li id="" >
                            <a href="../bilan/nom_des.php"> Decisions etablies</a>
                        </li>
                        <li id="" >
                            <a href="../bilan/delai_ao.php"> Délai traitement d'appel d'offres</a>
                        </li>

        
        
                       
                    </ul>
                </li>
                    
                  </li>  
                        
                    </ul>

</nav>


            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #304352;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #d7d2cc, #304352);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #d7d2cc, #304352); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <div class="container-fluid row ">
                    
                        <div class="col-1">
                            <button type="button" id="sidebarCollapse" class="btn waves-effect" >
                                <i class="fas fa-bars"></i>
                                
                            </button>
                        </div>
                        <div class="col" >
                            <a href="#"><img src="../../photo/1200px-LogoNAFTAL.svg.png" style="height: 55px; background-size: contain!important;position: relative;  z-index: auto !important; width: 140px;"></a>
                        </div>
                        <ul class="list-inline"   style="transition: visibility 0s, opacity 0.5s linear;"
>
                        <li class="list-inline-item nav-item dropdown no-arrow mx-1" style="list-style-type: none; " >
                          <a href="notification.php"><button type="button" id="alertsDropdown" class="btn btn-outline-white btn-rounded px-2 nav-link dropdown-toggle" style="font-weight: bold; margin-right: 20px;" > <i class="fas fa-bell fa-fw fa-lg mt-0"></i> <span class="badge badge-danger badge-counter"  id="nb-notif" style="position: absolute;top: -1px;"></span></button>
                        </a>
                        </li>
                        <li style="list-style-type: none;" class="list-inline-item">
                        <div class="dropdown" style="border-left: 1px solid white; padding-left: 25px; ">
                          <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 250px;">
                                <i class="fas fa-user" style="margin-right: 10px;"></i> <?php  echo $_SESSION['username']; ?>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="width: 250px; margin-top: 20px;">
                            
                            <a class="dropdown-item" href="../../Acceuil/register.php">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Déconecter
                            </a>
                          </div>
                        </div>
                        </li>
                      </ul>

                </div>
            </nav>
<script type="text/javascript">
    $(document).ready(function() {
        $.post("get_notifications.php",{},
            function(data,status){
                if(data.nblu!=0)
                document.getElementById('nb-notif').innerHTML = data.nblu;
            },"json"); 

                                 
    });
</script>

</body>
</html>
