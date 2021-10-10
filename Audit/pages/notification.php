<?php
session_start();?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Example #5</title>

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css" />
  <link rel="stylesheet" type="text/css" href="../../css/scroller.bootstrap4.min.css">
  <link rel="stylesheet" href="../../css/jquery.toast.css">
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" language="javascript" src="../../js/jquery-3.3.1.js"></script>
  <script src="../../js/popper.min.js"></script><!--dropdown menue-->
  <script src="../../js/bootstrap.min.js" ></script>
  
 
  <script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/buttons.flash.min.js"></script>

  <script type="text/javascript" src="../../js/jquery.toast.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>

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
</head>
<style type="text/css">
  .activity-page #activities{padding-bottom:60px}.activity-page .date-header{font-weight:700!important;font-size:14px;color:#a6a6a6;padding-bottom:9px;border-bottom:1px solid #d6d6d6;margin-bottom:13px}.activity-page .daily-activities{font-size:14px;margin-bottom:30px;color:#060616}.activity-page .activities .item{position:relative;margin-bottom:4px;border-radius:4px}.activity-page .activities .item.mod-unread{background-color:rgba(38,182,182,.1)}.activity-page .activities .item.mod-unread .activity{color:#060616}.activity-page .activities .item.mod-unread:hover{background-color:rgba(38,182,182,.3)}.activity-page .activities .item:hover{background-color:#f6f6f6}.activity-page .activities .activity{padding:10px 12px;display:block;line-height:20px;color:#060616}.activity-page .activities .activity i{vertical-align:middle}.activity-page .activities .activity .contents{max-width:885px;display:inline-block;line-height:18px;margin:0 0 0 10px;vertical-align:text-top}.activity-page .activities .activity .acted-time{font-weight:700!important;font-size:10px;color:#c6c6c6;line-height:13px}.activity-page .activities .mark-read-btn{font-size:0;line-height:0;position:absolute;top:0;right:0;padding:15px 12px}.activity-page .activities .mark-read-btn:hover{cursor:pointer}.activity-page .activities .mark-read-btn:hover>i{opacity:1}.activity-page .activities .mark-read-btn>i{opacity:0}.global-pagination-wrap{font-size:0;line-height:0;max-width:940px;margin:0 auto;height:32px;text-align:center}
 </style>
<body>
    <div id="content">
      <?php include("../interface.php"); ?>




<br><br>
<div class="global-page activity-page container">
  <br>
    <div class="row" >
      <h2 class="col-7 ">Notifications :</h2>
      <div class="col-3">
        <button type="button" class="btn btn-outline-success" id="markerlu">Tout marquer comme lu</button>
      </div>
      <div class="col-2">
        <select class="form-control" id="lu">
          <option value="2">Tous</option>  
          <option value="0">Non vu</option>                                       
        </select>
      </div>
    </div>
    <br><br>
    <article id="activity">        
        
    </article>
</div>
    </div>
</div>
</div>

<script type="text/javascript">
        $(document).ready(function () {
          
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
<script type="text/javascript">
    $(document).ready(function() {
       var lu = $("#lu").val();
       var nom=0;
       var a=[];


       $("#markerlu").click(function(e){
        //Check maximum allowed input fields
        var succ=false;
        for (var i =0; i< a.length; i++) {
             $.post("marklu.php",{id_not:a[i], },
            function(data,status){
                succ=data.success;
            },"json");
        }
        
            $.toast({
                                heading: 'Success',
                                text: 'Tout a été marquer comme lu',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
        
    });


        $('#lu').on('change',function(){
            a=[];
            lu = $("#lu").val();

               $.post("get_notifications.php",{lu:lu},
            function(data,status){
                
                                nom=data.nb;
                                var x=0;
                                var html='';
                                
                                for(x=0;x<data.nb;x++) {
                                    a[x]=data.data[x].id_not;
                                    $date=data.data[x].date;
                                    $heure=data.data[x].heure;
                                    $expediteur=data.data[x].direction+" , "+data.data[x].districte;
                                    $contenu=data.data[x].contenu;
                                    $code=data.data[x].code;
                                    $email=data.data[x].email;
                                    
                                    html+='<section class="daily-activities"><header class="date-header">'+$date+'</header><ul class="activities"><li ><i ></i><p class="contents"><strong>'+$expediteur+': </strong>'+$contenu+'.<span class="acted-time"> '+$heure+'</span></p></li></ul></section>';
                                    
                                }
                                 
                                    $("#activity").html(html);
                      },"json");  
            })

        $.post("get_notifications.php",{lu:lu},
            function(data,status){
                
                                nom=data.nb;
                                var x=0;
                                var html='';
                                for(x=0;x<data.nb;x++) {
                                    a[x]=data.data[x].id_not;
                                    $date=data.data[x].date;
                                    $heure=data.data[x].heure;
                                    $expediteur=data.data[x].direction+" , "+data.data[x].districte;
                                    $contenu=data.data[x].contenu;
                                    $code=data.data[x].code;
                                    $email=data.data[x].email;
                                   
                                    html+='<section class="daily-activities"><header class="date-header">'+$date+'</header><ul class="activities"><li ><i ></i><p class="contents"><strong>'+$expediteur+': </strong>'+$contenu+'.<span class="acted-time"> '+$heure+'</span></p></li></ul></section>';
                                    
                                }
                                 
                                    $("#activity").html(html);

                      },"json");               

           

            
    });
</script>

  
</body>
</html>