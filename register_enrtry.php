<?php
    ob_start();
    session_start();
    $entryclass="class='active'";
    $regentryclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }
     $message="";

    if(isset($_POST['submitEntry']))
     {
        $id_type_media = $_POST['id_type_media'];
        $id_country = $_POST['id_country'];
        $date_form = $_POST['date_form'];
        $id_customer =$_POST['id_customer'];
        $id_contact = $_POST['id_contact'];
        $proyect_name = $_POST['proyect_name'];
        $work_do = $_POST['work_do'];
        $width_aprox = $_POST['width_aprox'];
        $height_aprox = $_POST['height_aprox'];
        $weight_aprox = $_POST['weight_aprox'];
        $proyect_locate = $_POST['proyect_locate'];
        $id_type_work = $_POST['id_type_work'];
        $inspection = $_POST['inspection'];

        $ifUserExist = RecCount("crm_entry", "proyect_name = '".$proyect_name."'");
        if($ifUserExist > 0)
        {
          $message = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Este proyecto ya fue registrado!</strong>
                        </div>';
        }
        else
        {
            $arrEnt = array(
                          "id_type_media" => $id_type_media,
                          "id_country" => $id_country,
                          "date_form" => $date_form,
                          "id_customer" => $id_customer,
                          "id_contact" => $id_contact,
                          "proyect_name" => $proyect_name,
                          "work_do" => $work_do,
                          "width_aprox" => $width_aprox,
                          "height_aprox" => $height_aprox,
                          "weight_aprox" => $weight_aprox,
                          "proyect_locate" => $proyect_locate,
                          "id_type_work" => $id_type_work,
                          "inspection" => $inspection,
                          "stat" => 3,
                          "log_user_register" => $_SESSION['MR_USER_ID'],
                          "log_time" => date("Y-m-d H:i:s")
                         );

          $nId = InsertRec("crm_entry", $arrEnt);

          $number_ticket = date("Y").str_pad($nId, 6, "0", STR_PAD_LEFT);

          $array_number_ticket = array("number_tickets" => $number_ticket);

          UpdateRec("crm_entry", "id=".$nId, $array_number_ticket);

          if($nId > 0)
          {
              $message = '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Entrada Registrada</strong>
                          </div>';
          }

              /* Log Seguimiento */
              $arrVal = array(
                              "id_module" => 14,
                              "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha Registrado El ingreso : ".$proyect_name.".",
                              "id_user" => $_SESSION['MR_USER_ID'],
                              "log_time" => date("Y-m-d H:i:s")
                             );

              $nId = InsertRec("log_tracing", $arrVal);
              /*  Fin Log Seguimiento */

          }
     }
?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="row">
                <div class="col-sm-12">
                	<form class="form-horizontal" data-validate="parsley" method="post" enctype="multipart/form-data">
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <span class="h4">Registro de Ingresos</span>
                        </header>
                        <div class="panel-body">
                          <?php
                                if($message !="")
                                    echo $message;
                          ?>
                          <div class="form-group required">
                              <label class="col-lg-4 text-right control-label font-bold">Medio de Comunicacion</label>
                              <div class="col-lg-4">
                                  <select class="chosen-select form-control" name="id_type_media" required="required" onChange="mostrar(this.value);">
                                    <option value="">Seleccionar</option>
                                    <?PHP
                                    $arrKindMeetings = GetRecords("Select * from crm_type_media where stat = 1");
                                    foreach ($arrKindMeetings as $key => $value) {
                                      $kinId = $value['id'];
                                      $kinDesc = $value['description'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo $kinDesc?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group required">
                              <label class="col-lg-4 text-right control-label font-bold">Pais</label>
                              <div class="col-lg-4">
                                  <select class="chosen-select form-control" name="id_country" required="required" onChange="mostrar(this.value);">
                                    <option value="">Seleccionar</option>
                                    <?PHP
                                    $arrKindMeetings = GetRecords("Select * from country where stat = 1");
                                    foreach ($arrKindMeetings as $key => $value) {
                                      $kinId = $value['id'];
                                      $kinDesc = $value['description'];
                                    ?>
                                    <option value="<?php echo $kinId?>"><?php echo $kinDesc?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Fecha</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" name="date_form" readonly>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Cliente</label>
                            <div class="col-lg-4">
                              <select class="form-control" name="id_customer" id="customer">
                                <option value="">Seleccionar</option>
                                <?PHP
                                $arrKindMeetings = GetRecords("Select * from crm_customers where stat = 1");
                                foreach ($arrKindMeetings as $key => $value) {
                                  $kinId = $value['id'];
                                  $trade_name = $value['trade_name'];
                                  $legal_name = $value['legal_name'];
                                ?>
                                <option value="<?php echo $kinId?>"><?php echo $trade_name.' '.$legal_name?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Contacto</label>
                            <div class="col-lg-4">
                              <select class="form-control"  name="id_contact" id="contact">
                                <option value="">Seleccionar</option>
                              </select>
                            </div>
                          </div>
                          <div id="date_contact">

                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Nombre del Proyecto</label>
                            <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Nombre del Proyecto" name="proyect_name" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Trabajo a Realizar</label>
                            <div class="col-lg-4">
                              <textarea class="form-control" placeholder="Trabajo a Realizar" name="work_do" required></textarea>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Distancia Horizontal Aproximada</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Distancia Horizontal Aproximada" name="width_aprox" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Altura Aproximada</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Altura Aproximada" name="height_aprox" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Peso</label>
                            <div class="col-lg-4">
                              <input type="number" step="any" class="form-control" placeholder="Peso" name="weight_aprox" required>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Ubicacion del proyecto</label>
                            <div class="col-lg-4">
                              <textarea class="form-control" placeholder="Ubicacion del proyecto" name="proyect_locate" required></textarea>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Tipo de trabajo</label>
                            <div class="col-lg-4">
                              <label class="radio-inline"><input type="radio" name="id_type_work" value="1">Por Hora</label>
                              <label class="radio-inline"><input type="radio" name="id_type_work" value="2">Por proyecto</label>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-4 text-right control-label font-bold">Se puede inspeccionar?</label>
                            <div class="col-lg-4">
                              <label class="radio-inline"><input type="radio" name="inspection" value="1">Si</label>
                              <label class="radio-inline"><input type="radio" name="inspection" value="0">No</label>
                            </div>
                          </div>
                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submitEntry" class="btn btn-primary btn-s-xs">Registrar</button>
                        </footer>
                      </section>
                    </form>
                  </div>
                </div>
            </section>
        </section>
    </section>
    <?php /* select Anidado */ ?>
    <script language="javascript" src="http://code.jquery.com/jquery-1.2.6.min.js"></script>
    <script language="javascript">
    $(document).ready(function(){
       $("#customer").change(function () {
               $("#customer option:selected").each(function () {
                customer_elegido=$(this).val();
                $.post("select_dependent.php?metodo=1", { customer_elegido: customer_elegido }, function(data){
                $("#contact").html(data);
                });
            });
       })

       $("#contact").change(function () {
               $("#contact option:selected").each(function () {
                contact_elegido=$(this).val();
                $.post("select_dependent.php?metodo=2", { contact_elegido: contact_elegido }, function(data){
                $("#date_contact").html(data);
                });
            });
       })

    });
    </script>
<?php
	include("footer.php");
?>
