<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
         <?php
                $result = mysql_query($link, $query . ';') or die('Error en la consulta a la base de datos');

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['idAutor'] '</td>';
                    echo '<td>' . $row['nombre'] '</td>';
                    echo '</tr>';
                }
                mysql_close($link);
                ?>
    </tbody>
</table>