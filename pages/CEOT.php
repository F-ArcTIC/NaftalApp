<?php
session_start();?><? header('Content-Type: text/html;charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Example #5</title>

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/select.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" language="javascript" src="../../js/buttons.flash.min.js"></script>

  <script type="text/javascript" src="../../js/jquery.toast.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>

</head>
<body>
  <div id="content">
      <?php include("../interfaceprojet.php"); ?>


  <div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">

                   <div></div>

                    <a href="#" style="font-weight: bold; font-size:22px">Table des Commissions CVT</a>

                    <div>
                
                        <button type="button" id="buttonAdd" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold; margin-right: 5px;" data-toggle="modal" data-target="#modalAjout" data-toggle="tooltip" data-placement="top" title="Ajouter" ><i class="fas fa-plus-circle fa-lg mt-0"></i></button>
                        <button type="button" class="btn btn-outline-white btn-rounded px-2" style="font-weight: bold;margin-right: 5px;" data-toggle="modal" data-target="#modalModif" id="buttonEdit" data-toggle="tooltip" data-placement="top" title="Modifier" ><i class="fas fa-pencil-alt fa-lg mt-0"></i></button>
                      
                      
                    </div>

                </div>
                <br><br>

                  <div class=" col-sm-4 col-md-4 col-xs-12 row" hidden>
                                            <div class="col-sm-6 col-md-6 col-xs-12"> 
                                              <label  style="position: absolute; float: right;">Type de Commission</label>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                                 
                                                    
                                                    <select class="form-control" id="type">
                                                     
                                                        <option value="CEOT">CEOT</option>  
                                                    </select>    
                                                 
                                            </div>
                    </div>
                    <br><br>

                    <!--AjoutForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
                    

                    <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Nouvelle Commission CVT ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formAdd" method="post">    
                                        <div class="row">  
                                          <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Code ">Code</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Code" required >
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="numD">N° Décision</label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="numD" autocomplete="off" required />
                                                </div>  
                                            </div> 
                                            <div class="col-sm-6 col-md-6 col-xs-12" >
                                                <div class="form-group">  
                                                    <label for="dateD">Date Décision</label> 
                                                    <input placeholder="Selected date" type="date" id="dateD" autocomplete="off" class="form-control datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="President ">President</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="President"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Juriste ">Juriste</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Juriste"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Financier ">Financier</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Financier"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="Membres ">Membres</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="Membres" required multiple>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                       

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit" id="subadd">Register </button>
                                            
                                        </div>
                                    </form>


                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>
                    <!--EDITForm %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


                    <div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div style="background: #8e9eab;  /* fallback for old browsers */
                                background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
                                background: linear-gradient(to right, #eef2f3, #8e9eab);">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Modifier Commission CVT ...</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body mx-3">
                                    <form id="formEdit" method="post">    
                                        <div class="row">  
                                          <div class="col-sm-12 col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mCode ">Code</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mCode" required >
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12" >  
                                                <div class="form-group">  
                                                    <label for="mnumD">N° Décision</label>  
                                                    <input type="text"  class="form-control" aria-describedby="inputGroupPrepend" id="mnumD" autocomplete="off" required />
                                                </div>  
                                            </div> 
                                            <div class="col-sm-6 col-md-6 col-xs-12" >
                                                <div class="form-group">  
                                                    <label for="mdateD">Date Décision</label> 
                                                    <input placeholder="Selected date" type="date" id="mdateD" autocomplete="off" class="form-control datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mPresident ">President</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mPresident"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mJuriste ">Juriste</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mJuriste"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mFinancier ">Financier</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mFinancier"required>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label  for="mMembres ">Membres</label>  
                                                    <select class="selectpicker form-control" data-live-search="true" id="mMembres" required multiple>
                                                  
                                                    </select>  
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                       

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-primary rounded-0"  type="submit">Register </button>
                                            
                                        </div>
                                    </form>

                                </div>
      
                            </div>
                        </div>
                      </div>
                    </div>
                                        
                    <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                  
 
    
 
    

                 </table>
            </div>

            </div>
    </div>

   <script type="text/javascript">
     function myFunction() {

  $('#t1').DataTable().ajax.reload();
}
   </script>
  <script type="text/javascript">
        $(document).ready(function () {
          element = document.getElementById("Commissions");
  element.classList.toggle("active2");
  $('#Commissions').on('click', function () {
     element = document.getElementById("Commissions");
  element.classList.toggle("active");
  element = document.getElementById("CVT");
  element.classList.toggle("active2");
  });
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
        var columnDefs = [{
   title: "id_c",
    data:"id_c" ,
    visible: false
  },{title: "N° / Date Décision",
    data:"N_date" 
  },{title: "N° Décision",
    data:"num_dec" ,
    visible: false
  },{title: "Date Décision",
    data:"date_dec" ,
    visible: false
  },{
    title: "Président",
    data:"president"
  },{
    title: "Juriste",
    data:"juriste"
  },{
    title: "Financier",
    data:"financier"
  },{
    title: "Membres",
    data:"membres"
  },{
    title: "Code",
    data:"code"
  }];
    function loadData() {
      type= $(type).val();
        $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_cvt.php",
            type: "POST",
            data : { type : type },
            dataSrc : "data"
        },
        columns: columnDefs,
        select: "single",
        info: "false",
            

  });
}

function rowselected () {

    var el= $('#t1').DataTable().row('.selected');
    var res=[el.data().id_c, el.data().N_date,el.data().num_dec,el.data().date_dec, el.data().president, el.data().juriste, el.data().financier,el.data().membres, el.data().code];
    //alert(el.data().Num_Placard + el.data().code+ el.data().Nature+ el.data().etat+ el.data().num_pub+ el.data().date_pub+ el.data().date_cloture);
    return res;
}
      function enableB () {

    var filas=$('#t1').DataTable().row('.selected');
    if(filas.length > 0){
      $('#buttonEdit').prop('disabled', false);
      $('#buttonview').prop('disabled', false);
    }

      if(filas.length == 0){
      $('#buttonEdit').prop('disabled', true);
      $('#buttonview').prop('disabled', true);
      }
}
$('#type').change(function(){
    var type= $(this).val();
    $('#t1').DataTable({
      "bDestroy": true,
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_adhoc.php",
            type: "POST",
            data : { type : type },
            dataSrc : "data"
        },
        columns: columnDefs,
        select: "single",
        info: "false",

            

  });
})
    </script>
     <script type="text/javascript">$(function () {
    $('#buttonAdd').tooltip();
  $('#buttonEdit').tooltip();
  
})</script>
    <script type="text/javascript">
      $(document).ready(function() {
        

  
  loadData();
  enableB();

   
                                
  
  
 var table=$('#t1').DataTable();
  $('#t1 tbody').on( 'click', 'tr', function () {
         if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
             enableB();
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        enableB();
    } );

  $('#type').change(function(){
    datatable = $("#t1").DataTable();

     var type= $("#type").val();
    
    $.post("PHP/read_cvt.php",
            {type:type},
            
            function(data,status){
   //datatable.clear().draw();
   //datatable.rows.add(data.data); // Add new data
   //datatable.columns.adjust().draw(); // Redraw the DataTable
   datatable.clear().rows.add(data.data).draw();
   },"json"); 
});
  $('#buttonAdd').click( function () {
    $('#Code').selectpicker();
                 $("#Code").html("");
                  $("#Code").selectpicker('refresh');
                $.post("PHP/get_code_com_cvt.php",
                        {},
                        
                        function(data,status){
                          if(data.success){
                            var x=0;
                            var l=data.data.length;
                             
                                $('#Code').selectpicker();
                                var html='';
                                
                                
                                for(x=0;x<l;x++) {
                                    html+='<option value="'+data.data[x].code+'">'+data.data[x].code+'</option>';
                                }
                                 
                                    $("#Code").html(html);
                                    $("#Code").selectpicker('refresh');
                                     var code=$("#Code").val();
                                      $.post("PHP/get_president.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#President').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#President").html(html)
                                                          $("#President").selectpicker('refresh');
                                              },"json");
                                      $.post("PHP/get_juriste.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Juriste').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Juriste").html(html)
                                                          $("#Juriste").selectpicker('refresh');
                                              },"json");
                                       $.post("PHP/get_financier.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Financier').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Financier").html(html)
                                                          $("#Financier").selectpicker('refresh');
                                              },"json");
                                        $.post("PHP/get_membres.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Membres').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Membres").html(html)
                                                          $("#Membres").selectpicker('refresh');
                                              },"json");
                                      }else{

                                             $('#Code').selectpicker();
                                             $("#Code").html("");
                                              $("#Code").selectpicker('refresh');

                                               $('#President').selectpicker();
                                             $("#President").html("");
                                              $("#President").selectpicker('refresh');

                                               $('#Juriste').selectpicker();
                                             $("#Juriste").html("");
                                              $("#Juriste").selectpicker('refresh');

                                               $('#Financier').selectpicker();
                                             $("#Financier").html("");
                                              $("#Financier").selectpicker('refresh');

                                               $('#Membres').selectpicker();
                                             $("#Membres").html("");
                                              $("#Membres").selectpicker('refresh');
                                            $('#numD').val('');
                                            $('#dateD').val('');

                                      }
                        },"json");
               
                $('#Code').change(function(){
                  var code=$("#Code").val();
                  $.post("PHP/get_president.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#President').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#President").html(html)
                                                          $("#President").selectpicker('refresh');
                                              },"json");
                   
                  $.post("PHP/get_juriste.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Juriste').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Juriste").html(html)
                                                          $("#Juriste").selectpicker('refresh');
                                              },"json");
                                       $.post("PHP/get_financier.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Financier').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Financier").html(html)
                                                          $("#Financier").selectpicker('refresh');
                                              },"json");
                                        $.post("PHP/get_membres.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#Membres').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          html+='<option value="'+data.data[x].id_mem+'">'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#Membres").html(html)
                                                          $("#Membres").selectpicker('refresh');
                                              },"json");
               

                 });
    });
$('#buttonEdit').click( function () {
                var res= rowselected();
        var codeA=res[8];
        document.getElementById('mnumD').value=res[2];
        document.getElementById('mdateD').value=res[3];
        var PresidentA=res[4];
        var JuristeA=res[5];
        var MembresA=res[7];
        var FinancierA=res[6];



                $.post("PHP/get_code_com_cvt.php",
                        {},
                        
                        function(data,status){
                          if(data.success){
                            var x=0;
                            var l=data.data.length;
                             
                                $('#mCode').selectpicker();
                                var html='';
                                var sel='';
                                
                                for(x=0;x<l;x++) {
                                  
                                 html+='<option value="'+data.data[x].code+ '" >'+data.data[x].code+'</option>';
                                }
                                html+='<option value="'+res[8]+'" selected >'+res[8]+'</option>';
                                    $("#mCode").html(html)
                                    $("#mCode").selectpicker('refresh');
                                     var code=$("#mCode").val();
                                      $.post("PHP/get_president.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mPresident').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                        var sel="";
                                                        if (data.data[x].mem==PresidentA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mPresident").html(html)
                                                          $("#mPresident").selectpicker('refresh');
                                              },"json");
                                      $.post("PHP/get_juriste.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mJuriste').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          var sel="";
                                                        if (data.data[x].mem==JuristeA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mJuriste").html(html)
                                                          $("#mJuriste").selectpicker('refresh');
                                              },"json");
                                       $.post("PHP/get_financier.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mFinancier').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                         var sel="";
                                                        if (data.data[x].mem==FinancierA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mFinancier").html(html)
                                                          $("#mFinancier").selectpicker('refresh');
                                              },"json");
                                        $.post("PHP/get_membres.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mMembres').selectpicker();
                                                      var html='';
                                                      var memA=MembresA.split('<br />\n');
                                                      
                                                      for(x=0;x<l;x++) { var sel=false;
                                                        for (var i =0; i<memA.length; i++) {
                                                          
                                                        if (data.data[x].mem==memA[i]) {html+='<option value="'+data.data[x].id_mem+'" '+"selected"+'>'+data.data[x].mem+'</option>';
                                                        sel=true;
                                                      }
                                                      
                                                        } if (sel==false) {html+='<option value="'+data.data[x].id_mem+'" '+""+'>'+data.data[x].mem+'</option>'}
                                                          
                                                      }
                                                       
                                                          $("#mMembres").html(html)
                                                          $("#mMembres").selectpicker('refresh');
                                              },"json");
                                      }
                        },"json");
               
                $('#mCode').change(function(){
                  var code=$("#mCode").val();
                   
                                      $.post("PHP/get_president.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mPresident').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                        var sel="";
                                                        if (data.data[x].mem==PresidentA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mPresident").html(html)
                                                          $("#mPresident").selectpicker('refresh');
                                              },"json");
                                      $.post("PHP/get_juriste.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mJuriste').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                          var sel="";
                                                        if (data.data[x].mem==JuristeA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mJuriste").html(html)
                                                          $("#mJuriste").selectpicker('refresh');
                                              },"json");
                                       $.post("PHP/get_financier.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mFinancier').selectpicker();
                                                      var html='';
                                                      
                                                      
                                                      for(x=0;x<l;x++) {
                                                         var sel="";
                                                        if (data.data[x].mem==FinancierA) sel="selected";
                                                          html+='<option value="'+data.data[x].id_mem+'" '+sel+'>'+data.data[x].mem+'</option>';
                                                      }
                                                       
                                                          $("#mFinancier").html(html)
                                                          $("#mFinancier").selectpicker('refresh');
                                              },"json");
                                        $.post("PHP/get_membres.php",
                                              {code:code},
                                              
                                              function(data,status){
                                                  var x=0;
                                                  var l=data.data.length;
                                                   
                                                      $('#mMembres').selectpicker();
                                                      var html='';
                                                      var memA=MembresA.split('<br />\n');
                                                      
                                                      for(x=0;x<l;x++) {
                                                        
                                                         html+='<option value="'+data.data[x].id_mem+'" '+'>'+data.data[x].mem+'</option>';
                                                        
                                                          
                                                      }
                                                       
                                                          $("#mMembres").html(html)
                                                          $("#mMembres").selectpicker('refresh');
                                              },"json");
                                      
               });
        
        
                
    });
  $("#formAdd").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered
               //alert(data.message);
               
                 var type = $("#type").val();
                   var code = $("#Code").val();
                   var numD = $("#numD").val();
                   var dateD = $("#dateD").val();
                    var President = $("#President").val();
                    var Juriste = $("#Juriste").val();
                    var Financier = $("#Financier").val();
                    var Membres = $("#Membres").val();

                    
                        
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/add_cvt.php",
                            {type:type, code:code, numD:numD, dateD:dateD, President:President , Juriste:Juriste
                            , Financier:Financier, Membres:Membres},
                            function(data,status){
                                if(data.success){
                                $('#modalAjout').modal('hide');
                                $('#t1').DataTable().ajax.reload();
                                $('#numD').val('');
                                            $('#dateD').val('');

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Commmission CVT bien Ajouté',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
/*
                                    document.getElementById('Code').value='';
                                    document.getElementById('objet').value='';
                                     $('#fileProjet_c').html("Choisissez un fichier");
                                      $('#filepdao').html("Choisissez un fichier");
                                      $('#fileFiche_s').html("Choisissez un fichier");
                                     
*/
                                }
                                else{
                                    $.toast({
                                heading: 'Error',
                                text: 'Commmission CVT Non Ajouté',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json"); 


               
                  
                    
                
                        
                 
   

    }));

  $("#formEdit").on('submit',(function(e) {

        e.preventDefault();  //If this method is called, the default action of the event will not be                            triggered
               //alert(data.message);
               
                 var type = $("#type").val();
                   var code = $("#mCode").val();
                   var numD = $("#mnumD").val();
                   var dateD = $("#mdateD").val();
                    var President = $("#mPresident").val();
                    var Juriste = $("#mJuriste").val();
                    var Financier = $("#mFinancier").val();
                    var Membres = $("#mMembres").val();

                    var res=rowselected();
                      var id_c=res[0];
                    
                        
                        //alert(code +"   "+ declencheur+ "   "+type+"   "+mode+"  "+objet+ "   "+pdao+"   "+Fiche_s+"  "+Projet_c );
                        $.post("PHP/edit_cvt.php",
                            {id_c:id_c,type:type, code:code, numD:numD, dateD:dateD, President:President , Juriste:Juriste
                            , Financier:Financier, Membres:Membres},
                            function(data,status){
                                if(data.success){
                                $('#modalModif').modal('hide');
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Commmission CVT bien Modifié',
                                showHideTransition: 'slide',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'success'

                            })
/*
                                    document.getElementById('Code').value='';
                                    document.getElementById('objet').value='';
                                     $('#fileProjet_c').html("Choisissez un fichier");
                                      $('#filepdao').html("Choisissez un fichier");
                                      $('#fileFiche_s').html("Choisissez un fichier");
                                     
*/
                                }
                                else{
                                    $.toast({
                                heading: 'Error',
                                text: 'Commmission CVT Non Modifié',
                                showHideTransition: 'plain',
                                hideAfter: 5000,
                                position: 'top-right',
                                icon: 'error'
                            })
                                }
                                
                            },"json"); 


               
                  
                    
                
                        
                 
   

    }));



  
});
    </script>
</body>