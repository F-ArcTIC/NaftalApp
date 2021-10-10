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

</head>
<body>
	<div id="content">
		  <?php include("../interface.php"); ?>


	<div class="container-fluid table-responsive">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d7d2cc;">

                   <div></div>

                    <a href="#" style="font-weight: bold; font-size:22px">Table des demandes de Codifications</a>

                    <div>
                      
                    </div>

                </div>
                <br>

                <div id="modaledit" class="modal" tabindex="-1" role="dialog">
                  <form id="formedit" action="">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Codifier Projet</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <label>Code: </label>
                              <div class="container-fluid row">
                              <input id="numSeq" class="form-control col-sm-2 col-md-2" type="text" name="name" value="" required>
                              <span class="unit" style=" line-height: 2.3; " id="codeunit"></span>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>

                                        
                    <div class="container-fluid">
                <table id="t1" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                  
               <thead>
                    <tr>
                       <th>id</th>
                       <th>type</th>
                       <th>mode</th>
                       <th>nature</th>
                       <th>Code</th>
                       <th>Objet</th>
                       <th>Direction</th>
                       <th>Districte</th>
                       <th>PdaoName</th>
                       <th></th>
                       <th>user</th>
                    </tr>
                 </thead>
                 
                  
 
    

                 </table>
                     

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
        /*var columnDefs = [{    
    data:"numSeq" 
  },{
    data:"code"
  },{
    data:"Objet"
  },{
            title: "OK",
            "targets": -1,
            "data": null,
            "defaultContent": "<div id='tool' class='text-center'><button class='btn btn-light ' ><i class='fas fa-file-pdf fa-lg'></i></button></div>"
        }];*/
    function loadData() {
        var table= $('#t1').DataTable({
        
        "scrollX": true,
        //data: dataSet,
        ajax:{
            url : "PHP/read_projects.php",
        },
'columnDefs': [
         {
            'targets': 9,
            'data': null,
            'searchable': false,
            'orderable': false,
            'defaultContent': '<button type="button" class="btn btn-outline-success btn-edit"><i class="fas fa-check"></i></button>'
         },{
                "targets": [ 0 ],
                "searchable": false,
                "visible": false
            },{
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 3 ],
                "searchable": false,
                "visible": false
            },
            {
                "targets": [ 2 ],
                "searchable": false,
                "visible": false
            },{
                "targets": [ 10 ],
                "searchable": false,
                "visible": false
            }
      ],
      'columns': [ 
         { 'data': "id_projet" },
         { 'data': "type" },
         { 'data': "mode" },
         { 'data': "nature" },
         { 'data': "code" },
         { 'data': "objet"},
         { 'data': "districte" },
         { 'data': "direction" },
         { 'data': "pdao"  },
         { 'data': null },
         { 'data': "id_user" }
      ],
        select: "single",
        info: "false",
        stretchH: 'all',


  });
        $('#t1').on('click', '.btn-edit', function(){
      // Reset form
      $('#formedit').get(0).reset();
      
      // Store current row
      $('#modaledit').data('row', $(this).closest('tr'));
      
      // Show dialog
      $('#modaledit').modal('show');
   });
         $('#modaledit').on('shown.bs.modal', function (e){
      // Get row data
      var data = table.row($(this).data('row')).data();
      
      // Set initial data
      //$('#edit-name').val(data["code"]).focus();
      document.getElementById('codeunit').innerHTML = data["code"].substr(2);
   });
   
}

function getdata () {
       var table= $('#t1').DataTable();
      // Get row data
      var data = table.row($('#modaledit').data('row')).data();
      
      // Set initial data
      //$('#edit-name').val(data["code"]).focus();
      var res=[data["id_projet"], data["type"],data["mode"],data["nature"], data["code"], data["objet"] ,data["direction"],data["districte"],data["pdao"],data["id_user"]];
       return res;
 
   
    
 
   
}
    	
    </script>
    <script type="text/javascript">
    	$(document).ready(function() {
 
	
//TODO add some select...options column as example
  
  loadData();

  $("#formedit").on('submit',(function(e) {
         e.preventDefault(); //If this method is called, the default action of the event will not be                            triggered.
        var res=getdata();
        alert(res[9]);
        var N_seq = $("#numSeq").val();

        
                        $.post("PHP/codifier.php",
                            {N_seq:N_seq,id_projet:res[0],type:res[1], mode:res[2],nature:res[3],code:res[4], objet:res[5], pdao:res[8], id_user:res[9] },

                            
                            function(data,status){
                                if(data.success){
                                $('#modalAjout').modal('hide');
                                $('#t1').DataTable().ajax.reload();

                                   
                                    $.toast({
                                heading: 'Success',
                                text: 'Appel d\'offre Ajouté',
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
                                text: 'Appel d\'offre Non Ajouté',
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