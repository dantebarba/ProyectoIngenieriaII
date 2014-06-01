<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="" rel="shortcut icon">
 
  <title>List of Student</title><!-- Bootstrap core CSS -->
  <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include 'modalAutor.php' ?>
<body>
    <script type="text/javascript">
        $('.table-hover tr').click(function() {
            alert('Row was clicked');
        });
    </script>
  <div class="container">
    <table class="table table-hover table-bordered table-striped">
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
            
            $result = q_listAutor(5) or die('Error en la consulta a la base de datos' . mysql_error());
            while ($row = mysql_fetch_array($result)) {
               //Print out the contents of the entry 
               echo '<tr>';
               echo '<td>' . $row['idAutor'] . '</td>';
               echo '<td>' . $row['nombre'] . '</td>';
            }
            mysql_close($link);
            ?>
      </tbody>
    </table>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editarAutor">Editar Autor</button>
  </div><!-- /container -->
</body>
</html>