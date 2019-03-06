<?php
    ob_start();
    session_start();
    $Reportdclass="class='active'";
    $regReportCclass="class='active'";

    include("include/config.php");
    include("include/defs.php");

    include("header.php");

    if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
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
                              cc.trade_name,
                              cc.legal_name,
                              cc.ruc,
                              cc.dv,
                              cc.address_1,
                              cc.address_2,
                              cc.phone_1,
                              cc.phone_2,
                              cc.email,
                              cct.name_contact,
                              cct.last_name,
                              cct.charge,
                              cct.email as contact_email,
                              cct.phone_1 as phone_contact,
                              cc.debt
                              from crm_customers cc inner join crm_contact cct on cc.id = cct.id_customer");?>
	<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <section class="panel panel-default">
                <header class="panel-heading">
                          <span class="h4">Lista de Clientes & contactos</span>
                </header>
                <div class="panel-body">
                  <?php
                        if(isset($message) && $message !=""){
                            echo $message;
                          }
                  ?>
                    <!--<form method="post" action="" novalidate>
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
                    </form>-->
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>MORISIDAD</th>
                              <th>NOMBRE COMERCIAL</th>
                              <th>NOMBRE LEGAL</th>
                              <th>RUC</th>
                              <th>DV</th>
                              <th>DIRECCION 1</th>
                              <th>DIRECCION 2</th>
                              <th>TELEFONO 1</th>
                              <th>TELEFONO 2</th>
                              <th>EMAIL</th>
                              <th>NOMBRE CONTACTO</th>
                              <th>CARGO</th>
                              <th>EMAIL</th>
                              <th>TELEFONO</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCran as $key => $value) {   ?>
                          <tr <?php if($value['debt'] == 1){ ?> style="color:red;" <?php } ?>>
                              <td><?php if($value['debt'] == 1){ echo "SI";}else{ echo "No"; } ?></td>
                              <td class="tbdata"> <?php echo $value['trade_name']?> </td>
                              <td class="tbdata"> <?php echo $value['legal_name']?> </td>
                              <td class="tbdata"> <?php echo $value['ruc']?> </td>
                              <td class="tbdata"> <?php echo $value['dv']?></td>
                              <td class="tbdata"> <?php echo $value['address_1']?></td>
                              <td class="tbdata"> <?php echo $value['address_2']?> </td>
                              <td class="tbdata"> <?php echo $value['phone_1']?> </td>
                              <td class="tbdata"> <?php echo $value['phone_2']?> </td>
                              <td class="tbdata"> <?php echo $value['email']?> </td>
                              <td class="tbdata"> <?php echo $value['name_contact'].' '.$value['last_name']?> </td>
                              <td class="tbdata"> <?php echo $value['charge']?></td>
                              <td class="tbdata"> <?php echo $value['contact_email']?></td>
                              <td class="tbdata"> <?php echo $value['phone_contact']?> </td>
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
