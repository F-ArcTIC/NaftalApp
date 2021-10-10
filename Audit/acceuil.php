<?php
session_start();?>
<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="UTF-8" />
       <title>Acceuil | NAFTAL</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
 
 <script type="text/javascript" language="javascript" src="../js/jquery-3.3.1.js"></script>

<script src="../js/popper.min.js" ></script><!--dropdown menue-->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700|Lora:700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style-salal.css" />
           

<style type="text/css">
    /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

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
    background: #BBD2C5;
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
    color: #BBD2C5;
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
    padding: 20px;

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
    background:#BBD2C5 ;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #d7d2cc;
    background:  #292E49;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;sss
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
   
}

.content {
    position: absolute;
    top: 0px;
    left: 40%;
}
</style>
</head>

<body class="demo-salal">
 
<main>

    
    <div class="overlay"></div>      <!--Section: Intro-->


    <div class="wrapper">
        <!-- Sidebar  -->
        
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #304352;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #d7d2cc, #304352);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #d7d2cc, #304352); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <div class="container-fluid row ">
                    
                        
                        <div class="col" >
                            <a href=""><img src="../photo/1200px-LogoNAFTAL.svg.png" style="height: 55px; background-size: contain!important;position: relative;  z-index: auto !important; width: 140px;"></a>
                        </div>
                        <ul class="list-inline"   style="transition: visibility 0s, opacity 0.5s linear;"
>
                        
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
             <section class="content">
                <nav class="menu menu--salal">
                    
                    <a class="menu__item" href="pages/codification.php">
                        <span class="menu__item-name">Projets</span>
                    </a>
                    <a class="menu__item" href="pages/index.php">
                        <span class="menu__item-name">Appels d'Offres</span>
                    </a>
                    <a class="menu__item" href="pages/">
                        <span class="menu__item-name">Préqualifications</span>
                    </a>
                    <a class="menu__item" href="pages/">
                        <span class="menu__item-name">Grés à Grés</span>
                        <span class="menu__item-label"></span>
                    </a>
                    <a class="menu__item" href="pages/">
                        <span class="menu__item-name">Bilans</span>
                        <span class="menu__item-label"></span>
                    </a>
                </nav>
            </section>
        </div>
    </div>
           
</main>


<!--Footer-->

<!--/.Footer-->


        <script src="../js/demo.js"></script>
        <script src="../js/demo-salal.js"></script>

</body>

</html>

  