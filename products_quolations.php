<?php
ob_start();
session_start();
$session_id = session_id();
include("include/config.php");
include("include/defs.php");

if(isset($_REQUEST['delet']) && $_REQUEST['delet'] == 1){

DeleteRec("crm_tmp_product", "id =".$_REQUEST['id']);

}elseif(isset($_REQUEST['id'],$_REQUEST['is_product'])){

/*
$arrTmpCrn = array(
                "id_session" => $session_id,
                "id_craner" => $_REQUEST['id'],
                "stat" => 1,
                "log_user_register" => $_SESSION['MR_USER_ID'],
                "log_time" => date("Y-m-d H:i:s")
               );

$nId = InsertRec("crm_tmp_craner", $arrTmpCrn);
*/

$arrTmpProd = array(
                "id_session" => $session_id,
                "id_product" => $_REQUEST['id'],
                "type_product" =>0,
                "stat" => 1,
                "log_user_register" => $_SESSION['MR_USER_ID'],
                "log_time" => date("Y-m-d H:i:s")
               );

$nId = InsertRec("crm_tmp_product", $arrTmpProd);

$arrTmpPro = GetRecords("SELECT name_craner from crm_craner where stat = 1 and id = '".$_REQUEST['id']."'");

/* Log Seguimiento */
$arrVal = array(
                "id_module" => 15,
                "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha agregado el producto ".$arrTmpPro[0]['name_craner']."",
                "id_user" => $_SESSION['MR_USER_ID'],
                "log_time" => date("Y-m-d H:i:s")
               );

$nId = InsertRec("log_tracing", $arrVal);
/*  Fin Log Seguimiento */
}elseif(isset($_REQUEST['id'],$_REQUEST['is_service'])){

  $arrTmpSer = array(
                  "id_session" => $session_id,
                  "id_product" => $_REQUEST['id'],
                  "type_product" =>1,
                  "stat" => 1,
                  "log_user_register" => $_SESSION['MR_USER_ID'],
                  "log_time" => date("Y-m-d H:i:s")
                 );

  $nId = InsertRec("crm_tmp_product", $arrTmpSer);

  $arrTmpPro = GetRecords("SELECT name_service from crm_service where stat = 1 and id = '".$_REQUEST['id']."'");

  /* Log Seguimiento */
  $arrVal = array(
                  "id_module" => 17,
                  "description" => "El usuasrio ".$_SESSION['MR_NAME']." ".$_SESSION['MR_LAST_NAME']." ha agregado el servicio ".$arrTmpPro[0]['name_service']."",
                  "id_user" => $_SESSION['MR_USER_ID'],
                  "log_time" => date("Y-m-d H:i:s")
                 );

  $nId = InsertRec("log_tracing", $arrVal);
  /*  Fin Log Seguimiento */

} ?>
<h4>Productos</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>TIPO</th>
      <th>PRECIO</th>
      <th>CANTIDAD</th>
      <th>ITBMS</th>
      <th>TOTAL</th>
      <th>ELIMINAR</th>
    </tr>
  </thead>
  <tbody>
  <?PHP
    $arrProduct = GetRecords("(select
                                crm_craner.name_craner as name_product,
                                crm_craner.price_hour,
                                crm_craner.price_day,
                                crm_craner.price_week,
                                crm_craner.price_mon,
                                crm_craner.price_year,
                                0 as price,
                                crm_tmp_product.id as id_tmp,
                                crm_tmp_product.log_time,
                                crm_tmp_product.type_product,
                                crm_tmp_product.id_product
                                from
                                crm_craner inner join crm_tmp_product on crm_tmp_product.id_product = crm_craner.id
                                where
                                crm_tmp_product.stat = 1
                                and
                                crm_tmp_product.type_product = 0
                                and
                                crm_tmp_product.id_session = '".$session_id."')
                                union
                                (select
                                crm_service.name_service as name_product,
                                crm_service.price as price_hour,
                                crm_service.flag as price_day,
                                0 as price_week,
                                0 as price_mon,
                                0 as price_year,
                                crm_service.price,
                                crm_tmp_product.id as id_tmp,
                                crm_tmp_product.log_time,
                                crm_tmp_product.type_product,
                                crm_tmp_product.id_product
                                from
                                crm_service inner join crm_tmp_product on crm_tmp_product.id_product = crm_service.id
                                where
                                crm_tmp_product.stat = 1
                                and
                                crm_tmp_product.type_product = 1
                                and
                                crm_tmp_product.id_session = '".$session_id."')
                                order by 8 asc");
    foreach ($arrProduct as $key => $value) { ?>
  <tr>
      <td class="tbdata"> <?php echo $value['id_tmp']?>
        <input type="hidden" name="id_product[]" value="<?php echo $value['id_product']?>">
        <input type="hidden" name="id_product_detail_tmp[]" value="<?php echo $value['id_tmp']?>">
      </td>
      <td class="tbdata"> <?php echo $value['name_product']?> </td>
      <td class="tbdata">
        <script type="text/javascript">
          function select_product_type<?php echo $value['id_tmp']?>(){
            var select = document.getElementById('tipo_precio<?php echo $value['id_tmp']?>');
              select.addEventListener('change',
              function(){
                var selectedOption = this.options[select.selectedIndex];
                    document.getElementById("price<?php echo $value['id_tmp']?>").value = selectedOption.value; //+ ': ' + selectedOption.text);
                    document.getElementById("priceDetail<?php echo $value['id_tmp']?>").value = selectedOption.text;
              });
          }
        </script>
        <select class="form-control" name="price_type[]" onClick="select_product_type<?php echo $value['id_tmp']?>()" id="tipo_precio<?php echo $value['id_tmp']?>">
          <option value="">Select</option>
          <?php if($value['type_product'] == 1){?>
            <option value="<?php echo $value['price_hour']?>">Precio Normal</option>
            <option value="<?php echo $value['price_day']?>">Precio Flag</option>
            <option value="0">Precio Fijo</option>
          <?php }else{ ?>
          <option value="<?php echo $value['price_hour']?>">Hora</option>
          <option value="<?php echo $value['price_day']?>">Dia</option>
          <option value="<?php echo $value['price_week']?>">Semana</option>
          <option value="<?php echo $value['price_mon']?>">Mes</option>
          <option value="<?php echo $value['price_year']?>">Año</option>
          <option value="0">Precio Fijo</option>
          <?php } ?>
        </select>
      </td>
      <input id="priceDetail<?php echo $value['id_tmp']?>" onkeyup=" agregar_numero_product();format(this)" onchange="format(this)" type="hidden" name="detail_type[]">
      <td class="tbdata"> <input id="price<?php echo $value['id_tmp']?>" onkeyup=" agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="price[]" placeholder="Precio" autocomplete="off"> </td>
      <td class="tbdata"> <input id="canti<?php echo $value['id_tmp']?>" onkeyup="agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="canti[]" value="" placeholder="Cantidad" autocomplete="off"> </td>
      <td class="tbdata"> <input id="itbms<?php echo $value['id_tmp']?>" onkeyup="agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="itbms_product[]" placeholder="ITBMS" <?php if($value['type_product'] == 1){ ?> value="0" <?php }else{ ?> value="7" <?php } ?> ></td>
      <td class="tbdata"> <input id="total_prod<?php echo $value['id_tmp']?>" class="form-control" type="text" name="total_prod[]" value="" placeholder="Total" autocomplete="off">
      <input class="form-control" type="hidden" name="type_product[]" value="<?php echo $value['type_product']?>">
      </td>
      <td>
        <a href="modal-delete_product_quot.php?id_tmp=<?php echo $value['id_tmp']?>" title=" Eliminar de la lista" data-toggle="ajaxModal" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
      </td>
  </tr>
  <tr>
      <td class="tbdata" colspan="7"><input class="form-control" name="des_pro[]" autocomplete="off" placeholder="Comentarios"></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
</table>
<script type="text/javascript">
    function agregar_numero_product() {
      var total_productos_itbms = 0;
      var itbms_acumulado = 0;
      var productos_total = 0;
      var productos_total_service = 0;
      <?php foreach ($arrProduct as $key => $value) { ?>
      var canti<?php echo $value['id_tmp']?> = parseFloat(document.getElementById("canti<?php echo $value['id_tmp']?>").value.replace(/,/g, '')) || 0;
      var price<?php echo $value['id_tmp']?> = parseFloat(document.getElementById("price<?php echo $value['id_tmp']?>").value.replace(/,/g, '')) || 0;
      var itbms<?php echo $value['id_tmp']?> = parseFloat(document.getElementById("itbms<?php echo $value['id_tmp']?>").value.replace(/,/g, '')) || 0;
      var result_multi_prod<?php echo $value['id_tmp']?> = price<?php echo $value['id_tmp']?> * canti<?php echo $value['id_tmp']?>;
      var total_itbms<?php echo $value['id_tmp']?> = (itbms<?php echo $value['id_tmp']?> * result_multi_prod<?php echo $value['id_tmp']?>) / 100;
      <?php if($value['type_product'] == 0){ ?>
      productos_total +=  result_multi_prod<?php echo $value['id_tmp']?>;
      <?php } ?>
      itbms_acumulado += total_itbms<?php echo $value['id_tmp']?>;
      <?php if($value['type_product'] == 1){ ?>
      productos_total_service +=  result_multi_prod<?php echo $value['id_tmp']?>;
      <?php } ?>
      result_multi_prod<?php echo $value['id_tmp']?>.toFixed(2);
      document.getElementById("total_prod<?php echo $value['id_tmp']?>").value = result_multi_prod<?php echo $value['id_tmp']?> + total_itbms<?php echo $value['id_tmp']?>;
      total_productos_itbms += result_multi_prod<?php echo $value['id_tmp']?> + total_itbms<?php echo $value['id_tmp']?>;
      format(document.getElementById("total_prod<?php echo $value['id_tmp']?>"));
      <?php } ?>
      document.getElementById("itbms_total_final").value = itbms_acumulado.toFixed(2);
      document.getElementById("txt4").value = total_productos_itbms.toFixed(2);
      document.getElementById("productos_total").value = productos_total.toFixed(2);
      document.getElementById("total_serv_hidden").value = productos_total_service.toFixed(2);
    }
</script>
