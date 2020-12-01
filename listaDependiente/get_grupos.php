<?php
include 'config.php';

if(!empty($_POST["id_asignatura"]))
{

  $sql = 'SELECT *
    FROM Grupo AS g
    INNER JOIN Grupo_has_Asignaturas AS ga
    ON g.idGrupo = ga.Grupo_idGrupo
    INNER JOIN Asignaturas AS a
    ON a.idAsignaturas = ga.Asignaturas_idAsignaturas
    WHERE a.idAsignaturas = '.$_POST["id_asignatura"];

  $consulta_grupos = $link->query($sql);

  echo '<hr/>';
  echo '<h5>Grups</h5>';
  echo '<table class="table table-bordered table-hover table-compact" width="100%" cellspacing="0">';
  echo '<thead>';
  echo '<th>Grup</th>';
  echo '<th>Curs</th>';
  echo '</thead>';
  echo '<tbody>';

  while($grupo= $consulta_grupos->fetch_object())
  {
    echo '<tr>';
    echo '<td>'.$grupo->idGrupo.'</td>';
    echo '<td>'.$grupo->Anio_inicio.'</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
}
?>
