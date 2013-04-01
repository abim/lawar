<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     config
*/
// Semua path tanpa tanda "/" di akhir
$BASE_PATH = "/lawar";
$SCRIPTS_PATH = "/Volumes/HD/_WWW/ACTIVE_PROJECTS/PRO";
define ("x_BASE", $BASE_PATH);
define ("x_PATH", $SCRIPTS_PATH.$BASE_PATH);
define ("x_APPVER", "V1.0-dev");

define ("x_IMG", $BASE_PATH."/static/img");


$SITE_CONF_AUTOLOAD['timezone'] = "Asia/Jakarta";
$SITE_CONF_AUTOLOAD['ssl'] = "";
$SITE_CONF_AUTOLOAD['tracking'] = "cookie";
$SITE_CONF_AUTOLOAD['cookie'] = "x0xcook";

/*
SIC generate : 
3 : company
4 : series
5 : brands
6 : products
*/
?>
