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
                                crm_quot_producs.stat = 1
                                and
                                crm_quot_producs.type_product = 0
                                and
                                crm_quot_producs.id_quot = '".$id_coti_creada."')
                                union
                                (select
                                crm_service.name_service as name_product,
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
                                crm_quot_producs.stat = 1
                                and
                                crm_quot_producs.type_product = 1
                                and
                                crm_quot_producs.id_quot = '".$id_coti_creada."')
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
          <option value="<?php echo $value['price_hour']?>" <?php if($value['price_hour']==$value['type']){ echo 'selected';} ?>>Precio Normal</option>
          <option value="<?php echo $value['price_day']?>" <?php if($value['price_day']==$value['type']){ echo 'selected';} ?>>Precio Flag</option>
          <option value="<?php echo $value['price']?>" <?php if(0==$value['type']){ echo 'selected';} ?>>Precio Fijo</option>
        <?php }else{ ?>
        <option value="<?php echo $value['price_hour']?>" <?php if($value['price_hour']==$value['type']){ echo 'selected';} ?>>Hora</option>
        <option value="<?php echo $value['price_day']?>" <?php if($value['price_day']==$value['type']){ echo 'selected';} ?>>Dia</option>
        <option value="<?php echo $value['price_week']?>" <?php if($value['price_week']==$value['type']){ echo 'selected';} ?>>Semana</option>
        <option value="<?php echo $value['price_mon']?>" <?php if($value['price_mon']==$value['type']){ echo 'selected';} ?>>Mes</option>
        <option value="<?php echo $value['price_year']?>" <?php if($value['price_year']==$value['type']){ echo 'selected';} ?>>Año</option>
        <option value="<?php echo $value['price']?>" <?php if(0==$value['type']){ echo 'selected';} ?>>Precio Fijo</option>
        <?php } ?>
      </select>
    </td>
    <input id="priceDetail<?php echo $value['id_tmp']?>" onkeyup=" agregar_numero_product();format(this)" value="<?php echo $value['type_detail']?>" onchange="format(this)" type="hidden" name="detail_type[]">
    <td class="tbdata"> <input id="price<?php echo $value['id_tmp']?>" value="<?php echo $value['price'] ?>" onkeyup=" agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="price[]" placeholder="Precio" autocomplete="off"> </td>
    <td class="tbdata"> <input id="canti<?php echo $value['id_tmp']?>" value="<?php echo $value['quantity'] ?>" onkeyup="agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="canti[]" value="" placeholder="Cantidad" autocomplete="off"> </td>
    <td class="tbdata"> <input id="itbms<?php echo $value['id_tmp']?>" onkeyup="agregar_numero_product();format(this)" onchange="format(this)" class="form-control" type="text" name="itbms_product[]" placeholder="ITBMS" value="<?php echo $value['itbms_product'] ?>" ></td>
    <td class="tbdata"> <input id="total_prod<?php echo $value['id_tmp']?>" class="form-control" type="text" name="total_prod[]" value="<?php echo $value['total'] ?>" placeholder="Total" readonly></td>
</tr>
<tr>
    <td class="tbdata" colspan="7"><input class="form-control" value="<?php echo $value['comentary'] ?>" name="des_pro[]" autocomplete="off" placeholder="Comentarios"></td>
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
