<?php 
require_once '../dompdf/autoload.inc.php';
include '../jpgraph-4.4.1/src/jpgraph.php';
include '../jpgraph-4.4.1/src/jpgraph_line.php';
include '../jpgraph-4.4.1/src/jpgraph_bar.php';
include_once "../visualizador.php";
require '../Fpdf/fpdf.php';

$pdf = new FPDF();

// header('Content-type: application/json');
$visual = new visualizador();

date_default_timezone_set("America/Guayaquil");

$date = date("Y-m-dH-i-s");
$fecha_sola = date("Y-m-d");


if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['reporte'])){
    $datos = array();
    $inicio = $_GET['inicio']." 00:00:00";
    $fin = $_GET['fin']." 23:59:59";
    $ydata = array();
    $xdata = array();

$config = $visual->obtener_configuracion($inicio, $fin);

$contador = 0;
$anterior = "";

if ($config->rowCount()){
    while ($row = $config->fetch(PDO::FETCH_ASSOC)){
        $dia = $row['dia'];
        $mes = $row['mes'];
        $anio = $row['anio'];

        if($anterior == ""){
            $anterior = "".$dia."/".$mes."/".$anio."";
            if("".$dia."/".$mes."/".$anio."" == $anterior){
                $contador += 1;
            }else{
                array_push($ydata, $contador);
                array_push($xdata, $anterior);
                $anterior = "".$dia."/".$mes."/".$anio."";
                $contador = 0;
                $contador += 1;
            }
        }else{
            if("".$dia."/".$mes."/".$anio."" == $anterior){
                $contador += 1;
            }else{
                array_push($ydata, $contador);
                array_push($xdata, $anterior);
                $anterior = "".$dia."/".$mes."/".$anio."";
                $contador = 0;
                $contador += 1;
            }
        }
    }
    array_push($ydata, $contador);
    array_push($xdata, $anterior);

}

// Some data


// Create the graph. These two calls are always required
$graph = new Graph(650,450,"auto");
$graph->SetScale("textint");
$graph->img->SetAntiAliasing();
$graph->xgrid->Show();

$graph->xaxis->SetTickLabels($xdata);

// Create the bar plots
$b1plot = new  BarPlot($ydata);
 
// Add it to the graph
$graph->Add ($b1plot); 

// Setup margin and titles
$graph->img->SetMargin(45,10,35,45);
$graph->title->Set("Numero de Veces de Dosificacion");
$graph->xaxis->title->Set("Cantidad");
$graph->yaxis->title->Set("Total de Veces");



// Get the handler to prevent the library from sending the
// image to the browser
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
 
// Stroke image to a file and browser
 
// Default is PNG so use ".png" as suffix
$fileName = "../src/documents/".$date.".png";
$graph->img->Stream($fileName);
 
// Send it back to browser
// $graph->img->Headers();
// $graph->img->Stream();

$fecha_random = randomDate($inicio, $fin);
$tipo_dano;
switch(rand(0,4)){
    case 1:
        $tipo_dano= "se notifico una traba en la compuerta";
        break;
    case 2:
        $tipo_dano= "se notifico falta de alimento a dosificar";
        break;
    case 3:
        $tipo_dano= "se detecto una caida de tension en el motor de apertura";
        break;
    default:
        $tipo_dano= "se notifico un fallo en el registro de dosificacion";
        break;
}


$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Image("../src/img/cerdologo.jpg",5,10,20);
$pdf->Cell(0,12,"",0,1,'R');
$pdf->Cell(0,0,"PORKINO S.A.",0,0,'C');
$pdf->Cell(0,0,$fecha_sola,0,1,'R');
$pdf->Cell(0,15,"",0,1,'R');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0,5,"REPORTE DE DOSIFICACION DE ALIMENTO",0,1,'C');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40,15,"",0,1,'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40,5,'A continuacion se encuentra el grafico de barra indicando los dias de mayor y menor dosificacion',0,2,'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40,5,'tomando en el rango de fechas '.$_GET['inicio'].' y '.$_GET['fin'],0,2,'L');
$pdf->Ln();
$pdf->Image("../src/documents/".$date.".png",20,90,0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,25,"",0,1,'R');
$pdf->Cell(40,5,"Dentro de la fecha ".$fecha_random." ".$tipo_dano." lo que produjo",0,1,'L');
$pdf->Cell(40,5,"un error poco comun en el sistema.",0,1,'L');
$pdf->Output('F', "../src/documents/pdfs/".$date.".pdf", true);


if(file_exists("../src/documents/".$date.".png")){
    $item = array(
        'mensaje' => "ss",
        'nombre' => $date
    );
    array_push($datos, $item);
}else{
    $item = array(
        'mensaje' => "noel",
    );
    array_push($datos, $item);
}
printJSON($datos);

}

function error($mensaje){
    print_r(json_encode(array('mensaje' => $mensaje)));
}

function printJSON($array){
    print_r(json_encode($array));
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d', $val);
}

?>