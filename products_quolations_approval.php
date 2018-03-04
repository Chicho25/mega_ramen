<?php
ob_start();
session_start();
//$session_id = session_id();
include("include/config.php");
include("include/defs.php");

if(isset($_REQUEST['id'],$_REQUEST['is_product'])){

  $arrProduct = array("id_quot"=>$_REQUEST['id_quot'],
                      "id_produc"=>$_REQUEST['id'],
                      "stat"=>2,
                      "log_user_register"=>$_SESSION['MR_USER_ID'],
                      "log_time"=>date("Y-m-d H:i:s"),
                      "type_product"=>0);

  $nIdPro = InsertRec("crm_quot_producs", $arrProduct);

}elseif(isset($_REQUEST['id'],$_REQUEST['is_service'])){

  $arrTmpSer = array("id_quot"=>$_REQUEST['id_quot'],
                      "id_produc"=>$_REQUEST['id'],
                      "stat"=>2,
                      "log_user_register"=>$_SESSION['MR_USER_ID'],
                      "log_time"=>date("Y-m-d H:i:s"),
                      "type_product"=>1);

  $nId = InsertRec("crm_quot_producs", $arrTmpSer);
} ?>
