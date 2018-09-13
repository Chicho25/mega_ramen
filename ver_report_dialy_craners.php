<?php
    ob_start();
    session_start();
    $Reportdclass="class='active'";
    $regRepovrtdclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if(isset($_POST['submitCraner'])){

       if(isset($_POST['stat'])){ $stat = 1; }else{ $stat = 0; }

       $arrCran = array(
                        "price_hour" => $_POST['price_hour'],
                        "hour_work" => $_POST['hour_work'],
                        "total_day" => $_POST['total_day'],
                        "event" => $_POST['event'],
                        "descriptions_event" => $_POST['descriptions_event']);

       UpdateRec("crm_report_dialy_craners", "id = ".$_POST['id_report_di'], $arrCran);

       $message = '<div class="alert alert-success">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Registro Realizado</strong>
                   </div>';
     }

    $where = "where (1=1)";

     if(isset($_POST['name_craner']) && $_POST['name_craner'] != "")
     {
        $where.=" and  name_craner LIKE '%".$_POST['name_craner']."%'";
        $name_cr = $_POST['name_craner'];
     }
     if(isset($_POST['model']) && $_POST['model'] != "")
     {
        $where.=" and model LIKE '%".$_POST['model']."%'";
        $lname_cr = $_POST['model'];
     }


      $arrCran = GetRecords("select
                              cc.id,
                              cr.id as id_report,
                              cc.name_craner,
                              cc.model,
                              cr.price_hour,
                              cr.hour_work,
                              cr.total_day,
                              cr.stat,
                              ce.descriptions
                              from crm_craner cc left join crm_report_dialy_craners cr on cc.id = cr.id_crane
                              					left join crm_events ce on cr.event = ce.id
                              where
                              cc.id not in(34, 9)
                              and
                              DATE_FORMAT(cr.date_register,'%d/%m/%Y') = '".$_GET['fecha']."'");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Gruas</span>
                </header>
                <div class="panel-body">
                  <?php
                        if(isset($message) && $message !=""){
                            echo $message;
                          }
                  ?>
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name_cr)){ echo $name_cr;}?>" name="name_craner" placeholder="Nombre">
                          </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                            <input type="text" class="input-s input-sm form-control" value="<?php if(isset($lname_cr)){ echo $lname_cr;}?>" name="model" placeholder="Modelo">
                          </div>
                        </div>
                        <div class="col-sm-3 m-b-xs">
                          <div class="input-group">
                            <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>NOMBRE</th>
                              <th>MODELO</th>
                              <th>PRECIO POR HORA</th>
                              <th>HORAS TRABAJADAS</th>
                              <th>MOTO TOTAL</th>
                              <th>ESTATUS</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCran as $key => $value) {

                              if ($value['stat'] == '') {
                                  continue;
                              }

                              $status = ($value['stat'] == 1) ? 'Registrado' : 'No ingresasdo';
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['id']?> </td>
                              <td class="tbdata"> <?php echo $value['name_craner']?> </td>
                              <td class="tbdata"> <?php echo $value['model']?> </td>
                              <td class="tbdata"> <?php echo $value['price_hour']?> $</td>
                              <td class="tbdata"> <?php echo $value['hour_work']?></td>
                              <td class="tbdata"> <?php echo $value['total_day']?> $ </td>
                              <td class="tbdata"> <?php echo $status?> </td>
                              <td>
                              <?php if ($value['id'] == 9) {
                                    }else{ ?>
                                <a href="modal-edit-report-dialy.php?id=<?php echo $value['id_report']?>" title="Editar Grua" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>
                              <?php } ?>
                              </td>
                          </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                        </table>
                    </div>
                </div>
              </section>
            </section>
        </section>
    </section>
  <script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').show().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }104 333
  </script>
<?php
	include("footer.php");
?>
