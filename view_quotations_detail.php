<?php
    ob_start();
    session_start();
    $quotclass="class='active'";
    $regquotclass="class='active'";
    include("include/config.php");
    include("include/defs.php");
    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     }

      $message="";

      $arrQuotCrate = GetRecords("select * from crm_quot where id = '".$_GET['id']."'");

      $id = $arrQuotCrate[0]['id'];
      $id_customer = $arrQuotCrate[0]['id_customer'];
      $id_contact = $arrQuotCrate[0]['id_contact'];
      $id_tikete = $arrQuotCrate[0]['id_entry'];
      $proyect_name = $arrQuotCrate[0]['proyect_name'];
      $proyect_locate = $arrQuotCrate[0]['adress_proyect'];
      $contact_site = $arrQuotCrate[0]['contact_site'];
      $description_charge = $arrQuotCrate[0]['description_charge'];
      $dimensions = $arrQuotCrate[0]['dimensions'];
      $radio_giro = $arrQuotCrate[0]['radio_giro'];
      $height = $arrQuotCrate[0]['height'];
      $weight_max = $arrQuotCrate[0]['weight_max'];
      $email = $arrQuotCrate[0]['email'];
      $perception_value_work = $arrQuotCrate[0]['perception_value_work'];
      $service_customer = $arrQuotCrate[0]['customer_service_agreement'];
      $id_entry = $arrQuotCrate[0]['id_entry'];
      $comentary = $arrQuotCrate[0]['comentary'];
      $venta_gravable = $arrQuotCrate[0]['taxable_sale'];
      $venta_no_gravable = $arrQuotCrate[0]['non_taxable_sale'];
      $itbms = $arrQuotCrate[0]['itbms'];
      $total = $arrQuotCrate[0]['total'];
      $id_seller = $arrQuotCrate[0]['id_seller'];
      $number_tickets = $arrQuotCrate[0]['number_tickets'];
      $version = $arrQuotCrate[0]['version'];
      $limit_quot = $arrQuotCrate[0]['limit_quot']; ?>

	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="row">
                <div class="col-sm-12">
                	<form class="form-horizontal" data-validate="parsley" method="post" enctype="multipart/form-data">
                      <section class="panel panel-default">
                        <header class="panel-heading">
                          <?php $numero_tikete = GetRecords("select number_tickets from crm_entry where id=".$id_tikete); ?>
                          <span class="h4">Ver detalle de Cotizacion <?php echo $numero_tikete[0]['number_tickets'].' V-'.$version; ?></span>
                        </header>
                        <div class="panel-body">
                          <?php if(isset($_GET['enviado'])){
                                $message = '<div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong>Cotizacion Enviada</strong>
                                            </div>';
                                          }

                                    if(isset($message) && $message !=""){
                                        echo $message;
                                      }?>
                          <div class="form-group required">
                              <label class="col-lg-2 text-right control-label font-bold">Cliente</label>
                              <div class="col-lg-3">
                                  <select class="form-control" disabled>
                                    <?PHP
                                    $arrCust = GetRecords("Select * from crm_customers where stat = 1 and id=".$id_customer);
                                    foreach ($arrCust as $key => $value) {
                                      $kinId = $value['id'];
                                      $legal_name = $value['legal_name'];?>
                                    <option value="<?php echo $kinId?>"><?php echo $legal_name?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Contacto</label>
                              <div class="col-lg-3">
                                  <select class="form-control" disabled>
                                    <?PHP
                                    $arrCust = GetRecords("Select * from crm_contact where stat = 1 and id=".$id_contact);
                                    foreach ($arrCust as $key => $value) {
                                      $kinId = $value['id'];
                                      $name_contact = $value['name_contact'];
                                      $last_name = $value['last_name'];?>
                                    <option value="<?php echo $kinId?>"><?php echo $name_contact.' '.$last_name;?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Tiquete</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $id_tikete; ?>" readonly>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Proyecto</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $proyect_name; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Direccion del Proyecto</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" readonly><?php echo $proyect_locate; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Contacto en el Sitio</label>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" readonly value="<?php echo $contact_site;?>">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Descripcion de la carga</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" readonly><?php echo $description_charge; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Dimenciones</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" readonly value="<?php echo $dimensions; ?>">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Radio de giro</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" readonly value="<?php echo $radio_giro; ?>">
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Altura</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" readonly value="<?php echo $height; ?>">
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Peso Maximo</label>
                            <div class="col-lg-3">
                              <input type="number" step="any" class="form-control" readonly value="<?php echo $weight_max;?>">
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Email</label>
                            <div class="col-lg-3">
                              <input class="form-control" value="<?php echo $email; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Percepcion del valor del trabajo</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" readonly><?php echo $perception_value_work; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Vendedor</label>
                            <div class="col-lg-3">
                              <select class="form-control" disabled>
                                <?PHP
                                $arrCust = GetRecords("Select * from users where stat = 1 and id=".$id_seller);
                                foreach ($arrCust as $key => $value) {
                                  $kinId = $value['id'];
                                  $real_name = $value['real_name'];
                                  $last_name = $value['last_name'];?>
                                <option value="<?php echo $kinId?>"><?php echo $real_name.' '.$last_name;?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group required">
                            <label class="col-lg-2 text-right control-label font-bold">Acuerdo de servicio al cliente</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" readonly><?php echo $service_customer; ?></textarea>
                            </div>
                            <label class="col-lg-2 text-right control-label font-bold">Limitada ?</label>
                            <div class="col-lg-3">
                              <label class="radio-inline"><input disabled type="radio" <?php if($limit_quot == 1){ echo 'checked';} ?> name="limit_quot" value="1" >Si</label>
                              <label class="radio-inline"><input disabled type="radio" <?php if($limit_quot == 2){ echo 'checked';} ?> name="limit_quot" value="2" >No</label>
                            </div>
                          </div>
                          <a href="convert_pdf.php?id=<?php echo $_GET['id']?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-pdf-o"></i> PDF</a>
                          <?php if (isset($_GET['no_send'])){ ?>

                          <?php }else{ ?>
                          <a href="mail.php?id=<?php echo $_GET['id']?>&locat_view_detail=1" class="btn btn-success btn-s-xs glyphicon glyphicon-send"> Enviar</a>
                          <?php } ?>
                          <?php ################################################################################# ?>
                          <h4>Productos</h4>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <?php if ($id_customer == 104 || $id_customer == 333): ?>
                                <th>SERIAL</th>
                                <?php endif; ?>
                                <th>TIPO</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>ITBMS</th>
                                <th>TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?PHP
                              $arrProduct = GetRecords("(select
                                                          crm_craner.name_craner as name_product,
                                                          crm_craner.serial,
                                                          crm_craner.price_hour,
                                                          crm_craner.price_day,
                                                          crm_craner.price_week,
                                                          crm_craner.price_mon,
                                                          crm_craner.price_year,
                                                          0 as price,
                                                          crm_quot_producs.id as id_tmp,
                                                          crm_quot_producs.log_time,
                                                          crm_quot_producs.type_product,
                                                          crm_quot_producs.id_produc,
                                                          crm_quot_producs.price,
                                                          crm_quot_producs.quantity,
                                                          crm_quot_producs.itbms,
                                                          crm_quot_producs.total,
                                                          crm_quot_producs.comentary,
                                                          crm_quot_producs.type,
                                                          crm_quot_producs.itbms_product,
                                                          crm_quot_producs.type_detail
                                                          from
                                                          crm_craner inner join crm_quot_producs on crm_quot_producs.id_produc = crm_craner.id
                                                          where
                                                          crm_quot_producs.stat  in (1,2,12)
                                                          and
                                                          crm_quot_producs.type_product = 0
                                                          and
                                                          crm_quot_producs.id_quot = '".$_GET['id']."')
                                                          union
                                                          (select
                                                          crm_service.name_service as name_product,
                                                          '0' as serial,
                                                          crm_service.price as price_hour,
                                                          crm_service.flag as price_day,
                                                          0 as price_week,
                                                          0 as price_mon,
                                                          0 as price_year,
                                                          crm_service.price,
                                                          crm_quot_producs.id as id_tmp,
                                                          crm_quot_producs.log_time,
                                                          crm_quot_producs.type_product,
                                                          crm_quot_producs.id_produc,
                                                          crm_quot_producs.price,
                                                          crm_quot_producs.quantity,
                                                          crm_quot_producs.itbms,
                                                          crm_quot_producs.total,
                                                          crm_quot_producs.comentary,
                                                          crm_quot_producs.type,
                                                          crm_quot_producs.itbms_product,
                                                          crm_quot_producs.type_detail
                                                          from
                                                          crm_service inner join crm_quot_producs on crm_quot_producs.id_produc = crm_service.id
                                                          where
                                                          crm_quot_producs.stat  in (1,2,12)
                                                          and
                                                          crm_quot_producs.type_product = 1
                                                          and
                                                          crm_quot_producs.id_quot = '".$_GET['id']."')
                                                          order by 8 asc");

                              foreach ($arrProduct as $key => $value) { ?>
                            <tr>
                                <td class="tbdata"> <?php echo $value['id_tmp']?></td>
                                <td class="tbdata"> <?php echo $value['name_product']?> </td>
                                <?php if ($id_customer == 104 || $id_customer == 333): ?>
                                <td class="tbdata"> <?php echo $value['serial']?> </td>
                                <?php endif; ?>
                                <td class="tbdata">
                                  <input class="form-control" type="text" value="<?php echo $value['type_detail']?>" readonly>
                                </td>
                                <td class="tbdata"> <input class="form-control" type="text" value="<?php echo $value['price']?>" readonly> </td>
                                <td class="tbdata"> <input class="form-control" type="text" value="<?php echo $value['quantity']?>" readonly> </td>
                                <td class="tbdata"> <input class="form-control" type="text" value="7" readonly> </td>
                                <td class="tbdata"> <input class="form-control" type="text" value="<?php echo $value['total'] ?>" readonly> </td>
                            </tr>
                            <tr>
                                <td class="tbdata" colspan="7"><input class="form-control" value="<?php echo $value['comentary']?>" readonly></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                          </table>
                          <h4>Servicios</h4>
                          <?php /* ?><table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CANTIDAD</th>
                                <th>PRECIO</th>
                                <th>TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?PHP
                              $arrProduct = GetRecords("SELECT
                                                        crm_quot_service.id,
                                                        crm_quot_service.quantity,
                                                        crm_quot_service.price,
                                                        crm_quot_service.total,
                                                        crm_service.name_service,
                                                        crm_quot_service.des_ser
                                                        from
                                                        crm_service inner join crm_quot_service on crm_service.id = crm_quot_service.id_service
                                                        where
                                                        crm_quot_service.id_quot = '".$_GET['id']."'");
                              foreach ($arrProduct as $key => $value) { ?>
                            <tr>
                                <td class="tbdata"> <?php echo $value['id']?></td>
                                <td class="tbdata"> <?php echo $value['name_service']?> </td>
                                <td class="tbdata"><input class="form-control" type="text" value="<?php echo $value['quantity']?>" readonly></td>
                                <td class="tbdata"><input class="form-control" type="text" value="<?php echo $value['price']?>" readonly> </td>
                                <td class="tbdata"><input class="form-control" type="text" value="<?php echo $value['total']?>" readonly> </td>
                            </tr>
                            <tr>
                                <td class="tbdata" colspan="5"><input class="form-control" value="<?php echo $value['des_ser']; ?>" readonly></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                          </table>*/ ?>
                          <?php ################################################################################# ?>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold"></label>
                            <div class="col-lg-3">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 text-right control-label font-bold">Comentarios</label>
                            <div class="col-lg-3">
                              <textarea class="form-control" style="height:150px" readonly ><?php echo $comentary; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 text-right control-label font-bold">Venta Gravable</label>
                              <div class="col-lg-3">
                                <input value="<?php echo $venta_gravable; ?>" class="form-control" style="margin:5px;" Width="70px" readonly/>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Venta no gravable</label>
                              <div class="col-lg-3">
                                <input value="<?php echo $venta_no_gravable;?>" class="form-control" style="margin:5px;" Width="70px" readonly />
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">itbms</label>
                              <div class="col-lg-3">
                                <input class="form-control" value="<?php echo $itbms; ?>" style="margin:5px;" Width="70px" readonly/>
                              </div>
                              <label class="col-lg-2 text-right control-label font-bold">Total</label>
                              <div class="col-lg-3">
                                <input readonly class="form-control" value="<?php echo $total; ?>" style="margin:5px;" Width="70px"/>
                              </div>
                            </div>
                          </div>

                          <h4>Operadores</h4>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>OPERADOR</th>
                                <th>GRUA / SERVICIO</th>
                                <th>HORAS</th>
                                <th>NOTAS</th>
                                <th>ACCION</th>
                              </tr>
                            </thead>
                            <?php $operadores = GetRecords("SELECT
                                                            cqco.id,
                                                            cqco.hour_operator,
                                                            cqco.note_operator,
                                                            c.firs_name,
                                                            c.last_name,
                                                            cc.name_craner
                                                            FROM
                                                            crm_quot_close_operator cqco INNER JOIN collaborator c on cqco.id_operator = c.id
                                                                                         INNER JOIN crm_craner cc on cqco.id_craner_service = cc.id
                                                            WHERE
                                                            cqco.stat = 1
                                                            and
                                                            cqco.id_quot =".$_GET['id']); ?>
                            <tbody>
                              <?php foreach ($operadores as $key => $value): ?>
                              <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['firs_name'].' '.$value['last_name']; ?></td>
                                <td><?php echo $value['name_craner']; ?></td>
                                <td><?php echo $value['hour_operator']; ?></td>
                                <td><?php echo $value['note_operator']; ?></td>
                                <td><!--<a href="modal-delete-operador.php?id_operador=<?php echo $value['id']?>" title="Eliminar de la lista" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-danger"><i class="glyphicon glyphicon-trash"></i>--></td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>

                        </div>
                        <footer class="panel-footer text-right bg-light lter">
                        </footer>
                      </section>
                    </form>
                  </div>
                </div>
            </section>
        </section>
    </section>
<?php
	include("footer.php");
?>
