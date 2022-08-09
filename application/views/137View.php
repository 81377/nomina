
<meta charset="UTF-8">
<link href="assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/jquery.blockUI.js"></script>
<div class="page-wrapper">   
    <div class="container-fluid">           
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">Reporte de 137</h4> 
                <div class="card">
                    <div class="card-body">     
                        <!--<div class="table-responsive">    
                            <div class="dataTables_wrapper dt-bootstrap4">  --> 
                                <div class="row">                            
                                    <div class="col-4">
                                        <label style="font-weight: bold!important;">FechaInicio</label> 
                                        <div id="datepicker" class="input-group date" data-date-format="yyyy/mm/dd">
                                            <input id="fecha1" class="form-control" type="text" readonly />
                                            <span class="input-group-addon"><div data-icon="ei-calendar"></div></span>
                                        </div>
                                    </div>                                   
                                    <div class="col-4">
                                        <label style="font-weight: bold!important;">FechaFin</label> 
                                        <div id="datepicker2" class="input-group date" data-date-format="yyyy/mm/dd">
                                            <input id="fecha2" class="form-control" type="text" readonly />
                                            <span class="input-group-addon"><div data-icon="ei-calendar"></div></span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                                        <label style="font-weight: bold!important;"> &nbsp; </label><br> 
                                                        <button id="buscar" class="btn btn-info">
                                                        <i class="fa fa-download"></i> Descargar fichero
                                                        </button>
                                            </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                                        <label style="font-weight: bold!important;"> &nbsp; </label><br> 
                                                        <a id="descargar" class="btn btn-info"  href="http://177.244.42.94:8087/nomina/137.txt" download>
                                                            <i class="fa fa-download"></i> Descargar fichero
                                                        </a>
                                            </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12" style="text-align: -webkit-center;">
                                        <center>
                                        <div class="loadTable" style="display:none;"></div>                                        
                                        </center>
                                    </div>
                                </div>
                                <!--
                                <div class="row" id="tablaLunes">
                                    <div class="col-12">
                                        <table id="costo" class="display nowrap table table-hover table-striped table-bordered dataTable" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>CENTRO_COSTO  </th>       
                                                <th>DEPARTAMENTO  </th>
                                                <th>PLANILLA	  </th>
                                                <th>PERCEP		  </th>
                                                <th>HOREXT		  </th>
                                                <th>GRATIF		  </th>
                                                <th>INCENT		  </th>
                                                <th>PPYADE		  </th>
                                                <th>CROM		  </th>
                                                <th>TOTPER		  </th>
                                                <th>SUBEMP		  </th>
                                                <th>ISPT		  </th>
                                                <th>IMSS		  </th>
                                                <th>CAJAAHO		  </th>
                                                <th>INFONAVIT	  </th>
                                                <th>PREAHO		  </th>
                                                <th>PREEMP		  </th>
                                                <th>INTERGAS	  </th>
                                                <th>OTRASRET	  </th>
                                                <th>TOTAL		  </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr><th>CENTRO_COSTO </th>       
                                                <th>DEPARTAMENTO  </th>
                                                <th>PLANILLA	  </th>
                                                <th>PERCEP		  </th>
                                                <th>HOREXT		  </th>
                                                <th>GRATIF		  </th>
                                                <th>INCENT		  </th>
                                                <th>PPYADE		  </th>
                                                <th>CROM		  </th>
                                                <th>TOTPER		  </th>
                                                <th>SUBEMP		  </th>
                                                <th>ISPT		  </th>
                                                <th>IMSS		  </th>
                                                <th>CAJAAHO		  </th>
                                                <th>INFONAVIT	  </th>
                                                <th>PREAHO		  </th>
                                                <th>PREEMP		  </th>
                                                <th>INTERGAS	  </th>
                                                <th>OTRASRET	  </th>
                                                <th>TOTAL		  </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
-->
                           <!-- </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  



<style>
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
<script src="assets/js/137.js"></script>
<script>

    $(function () {
        $("#datepicker").datepicker({
           //endDate: '-0d',
            //showOnFocus :'true',
           // startDate: '-0d',  // ESTABLECE FECHA MINIMA HOY /// BLOQUEA DIAS ANTERIORES MINDATE minDate
           // daysOfWeekDisabled: [0,2,3,4,5, 6], 
            dateFormat: "yyyy/mm/dd",
            autoclose: true, 
            todayHighlight: true, 
            language: 'es',
        }).datepicker('update', new Date());
    });  

    $(function () {
        $("#datepicker2").datepicker({
           //endDate: '-0d',
            //showOnFocus :'true',
           // startDate: '-0d',  // ESTABLECE FECHA MINIMA HOY /// BLOQUEA DIAS ANTERIORES MINDATE minDate
           // daysOfWeekDisabled: [0,2,3,4,5, 6], 
            dateFormat: "yyyy/mm/dd",
            autoclose: true, 
            todayHighlight: true, 
            language: 'es',
        }).datepicker('update', new Date());
    });  

</script>

		
