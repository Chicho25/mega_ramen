<?php

// clave del raspberry Gamble7910
date_default_timezone_set('america/lima');
function conexion(){
  $enlace = mysqli_connect("localhost", "tayron_planet", "178718397406", "ns_mega_ramen_prueba");
  return $enlace;
}

function FixString($strString){
  $strString = str_replace("'", "''", $strString);
  $strString = str_replace("\'", "'", $strString);
  return $strString;
}

function InsertRec($strTable, $arrValue){
  $strQuery = "	insert into $strTable (";
  reset($arrValue);
  while(list ($strKey, $strVal) = each($arrValue)){
    $strQuery .= $strKey . ",";
  }
  $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
  $strQuery .= ") values (";
  reset($arrValue);
  while(list ($strKey, $strVal) = each($arrValue)){
    $strQuery .= "'" . FixString($strVal) . "',";
  }
  $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
  $strQuery .= ");";
  $insercion = conexion() -> query($strQuery);
  $last_id = GetRecords("SELECT MAX(id) as last_id FROM $strTable");
  foreach ($last_id as $key => $value) {
    $id_last = $value['last_id'];
  }
  return $id_last;
}

function GetRecords($sql){
  $check= conexion() -> query($sql);
  $return=array();
  $i=0;
  while ($row = $check -> fetch_array()){
    $return[$i]=$row;
    $i++;
  }
  return $return;
}

function UpdateRec($strTable, $strWhere, $arrValue){
  $strQuery = "	update $strTable set ";
  reset($arrValue);
  while (list ($strKey, $strVal) = each ($arrValue)){
    $strQuery .= $strKey . "='" . FixString($strVal) . "',";
  }
  $strQuery = substr($strQuery, 0, strlen($strQuery) - 1);
  $strQuery .= " where $strWhere";
  $update = conexion() -> query($strQuery);
  return $strQuery;
}

function RecCount($strTable, $strCriteria)
{
  if(empty($strCriteria))
    $strQuery = "select count(*) as cnt from $strTable;";
  else
    $strQuery = "select count(*) as cnt from $strTable where $strCriteria;";

  $nResult = conexion() -> query($strQuery);
  $rstRow = $nResult -> fetch_array();

  return $rstRow["cnt"];
}

function GetRecord($strTable, $strCriteria)
{
  $strQuery = "select * from $strTable ";

  if(!empty($strCriteria))
    $strQuery .= "where $strCriteria;";

  //"<br>".$strQuery ;
  $nResult = conexion() -> query($strQuery);
  return $nResult -> fetch_array();
}

function current_user_type()
{
  if(!isset($_SESSION))
    session_start();

  if(isset($_SESSION['USER_ROLE']) && $_SESSION['USER_ROLE'] != "")
    return $_SESSION['USER_ROLE'];

}

 ?>
