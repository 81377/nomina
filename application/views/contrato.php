<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<meta charset="UTF-8">
<link href='assets/css/select2.min.css' rel='stylesheet' type='text/css'>
<script src='assets/js/select2.min.js'></script>
<link href="assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="assets/js/bootstrap-datepicker.js"></script>

<style>
    .select2-container--open .select2-dropdown--below {
    width: min-content!important;
    }
    .select2-results {
    display: block;
    width: max-content!important;
    }   
    body {
        font-size: 10px;
        font-weight: bold;
    }
    @media only screen and (min-width: 1000px) {
    .table-responsive {
        overflow-x: visible;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    }
    .table-responsive {
        overflow-x: auto;
    }
    .loadTable {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }   
</style>
<script src="assets/js/jquery.blockUI.js"></script>


<div class="page-wrapper">   
    <div class="container-fluid">           
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">Contrato</h4> 
                <div class="card">
                    <div class="card-body">     
                        <div class="table-responsive">    
                            <div class="dataTables_wrapper dt-bootstrap4"> 
                                <div class="row">                                     
                                    <div class="col-2" >
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Razon Social</label>
                                            <select class="custom-select col-12 " id="razon">
                                            </select>
                                        </div>
                                    </div>                                   
                                    <div class="col-2" >
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Área</label>
                                            <select class="custom-select col-12" id="planta">
                                            </select>
                                        </div>
                                    </div>                              
                                    <div class="col-2" >
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Salario</label>
                                            <select class="custom-select col-12" id="salario">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Representante</label>
                                            <select class="custom-select col-12" id="representante">
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Horario</label>
                                            <select class="custom-select col-12" id="horario">
                                            </select>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Descanso</label>
                                            <select class="custom-select col-12" id="descanso">
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">No Empleado</label>
                                            <input id="noempleado" type="text" class="form-control" name="msg" placeholder="escriba NoEmpleado">
                                        </div>
                                    </div> 
                                    
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">nacionalidad</label>
                                            <select class="custom-select col-12" id="nacionalidad">
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label style="font-weight: bold!important;">Comida</label>
                                            <select class="custom-select col-12" id="comida">
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-2">
                                        <div class="form-group">
                                                    <label style="font-weight: bold!important;"> &nbsp; </label><br> 
                                                    <button id="buscar" class="btn btn-info">
                                                        <i class="fa fa-search"></i> Buscar
                                                    </button>
                                        </div>
                                    </div>
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="assets/js/contrato.js"></script>




<style>
    .form-control {
    color: #67757c;
    min-height: 12px;
    display: initial;
    HEIGHT: 29PX;
    font-weight: bold;
}
   .dataTables_wrapper {
    padding-top: 10px;
    overflow: hidden;
    font-weight: bold;    
   }
   @media only screen and (min-width: 1000px) {
    .table-responsive {
        overflow-x: visible;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }
  }
  .table-responsive {
    overflow-x: auto;
    font-weight: bold;
  }
  .loadTable {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  font-weight: bold;
 }
 /* Safari */
 @-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
 }
 @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
 }


</style>