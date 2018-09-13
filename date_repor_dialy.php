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
                               DATE_FORMAT(date_register,'%d/%m/%Y') as fecha
                              from crm_report_dialy_craners group by year(date_register), month(date_register), day(date_register)");?>
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
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light" data-ride="datatables">
                          <thead>
                            <tr>
                              <th>FECHA</th>
                              <th>EDITAR</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?PHP
                            $i=1;
                            foreach ($arrCran as $key => $value) {
                            ?>
                          <tr>

                              <td class="tbdata"> <?php echo $value['fecha']?> </td>
                              <td>
                                <a href="ver_report_dialy_craners.php?fecha=<?php echo $value['fecha']?>" title="Editar Grua" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-edit (alias)"></i></a>

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
