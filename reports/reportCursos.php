<?php
session_start();


//PASO 1: 

require_once '../libs/vendor/autoload.php';

//Invocamos al MODELO ya que este nos facilitará los datos 
//estos datos deberán ser RENDERIZADOS en el mismo reporte y NO traerlos desde CONTROLLER
require_once '../model/Curso.php';
$curso = new Curso();

//PASO 2: (Namespace)
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Html2PdfException;
use Spipu\Html2Pdf\ExceptionFormatter;

//PASO 3: Manejador de excepciones
try{

  //PASO 4: Iniciar un objeto (Finaliza en el paso 6)
  ob_start();

  //Configurando estilos
  $data = "
    <style>
      h1 { text-align: center; }
      table { width: 100%; border-collapse: collapse; }
      td, th { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
  ";
  
  //PASO 5: Contenido a exportar
  
  $data .= "<h1>Lista de Cursos</h1>";

  //Creando cabecera de la tabla
  $data .= "
    <table>

      <colgroup>
        <col style='width:5%'>
        <col style='width:25%'>
        <col style='width:20%'>
        <col style='width:10%'>
        <col style='width:10%'>
        <col style='width:10%'>
        <col style='width:10%'>
        <col style='width:10%'>
      </colgroup>

      <thead>
        <tr>
          <th>ID</th>
          <th>Curso</th>
          <th>Fecha de registro</th>
          <th>Duracion (minutos)</th>
          <th>Opiniones</th>
          <th>Estrellas</th>
          <th>Maximo</th>
          <th>Minimo</th>
        </tr>
      </thead>
  ";

  //Cuerpo de la tabla (CONTENIDO)
  $data .= "
    <tbody>
  ";

  //Aquí va el contenido dinámico
  $result = $curso->listarCursosPDF([
      "idusuario" => $_SESSION["idusuario"],
      "estado"    =>  "A"
    ]);
  if ($result){
      
    //Renderizar filas de una tabla
    foreach($result as $row){
      $data .= "
        <tr>
          <td>{$row['idcurso']}</td>
          <td>{$row['titulo']}</td>
          <td>{$row['fecharegistro']}</td>
          <td>{$row['duracion']}</td>
          <td>{$row['opiniones']}</td>
          <td>{$row['estrellas']}</td>
          <td>{$row['max']}</td>
          <td>{$row['min']}</td>
        </tr>
      ";
    }
    
  }
  //Cerramos el contenido de la tabla
  $data .= "
    </tbody>
  </table>
  ";

  $data .= "<br><strong> Usuario: </strong><span>{$_SESSION['nombres']} {$_SESSION['apellidos']}.</span>";
  $data .= ob_get_clean();

  //PASO 7: Construir el archivo PDF
  //Portrait = Vertical
  $html2pdf = new Html2Pdf('P', 'A4', 'fr');
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);
  $html2pdf->output('mi_archivo.pdf');
}
catch(Html2PdfException $e){
  //Manejador de excepciones-errores
  $html2pdf->clean();                         //Se liberan recursos
  $formatter = new ExceptionFormatter($e);    //Formatear = presentar
  echo $formatter->getHtmlMessage();          //Mostrar el error como mensaje HTML
}

?>