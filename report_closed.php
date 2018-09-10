<?php
    ob_start();
    session_start();
    $Reportclass ="class='active'";
    $closedeportclass ="class='active'";

    if (isset($_SESSION['contact_name']) || isset($_SESSION['id_contact']) || isset($_SESSION['cliente_name']) || isset($_SESSION['id_cliente'])) {
        unset($_SESSION['contact_name']);
        unset($_SESSION['id_contact']);
        unset($_SESSION['cliente_name']);
        unset($_SESSION['id_cliente']);
    }

    include("include/config.php");
    include("include/defs.php");
    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }


       $where = "where (1=1)";

     if(isset($_POST['id_status']) && $_POST['id_status'] != "")
     {
        $where.=" and crm_entry.stat = ".$_POST['id_status']." ";
        $id_status = $_POST['id_status'];
     }
     if(isset($_POST['id_seller']) && $_POST['id_seller'] != "")
     {
        $where.=" and  crm_entry.log_user_register = '".$_POST['id_seller']."'";
        $id_seller = $_POST['id_seller'];
     }
     if(isset($_POST['date_from']) && $_POST['date_from'] != "")
     {
        $where.=" and crm_entry.date_form >= '".$_POST['date_from']."'";
        $date_from = $_POST['date_from'];
     }

     if(isset($_POST['date_to']) && $_POST['date_to'] != "")
     {
        $where.=" and crm_entry.date_form <= '".$_POST['date_to']." 23:59:59'";
        $date_to = $_POST['date_to'];
     }

    if(isset($_POST['n_tiquete']) && $_POST['n_tiquete'] != "")
    {
       $where.=" and crm_entry.number_tickets = ".$_POST['n_tiquete']."";
       $n_tiquete = $_POST['n_tiquete'];
    }

    if(isset($_POST['name_proyect']) && $_POST['name_proyect'] != "")
    {
       $where.=" and crm_entry.proyect_name like '%".$_POST['name_proyect']."%'";
       $name_proyect = $_POST['name_proyect'];
    }

       $arrEntry = GetRecords("select
                                cq.id_quot,
                                cu.number_tickets,
                                cc.legal_name,
                                cu.proyect_name,
                                cu.description_charge,
                                cu.log_time,
                                cq.date_register
                                from
                                crm_quot_close_operator cq inner join crm_quot cu on cq.id_quot = cu.id
                                						               inner join crm_customers cc on cc.id = cu.id_customer
                              $where"); ?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Reporte Trabajos Cerrados/Terminados</span>
                </header>
                <div class="panel-body">
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" class="input-s input-sm form-control" value="<?php if(isset($n_tiquete)){ echo $n_tiquete;}?>" name="n_tiquete" placeholder="# Tiquete">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" class="input-s input-sm form-control" value="<?php if(isset($name_proyect)){ echo $name_proyect;}?>" name="name_proyect" placeholder="Proyecto">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
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
                              <th># TIQUETE</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>NOMBRE CLIENTE</th>
                              <th>FECHA CREACION</th>
                              <th>FECHA CIERRE</th>
                              <th>ACIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            foreach ($arrEntry as $key => $value) {
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['number_tickets']?> </td>
                              <td class="tbdata"> <?php echo $value['proyect_name']?> </td>
                              <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                              <td class="tbdata"> <?php echo $value['log_time']?> </td>
                              <td class="tbdata"> <?php echo $value['date_register']?> </td>
                              <td>
                                <a href="view_quotations_detail.php?id=<?php echo $value['id_quot']?>&no_send=1" title="Ver Cotizacion" class="btn btn-sm btn-icon btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                              </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
              </section>
            </section>
        </section>
    </section>

<?php
	include("footer.php");
?>
