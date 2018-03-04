<h4>Servicios</h4>
<table class="table table-striped">
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
                              crm_service.stat = 1
                              and
                              crm_quot_service.stat = 1
                              and
                              crm_quot_service.id_quot = '".$id_coti_creada."'");
    foreach ($arrProduct as $key => $value) { ?>
  <tr>
      <td class="tbdata"> <?php echo $value['id']?> <input type="hidden" name="id_service[]" value="<?php echo $value['id']?>"></td>
      <td class="tbdata"> <?php echo $value['name_service']?> </td>
      <td class="tbdata"><input  id="cant_ser<?php echo $value['id']?>" onkeyup="agregar_numero();format(this)" onchange="format(this)" type="text" name="cantidad[]" placeholder="Cantidad" value="<?php echo $value['quantity']?>" autocomplete="off"></td>
      <td class="tbdata"><input id="price_ser<?php echo $value['id']?>" onkeyup="agregar_numero();format(this)" onchange="format(this)" type="text" name="price_serv[]" value="<?php echo $value['price']?>" placeholder="Precio" autocomplete="off"> </td>
      <td class="tbdata"><input id="total_serv<?php echo $value['id']?>" type="text" name="total_sercq[]" placeholder="Total" value="<?php echo $value['total']?>"> </td>
  </tr>
  <tr>
      <td class="tbdata" colspan="5"><input class="form-control" name="des_ser[]" placeholder="Comentarios" value="<?php echo $value['des_ser']; ?>"></td>
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

    var cant_ser<?php echo $value['id']?> = parseFloat(document.getElementById("cant_ser<?php echo $value['id']?>").value.replace(/,/g, '')) || 0;
    var price_ser<?php echo $value['id']?> = parseFloat(document.getElementById("price_ser<?php echo $value['id']?>").value.replace(/,/g, '')) || 0;


    var result_multi_ser<?php echo $value['id']?> = cant_ser<?php echo $value['id']?> * price_ser<?php echo $value['id']?>;
    //console.log(TextBox1 + "__" + TextBox2 + "__" + TextBox3 + "__" + result);
    result_multi_ser<?php echo $value['id']?>.toFixed(2);
    document.getElementById("total_serv<?php echo $value['id']?>").value = result_multi_ser<?php echo $value['id']?>;

    total_services += result_multi_ser<?php echo $value['id']?>;

    // formatea el resultado para que aparezca igual que los otros numeros
    format(document.getElementById("total_serv<?php echo $value['id']?>"));

    <?php } ?>

    document.getElementById("total_serv_hidden").value = total_services;

    }
</script>
