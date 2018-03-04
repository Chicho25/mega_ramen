<?php
ob_start();
session_start();
$session_id = session_id();
include("include/config.php");
include("include/defs.php");

if(isset($_REQUEST['service']) && $_REQUEST['service'] == 1){

DeleteRec("crm_tpm_service", "id =".$_REQUEST['id']);

}else{

$arrTmpSev = array(
                "id_session" => $session_id,
                "Id_service" => $_REQUEST['id'],
                "stat" => 1,
                "log_user_register" => $_SESSION['MR_USER_ID'],
                "log_time" => date("Y-m-d H:i:s")
               );

$nId = InsertRec("crm_tpm_service", $arrTmpSev);

$arrOneServ = GetRecords("SELECT name_service from crm_service where stat = 1 and id = '".$_REQUEST['id']."'");

/* Log Seguimiento */
$arrVal = array(
                "id_module" => 17,
                "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha agregado el Servicio ".$arrOneServ[0]['name_service']."",
                "id_user" => $_SESSION['MR_USER_ID'],
                "log_time" => date("Y-m-d H:i:s")
               );

$nId = InsertRec("log_tracing", $arrVal);
/*  Fin Log Seguimiento */
}
?>
<h4>Servicios</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CANTIDAD</th>
      <th>PRECIO</th>
      <th>TOTAL</th>
      <th>ELIMINAR</th>
    </tr>
  </thead>
  <tbody>
  <?PHP
    $arrProduct = GetRecords("SELECT
                              crm_service.*,
                              crm_tpm_service.stat as sstat,
                              crm_tpm_service.id as id_tmp
                              from
                              crm_service inner join crm_tpm_service on crm_service.id = crm_tpm_service.Id_service
                              where
                              crm_service.stat = 1
                              and
                              crm_tpm_service.stat = 1
                              and
                              crm_tpm_service.id_session = '".$session_id."'");
    foreach ($arrProduct as $key => $value) { ?>
  <tr>
      <td class="tbdata"> <?php echo $value['id']?> <input name="id_service[]" type="hidden" value="<?php echo $value['id']?>">
                                                    <input name="id_tmp_serv[]" type="hidden" value="<?php echo $value['id_tmp']?>">
      </td>
      <td class="tbdata"> <?php echo $value['name_service']?> </td>
      <td class="tbdata"><input  id="cant_ser<?php echo $value['id_tmp']?>" onkeyup="agregar_numero();format(this)" onchange="format(this)" type="text" name="cantidad[]" placeholder="Cantidad" autocomplete="off"></td>
      <td class="tbdata"><input id="price_ser<?php echo $value['id_tmp']?>" onkeyup="agregar_numero();format(this)" onchange="format(this)" type="text" name="price_serv[]" value="<?php echo $value['price']?>" placeholder="Precio" autocomplete="off"> </td>
      <td class="tbdata"><input id="total_serv<?php echo $value['id_tmp']?>" type="text" name="total_sercq[]" placeholder="Total" autocomplete="off"> </td>
      <td>
        <a href="modal-delete_service_quot.php?id_tmp=<?php echo $value['id_tmp']?>" title=" Eliminar de la lista" data-toggle="ajaxModal" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
      </td>
  </tr>
  <tr>
      <td class="tbdata" colspan="5"><input class="form-control" name="des_ser[]" placeholder="Comentarios" autocomplete="off"></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
</table>
<script type="text/javascript">
    function agregar_numero() {
    // quitas los puntos (para evitar problemas con los decimales) e inicializa a 0 si el campo esta vacio
    var total_services = 0;
    <?php foreach ($arrProduct as $key => $value) { ?>

    var cant_ser<?php echo $value['id_tmp']?> = parseFloat(document.getElementById("cant_ser<?php echo $value['id_tmp']?>").value.replace(/,/g, '')) || 0;
    var price_ser<?php echo $value['id_tmp']?> = parseFloat(document.getElementById("price_ser<?php echo $value['id_tmp']?>").value.replace(/,/g, '')) || 0;


    var result_multi_ser<?php echo $value['id_tmp']?> = cant_ser<?php echo $value['id_tmp']?> * price_ser<?php echo $value['id_tmp']?>;
    //console.log(TextBox1 + "__" + TextBox2 + "__" + TextBox3 + "__" + result);
    result_multi_ser<?php echo $value['id_tmp']?>.toFixed(2);
    document.getElementById("total_serv<?php echo $value['id_tmp']?>").value = result_multi_ser<?php echo $value['id_tmp']?>;

    total_services += result_multi_ser<?php echo $value['id_tmp']?>;

    // formatea el resultado para que aparezca igual que los otros numeros
    format(document.getElementById("total_serv<?php echo $value['id_tmp']?>"));

    <?php } ?>

    document.getElementById("total_serv_hidden").value = total_services;

    }
</script>
