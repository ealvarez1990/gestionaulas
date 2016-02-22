<?php
require './clases/AutoCarga2.php';
$bd = new BaseDatos();
$modeloReserva = new ManageReserva($bd);
$modeloAula = new ManageAula($bd);
$objetos = $modeloReserva->getList();
$objetos2 = $modeloAula->getList();
$fecha = new Fecha();
$fecha->setFecha(date('d'), date('m'), 2016);
//TABLA
$arrayhoras = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '15:00', '16:00', '17:00', '18:00', '19:00', "20:00"];
$aulaVer = Request::req("idaula");
if ($aulaVer == "") {
    $aulaVer = -1;
}
$fecha->addFecha(Request::req("oculto"));
$modelousuario = new ManageUser($bd);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-calendar fa-fw"></i>Tabla de Reservas
                <span id="mensajereservas"></span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form method="GET" >
                    <div class="col col-lg-4">
                        <input type="hidden" name="oculto" value="<?php echo intval(Request::req("oculto")); ?>">
                        <input type="hidden" name="idaula" value="<?php echo $aulaVer; ?>">
                        <label>Selecciona un aula para ver las reservas: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select id="pistasListaT" name="idaula">
                        <?php foreach ($objetos2 as $indice => $objeto2) { ?>
                                <option value="<?php echo $objeto2->getIdaula(); ?>"                                                                    
                                    <?php if ($objeto2->getIdaula() == "12") { echo "selected"; } ?> >
                                    <?php echo $objeto2->getNombreaula(); ?>
                                </option> <?php } ?>     
                        </select>
                    </div>
                    <div class="col col-lg-8">
                         <input class="button btn btn-info col-lg-3 responsive" type="submit"  value="SELEECCIONAR">
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col col-lg-8">
                        <h2><?php echo $modeloAula->get(Request::req("idaula"))->getNombreaula(); ?></h2>
                    </div>
                </div>
                <br>
                <div class="dataTable_wrapper">
                    <button class="button btn btn-warning col-lg-12 responsive" id="actualizar">ACTUALIZAR CALENDARIO</button>
                    <table  id="dataTables-example" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <form method="GET">
                                    <input type="hidden" name="oculto" value="<?php echo intval(Request::req("oculto")); ?>" id="cuentaFecha">
                                    <input type="hidden" name="idprofesor" value="" id="email_profesor">
                                    <input type="hidden" name="aulaTabla" value="<?php echo $aulaVer; ?>">
                                    <td colspan="2" class="text-center"><button class=" btn btn-primary" type="submit" id="fm7"><i class="fa fa-arrow-circle-left"></i></button></td>
                                    <td colspan="3" class="text-center"><button class=" btn btn-primary" type="submit" id="f0"><i class="fa fa-circle"></i></button></td>
                                    <td colspan="2" class="text-center"><button class=" btn btn-primary" type="submit" id="fM7"><i class="fa fa-arrow-circle-right"></i></button></a></td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rastreaT = NULL;
                            $obj = new ObjetoTabla();
                            
                            for ($fila = 0; $fila < 13; $fila++) {//for para filas
                                if ($fila % 2 == 0) {
                                    echo'<tr class="odd gradeX">';
                                } else {
                                    echo'<tr class="even gradeC">';
                                }
                                for ($col = 0; $col < 7; $col++) {//for para columnas
                                    $fechasSemana[$col] = $fecha->getFechaDiaSemana($col + 1);
                                    //if fila cero con los dia de la semana
                                    if ($fila == 0) {
                                        echo '<th  class="container-fluid text-center">' . $fechasSemana[$col] . '</th>';
                                        //fin -- if fila cero con los dia de la semana  
                                    } else {  //aqui se crea el resto de la tabla   
                                        if (!$obj->leeBD($fechasSemana[$col], $arrayhoras[$fila - 1])) {
                                            $ocupado = false;
                                            $ocupadoTexto = "------";
                                            $estilocolor = "text-info";
                                        } else {
                                            $ocupado = true;
                                            $ocupadoTexto = "OCUPADO";
                                            $estilocolor = "text-danger";
                                        }
                                        $id = $obj->getDatosIDreserva($fechasSemana[$col], $arrayhoras[$fila - 1]);
                                        echo '<td class="emailp casilla text-center ' . $estilocolor . '" datah="' . $arrayhoras[$fila - 1] . '" dataf="' . $fechasSemana[$col] .
                                        '" datans="'.$modeloReserva->get($id)->getIdusuario().'" datap="' . $aulaVer . '" datar="' . $ocupado . '" dataid="' . $id . '" >' . $ocupadoTexto . '</td>';
                                    }
                                }
                                echo'</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>