<?php
ob_start();
session_start();
$hideLeft = true;
include("include/config.php");
include("include/defs.php");
$loggdUType = current_user_type();

include("header.php");

  if(!isset($_SESSION['MR_USER_ID']))
     {
          header("Location: index.php");
          exit;
     } ?>

 <section id="content">
         <section class="vbox">
           <section class="scrollable padder">
             <section class="panel panel-default">
               <header class="panel-heading">
                  <span class="h4">Principal</span>
               </header>
               <div class="panel-body">
                 <?php
                       if(isset($message) && $message !=""){
                           echo $message;
                         }
                 ?>
                 <div class="row">
                   <form method="post" action="" novalidate>
                     <div class="row wrapper">
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                           <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker" value="<?php if(isset($date_from)){ echo $date_from;}?>" name="date_from" placeholder="Fecha Desde">
                         </div>
                       </div>
                       <div class="col-sm-2 m-b-xs">
                         <div class="input-group">
                           <input type="text" autocomplete="off" class="input-sm input-s datepicker-input form-control datepicker" id="datepicker1" value="<?php if(isset($date_to)){ echo $date_to;}?>" name="date_to" placeholder="Fecha Hasta">
                         </div>
                       </div>
                       <div class="col-sm-3 m-b-xs">
                         <div class="input-group">
                           <span class="input-group-btn padder "><button type="submit" class="btn btn-sm btn-primary">Buscar</button></span>
                         </div>
                       </div>
                     </div>
                   </form>
                  <div class="col-sm-12">
                    <div class="panel b-a">
                      <div class="row m-n">
                        <div class="col-md-3 b-b b-r">
                          <?php /*
                          $arrUser = GetRecords("SELECT * from value_dollar order by id desc limit 1");
                          $id = $arrUser[0]['id'];
                          $value = $arrUser[0]['value_dollar']; */?>
                          <a href="modal-taza-actual.php?id=<?php /*echo $id; */ ?>" title="Cambiar la taza actual" data-toggle="ajaxModal" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-success hover-rotate"></i>
                              <i class="fa fa-usd i-1x text-white"></i>
                            </span>
                                <span class="clear">
                                <span class="h3 block m-t-xs text-success"><?php /*echo number_format($value, 2, ',', '.'); */ ?> </span>
                                <small class="text-muted text-u-c"></small>
                                </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger-lt hover-rotate"></i>
                              <i class="fa fa-money i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*
                              $arrSum = GetRecords("SELECT sum(remaining) as sum_remaining from transaction where stat in(1, 2)");

                              $sum = $arrSum[0]['sum_remaining']/$value; */ ?>

                              <span class="h3 block m-t-xs text-danger"><?php /* echo number_format($sum, 2, ',', '.'); */ ?> </span>
                              <small class="text-muted text-u-c"></small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-danger-lt hover-rotate"></i>
                              <i class="fa fa-money i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*
                              $arrSum = GetRecords("SELECT sum(remaining) as sum_remaining from transaction where stat in(1, 2)");

                              $sum = $arrSum[0]['sum_remaining'];*/ ?>

                              <span class="h3 block m-t-xs text-danger"><?php /*echo number_format($sum, 2, ',', '.');*/ ?> </span>
                              <small class="text-muted text-u-c"></small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-primary hover-rotate"></i>
                              <i class="i i-users2 i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCus = GetRecords("SELECT count(*) as con_customer from customer where stat = 1");

                                    $cust = $arrCus[0]['con_customer']; */ ?>
                              <span class="h3 block m-t-xs text-primary"><?php /*echo $cust;*/ ?></span>
                              <small class="text-muted text-u-c">Total Clientes</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction where stat in(1, 2)");

                                    $con = $arrCon[0]['con_trans']; */ ?>
                              <span class="h3 block m-t-xs text-warning"><?php /*echo $con;*/ ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Total  Pendientes</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction");

                                    $con = $arrCon[0]['con_trans'];*/ ?>
                              <span class="h3 block m-t-xs text-warning"><?php /*echo $con;*/ ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Total </small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction where date_time >= '".date("Y-m-d")."' and date_time <= '".date("Y-m-d")." 23:59:59"."'");

                                    $con = $arrCon[0]['con_trans'];*/ ?>
                              <span class="h3 block m-t-xs text-warning"><?php /*echo $con;*/ ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Total  Hoy</small>
                            </span>
                          </a>
                        </div>
                        <div class="col-md-3 b-b b-r">
                          <a href="#" class="block padder-v hover">
                            <span class="i-s i-s-2x pull-left m-r-sm">
                              <i class="i i-hexagon2 i-s-base text-warning hover-rotate"></i>
                              <i class="glyphicon glyphicon-warning-sign i-sm text-white"></i>
                            </span>
                            <span class="clear">
                              <?php /*$arrCon = GetRecords("SELECT count(*) as con_trans from transaction where stat in(3)");

                                    $con = $arrCon[0]['con_trans']; */ ?>
                              <span class="h3 block m-t-xs text-warning"><?php /*echo $con;*/ ?> <span class="text-sm"></span></span>
                              <small class="text-muted text-u-c">Total  </small>
                            </span>
                          </a>
                        </div>

                      </div>

                    </div>
                  </div>
                </div>
               </div>
             </section>
           </section>
       </section>
   </section>
<?php include("footer.php"); ?>
