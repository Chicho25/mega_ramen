<?php
    ob_start();
    session_start();
    $quotclass ="class='active'";
    $regquotclass ="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

     if (isset($_POST['id_tipo_nota'])) {
        $where = " and crm_notes.type_note =".$_POST['id_tipo_nota'];
     }else{
       $where ="";
     }

     ?>

	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Notas</span>
                </header>
                <div class="panel-body">
                    <form method="post" action="" novalidate>
                      <div class="row wrapper">
                        <div class="col-sm-2 m-b-xs">
                          <div class="input-group">
                              <select class="chosen-select form-control" name="id_tipo_nota">
                                <option value="">--------Tipos de nota-------</option>
                                <option value="1">Nota</option>
                                <option value="2">Llamada</option>
                                <option value="3">Recordatorio</option>
                              </select>
                            </div>
                          </div>
                          <?php /* ?>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                            </div>
                          </div>
                          <div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                              <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                            </div>
                          </div> */ ?>
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
                              <th>FECHA DE REGISTRO</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>TIPO DE NOTA</th>
                              <th>CONTENIDO</th>
                              <th># TIQUETE</th>
                              <th>FECHA DE RECORDATORIO</th>
                              <th>REGISTRADO POR</th>
                              <th>ACIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $arrEntry = GetRecords("SELECT
                                                      crm_notes.id,
                                                      crm_entry.number_tickets,
                                                      crm_entry.proyect_name,
                                                      case
                                                        when crm_notes.type_note = 1 then 'Nota'
                                                        when crm_notes.type_note = 2 then 'Llamada'
                                                        when crm_notes.type_note = 3 then 'Recordatorio'
                                                      end as tipo_nota,
                                                      crm_notes.conten_note,
                                                      crm_notes.log_time,
                                                      crm_notes.remember_date,
                                                      users.real_name,
                                                      users.last_name
                                                    FROM crm_notes inner join users on crm_notes.log_user_register = users.id
                                                                   inner join crm_entry on crm_entry.id = crm_notes.id_entry
                                                    WHERE
                                                    crm_notes.id_entry =".$_GET['id']."
                                                    $where");
                            foreach ($arrEntry as $key => $value) {
                            ?>
                          <tr>
                              <td class="tbdata"> <?php echo $value['log_time']?> </td>
                              <td class="tbdata"> <?php echo $value['proyect_name']?> </td>
                              <td class="tbdata"> <?php echo $value['tipo_nota']?> </td>
                              <td class="tbdata"> <?php echo $value['conten_note']?> </td>
                              <td class="tbdata"> <?php echo $value['number_tickets']?> </td>
                              <td class="tbdata"> <?php echo $value['remember_date']?> </td>
                              <td class="tbdata"> <?php echo utf8_encode($value['real_name']).' '.utf8_encode($value['last_name'])?> </td>
                              <td>
                                <a href="modal-ver-notas.php?id=<?php echo $value['id']?>" data-toggle="ajaxModal" title="Ver nota" class="btn btn-sm btn-icon btn-info"><i class="glyphicon glyphicon-pushpin"></i></a>
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
