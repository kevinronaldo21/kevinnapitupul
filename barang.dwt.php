<?php require_once('../Connections/karya_husada.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO obat (Kode_Obat, Nama_Obat, Keterangan, Harga, Stok) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Kode_Obat'], "text"),
                       GetSQLValueString($_POST['Nama_Obat'], "text"),
                       GetSQLValueString($_POST['Keterangan'], "text"),
                       GetSQLValueString($_POST['Harga'], "text"),
                       GetSQLValueString($_POST['Stok'], "text"));

  mysql_select_db($database_karya_husada, $karya_husada);
  $Result1 = mysql_query($insertSQL, $karya_husada) or die(mysql_error());

  $insertGoTo = "../obat_tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- TemplateBeginEditable name="doctitle" -->
<title>Apotik Karya Husada Perdagangan</title>
<!-- TemplateEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../my.css" rel="stylesheet" type="text/css" />
<link href="../menu.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<style type="text/css" media="screen">
#menuh{float:none;}
body{behavior:url(csshover.htc); font-size:75%;}
#menuh ul li{float:left; width: 100%;}
#menuh a{height:1%;font:normal 1em/1.6em "Trebuchet MS", helvetica, arial, sans-serif;}
</style>
<![endif]-->
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
</head>
<body>
<div id="container">
  <div id="top">
    <p><a href="http://www.free-css.com/"></a> | <a href="http://www.free-css.com/"></a></p>
    <h1>APOTIK KARYA HUSADA PERDAGANGAN </h1>
  </div>
  <div id="menuh-container">
    <div id="menuh">
      <ul>
        <li><a href="../obat.php" class="top_parent">DATA KASIR </a></li>
      </ul>
      <ul>
        <li><a href="../pemesanan.php" class="top_parent">PENGGUNA</a></li>
      </ul>
      <ul>
        <li><a href="../pelanggan.php" class="top_parent">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3>KOMPONEN</h3>
    <p align="center" class="quote">DATA BARANG</p>
    <p align="center" class="quote">DATA PENJUALAN</p>
    <p align="center" class="quote">DATA DETAIL PENJUALAN</p>
    <p align="center" class="quote">DATA UNIT</p>
    <p align="center" class="quote">DATA KATEGORI</p>
    <p>&nbsp;</p>
    <h3>Search</h3>
    <div class="search">
      <form method="post" action="http://www.free-css-com/">
        <p>
          <input type="text" name="search" class="search" />
          <input type="submit" value="Search" class="searchSubmit" />
        </p>
      </form>
    </div>
  </div>
  <div id="content">
    <blockquote>
      <h2 align="center" class="byline style1">INPUT DATA OBAT </h2>
      <p align="center">&nbsp;</p>
    </blockquote>
  </div>
  <div id="footer"> <a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a> </div>
</div>
</body>
</html>