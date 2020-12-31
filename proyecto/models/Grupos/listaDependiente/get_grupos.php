<?php
include 'config.php';

if(!empty($_POST["id_asignatura"]))
{

  $sql = 'SELECT *
    FROM grupo AS g
    INNER JOIN grupo_has_asignaturas AS ga
    ON g.idGrupo = ga.Grupo_idGrupo
    INNER JOIN asignaturas AS a
    ON a.idAsignaturas = ga.Asignaturas_idAsignaturas
    WHERE a.idAsignaturas = '.$_POST["id_asignatura"];

  $consulta_grupos = $link->query($sql);

  echo '<hr/>';
  echo '<h5>Grups</h5>';
  echo '<table class="table table-bordered table-hover table-compact" id="dataTableGrupos" width="100%" cellspacing="0">';
  echo '<thead>';
  echo '<th style="text-align: center;">Grup</th>';
  echo '<th style="text-align: center;">Curs</th>';
  echo '<th style="text-align: center;">Eliminar</th>';
  echo '</thead>';
  echo '<tbody>';
  
  while($grupo= $consulta_grupos->fetch_object())
  {
    echo '<tr>';
    echo '<td style="text-align: center;">'.$grupo->idGrupo.'</td>';
    echo '<td style="text-align: center;">'.$grupo->Anio_inicio.'</td>'; 
    ?>
    <td style="width: 10%; text-align: center">
      <a href="#" class="btn btn-danger btn-circle" id="delGrupo" onclick="eliminarGrupo(<?php echo $_POST['id_asignatura'].', '.$grupo->idGrupo.', '.$grupo->Anio_inicio;?>)">
        <i class="fas fa-trash" aria-hidden="true"></i>
      </a>
    </td>




    <?php
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';

  echo '<script src="js/tablas/tablaGrupos.js"></script>';
}
?>
