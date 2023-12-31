<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 
# Cargamos la librería dompdf.
require_once 'dompdfOtro/lib/html5lib/Parser.php';
require_once 'dompdfOtro/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdfOtro/lib/php-svg-lib/src/autoload.php';
require_once 'dompdfOtro/src/Autoloader.php';
require_once 'dompdfOtro/src/FontMetrics.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
  
// reference the Dompdf namespace    
    
class contrato extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
  }

    public function index(){
      header('Access-Control-Allow-Origin: *');
      $data = [];
      $this->load->model('ContratoRH');
          if (isset($this->session->userdata['login'])) {
        $data['user'] = $this->session->userdata['login']['user'];
                    
              if ($this->session->userdata['login']['exito']) {

                $this->load->view('header', $data);
                $this->load->view('contrato', $data);
                $this->load->view('footer', $data);
              } else {
                  $this->load->view('login');
            }
          } else {
              $this->load->view('login');
      }
    }
    
    
    public function ReporteContrato(){
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
      $idsalario=$this->input->get('idsalario');
      $idrepresentante=$this->input->get('idrepresentante');
      $idhorario=$this->input->get('idhorario');
      $idempleado=$this->input->get('idempleado');
      $idempresa=$this->input->get('idempresa');
      $iddescanso=$this->input->get('iddescanso');   
      $idComida=$this->input->get('idComida');       
      $idNacionalidad=$this->input->get('idNacionalidad');  
      $idrazon=$this->input->get('idrazon');         

      
      // echo $NoSemana.$anio.$departamento.$noempleado;
      if (empty($idsalario)){
        $idsalario=null;
       }if (empty($idrepresentante)){
        $idrepresentante=null;
       }if (empty($idhorario)){
        $idhorario=null;
       }if (empty($idempleado)){
        $idempleado=null;
       }if (empty($idempresa)){
        $idempresa=null;
       }if (empty($iddescanso)){
        $iddescanso=null;
       }if (empty($idComida)){
        $idComida=null;
       }if (empty($idrazon)){
        $idrazon=null;
       }if (empty($idNacionalidad)){
        $idNacionalidad=null;
       }
       $this->load->model('ContratoRH');

       ///////***COMPROBAR SI EL; EMPLEADO EXISTE */
       try{
       $existe=$this->ContratoRH->ConsultaEmpleadoIDCount($idempleado);
       $existe= $existe[0]['empleado_id'] ;
      } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }

       if($existe==0){
         echo 'El empleado no existe o es de otra planta, favor de revisar correctamente la informacion';
       }else
       {        
        try {
            $data =$this->ContratoRH->consulta($idsalario,$idrepresentante,$idhorario,$idempleado,$idempresa,$iddescanso,$idComida,$idNacionalidad,$idrazon);     

            $dompdf = new Dompdf(array('isPhpEnabled' => true));   
            $ExisteEmpleado='';       
          try{
            $ExisteEmpleado=$data[0]['NOMBRE'];
          }
          catch (Exception $e) {
            echo 'El empleado no existe ó Revisa la dirección de el empleado la ciudad y el estado'.$e->getMessage();

          }
            if ($ExisteEmpleado!='' && $data[0]['BENEFICIARIO']=='' ) {
              echo 'El empleado '.$data[0]['NOMBRE'].' si existe pero necesita mas información ejemplo: "EDOCIVIL","DIRECCION","IMSS","RFC","CURP","BENEFICIARIO" ';
            }
            else  if($ExisteEmpleado!=''){
              $REPRESENTANTE=$data[0]['REPRESENTANTE'];
              $EMPRESA=$data[0]['EMPRESA'];
              $RAZONSOCIAL=$data[0]['RAZONSOCIAL'];
              $EDOCIVIL=$data[0]['EDOCIVIL'];
              $NOTARIO=$data[0]['NOTARIO'];
              $NOMBRE=$data[0]['NOMBRE'];
              $DIRECCION=$data[0]['DIRECCION'];
              $IMSS=$data[0]['IMSS'];
              $RFC=$data[0]['RFC'];
              $CURP=$data[0]['CURP'];
              $PUESTO=$data[0]['PUESTO'];
              $DIRECCIONEMPRESA=$data[0]['DIRECCIONEMPRESA'];
              $HORARIOCONTRATO=$data[0]['HORARIOCONTRATO'];
              $SALARIO=$data[0]['SALARIO'];
              $DESCRIPCIONSALARIO=$data[0]['DESCRIPCIONSALARIO'];
              $DESCANSO=$data[0]['DESCANSO'];
              $FECHAANTIGUEDAD=$data[0]['FECHAANTIGUEDAD'];
              $FECHAIMPRESION=$data[0]['FECHAIMPRESION'];            
              $BENEFICIARIO=$data[0]['BENEFICIARIO'];
              $COMIDA=$data[0]['COMIDA'];              
              $FECHA_INGRESO=$data[0]['FECHA_INGRESO'];   
              $NACIONALIDAD=$data[0]['NACIONALIDAD'];            
              $EDAD=$data[0]['EDAD'];                
                        
              $fechaactual = getdate();
              $FECHAHOY=" $fechaactual[year]-$fechaactual[mon]-$fechaactual[mday] ";            
              ob_start();      
              require (dirname(__DIR__, 1)."/views/ReporteContrato.php");
              $html = ob_get_contents();//$this->output->get_output();
              ob_get_clean();      
              $dompdf->loadHtml($html);
              // (Optional) Setup the paper size and orientation
              $dompdf->setPaper('Letter', 'portrait');
              // Render the HTML as PDF
              $dompdf->render();      
              // Parameters
              $x          = 505; 
              $y          = 790;
              $text       = "Página {PAGE_NUM} de {PAGE_COUNT}";     
              $font       = $dompdf->getFontMetrics()->get_font('Helvetica', 'normal');   
              $size       = 10;    
              $color      = array(0,0,0);
              $word_space = 0.0;
              $char_space = 0.0;
              $angle      = 0.0;
        
              $dompdf->getCanvas()->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);      
              // Output the generated PDF to Browser
              $dompdf->stream("ReporteContrato.pdf", array("Attachment"=>false));   
          }else{
            echo 'El empleado no existe';
          }
        } catch (Exception $e) {
          echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
       }    
    }

    public function consultaSalario(){
          header('Access-Control-Allow-Origin: *');
          $this->load->model('ContratoRH');
          $data = $this->ContratoRH->consultaSalario();
          echo json_encode($data);
    }



    function consultaRazon(){
      header('Access-Control-Allow-Origin: *');
          $this->load->model('ContratoRH');
          $result =$this->ContratoRH->consultaRazon();          
          echo json_encode($result);
      }
  

    public function ConsultaComida(){
      header('Access-Control-Allow-Origin: *');
      $this->load->model('ContratoRH');
      $data = $this->ContratoRH->ConsultaComida();
      echo json_encode($data);
    }
    
    public function ConsultaNacionalidad(){
      header('Access-Control-Allow-Origin: *');
      $this->load->model('ContratoRH');
      $data = $this->ContratoRH->ConsultaNacionalidad();
      echo json_encode($data);
    }
    public function consultaRepresentante(){
      header('Access-Control-Allow-Origin: *');
      $this->load->model('ContratoRH');
      $data = $this->ContratoRH->consultaRepresentante();
      echo json_encode($data);
    }

    public function ConsultaHorarioContrato(){
      header('Access-Control-Allow-Origin: *');
      $this->load->model('ContratoRH');
      $data = $this->ContratoRH->ConsultaHorarioContrato();
      echo json_encode($data);
    }

    public function ConsultaDescanso(){
      header('Access-Control-Allow-Origin: *');
      $this->load->model('ContratoRH');
      $data = $this->ContratoRH->ConsultaDescanso();
      echo json_encode($data);
    }
}
?>
