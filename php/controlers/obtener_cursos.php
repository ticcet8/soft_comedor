<?php
    include '../lib/ddbb.php';
    include '../models/curso.php';
    if(isset($_GET)){
        $html = "";
        $id = ($_GET["id"]-1)*4;

        $cursos = Curso::getCursosPag($id,4);
        $cantCursos = Curso::getCantCursos();
        //$html .= "<tr><td>Cant Cursos: </td><td>".$cantCursos."</td></tr>";
        $conjunto = $cantCursos / 4+1;
        foreach($cursos as $c){
            
            $html.="<tr><td>".$c->getCurso()."</td>";
            if($c->getIdcurso()==0){
                $html.=  '<td><button class="btn btn-danger" disabled>Eliminar</button></td></tr>';
                
            }else{
                $html.=  '<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarCurso" data-id="'.$c->getIdcurso().'">Eliminar</button></td></tr>';
            }
            
        }$html .="<tr class='align-middle text-center'><td>";
        for( $i = 1; $i < $conjunto; $i++ ){
            $html.='<a href="#" class="cambiarVistaCursos mx-2" data-id="'.$i.'">'.$i.'</a>'; 
        }
        $html .="</td></tr>";
        echo $html;
    }
        

?>
