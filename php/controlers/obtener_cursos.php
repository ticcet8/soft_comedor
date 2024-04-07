<?php
    include '../lib/ddbb.php';
    include '../models/curso.php';

        $html = "";
        $cursos = Curso::getCursos();
        foreach($cursos as $c){
            $html.="<tr><td>".$c->getCurso()."</td>";
            $html.=  '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarCurso" data-id="'.$c->getIdcurso().'">Eliminar</button></td></tr>';
        }
        echo $html;

?>
