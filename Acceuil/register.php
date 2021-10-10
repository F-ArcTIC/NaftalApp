<?php
    
    if (version_compare(phpversion(), '5.4.0', '<')) {
         if(session_id() == '') {
            session_start();
         }
     }
     else
     {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
     }
    session_destroy();
    //header('location:login.php');  //--------changer la location ici 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Se Connecter | Naftal</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.toast.css">

  <script type="text/javascript" src="../js/jquery.toast.js"></script>


</head>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    
    body{
   background: #F1F2B5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #135058, #F1F2B5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #135058, #F1F2B5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    margin-top: 3%;
    padding: 3%;
}

.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
    width: 50px
}

.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 75%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    
    cursor: pointer;
}

.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-4 register-left">
                        <img src="../css/1200px-LogoNAFTAL.svg" alt=""/>
                        <br><br>
                        <h3 style="color: #292E49;">Une Relation de Confiance</h3>
                        <p></p>
                    </div>
                    <div  class="col-md-1 "></div>
                    <div class="col-md-7 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading" style="color: #292E49;">BIENVENUE</h3>
                                <div class=" register-form">
                                    <form id="login" method="post" action="PHP/SeConnecter.php">
                                        
                                             <?php             if(!isset($_SESSION['message'])) $_SESSION['message']="";
                                                 echo $_SESSION["message"]; ?>
                                            
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Nom d'utilisateur :</label>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control"  placeholder="" name="username" required="" id="username" autocomplete="off"> 
                                            </div>
                                        </div>
                                        <div class="form-group row" id="show_hide_password">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Mot de passe :</label>
                                            <div class="col-sm-7">
                                              <input type="password" class="form-control"  placeholder="" name="password" required id="password">
                                            </div>
                                            
                                                <a href="" style="color:#333"><i class="fa fa-eye-slash fa-lg mt-0"></i></a>
                                            
                                        </div>
                                        <br>
                                                                                
                                       <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-dark">SE CONNECTER</button>
                                        </div>
                                        <br>
                                        <a href="" id="forgot">Mot de passe oublié ?</a>
                                    </form>
                                    
                                </div>
                                    
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div id="modal1" class="modal" tabindex="-1" role="dialog">
                  <form id="form1" action="">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Mot de passe Oublié</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label>Username : </label>
                              <div class="container-fluid row">
                              <input id="Usernamef" class="form-control col-sm-12 col-md-12" type="text" name="name" value="" required>
                              
                              </div>
                           </div>
                           <div class="form-group">
                              <label>E-mail : </label>
                              <div class="container-fluid row">
                              <input id="Email" class="form-control col-sm-12 col-md-12" type="text" name="name" value="" required>
                              
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                   if($('#show_hide_password input').attr("type") == "text"){
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass( "fa-eye-slash" );
                        $('#show_hide_password i').removeClass( "fa-eye" );
                    }else if($('#show_hide_password input').attr("type") == "password"){
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass( "fa-eye-slash" );
                        $('#show_hide_password i').addClass( "fa-eye" );
                    }
                });
                     $('#forgot').on('click', function(e){
      // Reset form
                          e.preventDefault();
                          $("#modal1").modal('show');
                       });

                     $("#form1").on('submit',(function(e) {
                         e.preventDefault(); //If this method is called, the default action of the event will not be                            triggered.
                        
                        var username = $("#Usernamef").val();
                        var Email = $("#Email").val();

                        $.post("PHP/Notif_forget_pass.php",
                            {username:username, Email:Email },

                            
                            function(data,status){
                                if(data.success){
                                    $("#modal1").modal('hide');
                                    $.toast({
                                heading: 'Success',
                                text: 'Notification bien envoyer à L\'Administrateur !',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
                             } else {
                            $("#modal1").modal('hide');
                            $.toast({
                                heading: 'Error',
                                text: data.message,
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            }) 
                        }

                    });
                }));
                   /* $("#login").submit(function(e) {
                         e.preventDefault();
                         var username = $("#username").val();
                         var password = $("#password").val();
                         $.post("PHP/SeConnecter.php",
                            {password:password,username:username },

                            
                            function(data,status){

                                if (data.success) {
                             } else {
                                $("#erreur").prop('hidden',false);
                             }

                    });
                });*/
});
            </script>
            </body>