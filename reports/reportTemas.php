<?php
//Session
  session_start();
  if($_GET['idcurso'] != ''){
    $_SESSION['card-row1'] = intval($_GET['idcurso']);
  }
require_once '../libs/vendor/autoload.php';

require_once '../model/Tema.php';
$tema = new Tema();

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Html2PdfException;
use Spipu\Html2Pdf\ExceptionFormatter;


try{

  ob_start();

//Estilos
  $data = "
    <style>
      h1 { text-align: center; }
      table { width: 100%; border-collapse: collapse; }
      td, th { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
  ";
  
  $data .= "<h1>Lista de Temas</h1>";
  
  $data .= "
    <table>

      <colgroup>
        <col style='width:3%'>
        <col style='width:20%'>
        <col style='width:26%'>
        <col style='width:10%'>
        <col style='width:41%'>
      </colgroup>

      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Duracion</th>
          <th>Link</th>
        </tr>
      </thead>
  ";

  $data .= "
    <tbody>
  ";

  $result = $tema->listarTemas(['idcurso' => $_SESSION['card-row1']]);
  if ($result){
      
    //Renderizar filas de una tabla
    foreach($result as $row){
      $data .= "
        <tr>
          <td>{$row['idtemas']}</td>
          <td>{$row['titulo']}</td>
          <td>{$row['descripcion']}</td>
          <td>{$row['duracion']}</td>
          <td>{$row['link']}</td>
        </tr>
      ";
    }
    
  }else{
    echo "<p>No se encontraron temas.</p>";
  }

  
  //Cerramos el contenido de la tabla
  $data .= "
    </tbody>
  </table>
  ";

  $data .= "<br><strong> Usuario: </strong><span>{$_SESSION['nombres']} {$_SESSION['apellidos']}.</span>";
  //PASO 6: Refinando contenido
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