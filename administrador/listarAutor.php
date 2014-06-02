<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="" rel="shortcut icon">
 
  <title>Listado de Autores</title><!-- Bootstrap core CSS -->
  <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        var fields = ['idAutor', 'nombreAutor'];
        var item = {}; // los dict son igual a python
        $('table.table-striped tbody tr').on('click', function () {
            $(this).closest('table').find('td').removeClass('bg');
            $(this).find('td').addClass('bg');
            for (i=0; i < fields.length; i++ ) {
                item[fields[i]] = $(this).closest("tr")   // Finds the closest row <tr> 
                        .find("#"+fields[i])     // Gets a descendent with class="nr"
                        .text();
            }
         });
         //$("#openEditarAutor").click(function () {
         $(document).on("click", "#openEditarAutor", function () {
            for (i=0; i < fields.length; i++) {
                $(".modal-body #"+fields[i]).val( item[fields[i]] );
            }
           // anda okey
            //As pointed out in comments, 
            //it is superfluous to have to manually call the modal.
           // $('#addBookDialog').modal('show');
        });
       });
   </script>
  <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />
  
</head>

<?php include 'modalAutor.php' ?>
<?php include '../header.php' ?>
<body id="listarBody">
    
  <div class="container">
   <div class="row">
       <div class="col-md-2"></div> 
   <div class="col-md-8">
     <table class="table table-hover table-bordered table-striped" id="lista">
      <thead>
        <tr>
          <th>ID</th>
 
          <th>Nombre</th>
 
        </tr>
      </thead>
 
      <tbody>
        <?php
            
            include '../dbconnection.php';
            
            $link = connectdb();
            
            include '../queries.php';
            
            $i = 0;
            $id = 'row'.$i;
            
            $result = q_listAutor(5) or die('Error en la consulta a la base de datos' . mysql_error());
            while ($row = mysql_fetch_array($result)) {
               //Print out the contents of the entry 
               echo '<tr id='.$id.' tabindex='.$i.'>';
               echo '<td id='.'idAutor'.'>' . $row['idAutor'] . '</td>';
               echo '<td id='.'nombreAutor'.'>' . $row['nombre'] . '</td>';
               $i++;
            }
            mysql_close($link);
            ?>
      </tbody>
    </table>
    </div>
       <div class="col-md-2">
      <button type="button" class="btn btn-default" id="openEditarAutor" onClick="$('#editarAutor').modal('show')">Editar Autor</button> 
      </div>
   </div> <!-- /row -->
  </div><!-- /container -->
</body>
  
</html>