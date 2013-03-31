<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     init_render
*/

while (list($global) = each($GLOBALS)){
    if (!preg_match('/^(_POST|_GET|_COOKIE|_SERVER|_FILES|GLOBALS|HTTP.*|_REQUEST)$/', $global)){
        unset($$global);
    }
}

//ob_start ("ob_gzhandler") //khusus type gzip
ob_start ();
$menghitung_waktu_diaktifkan = explode(' ', microtime());
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(strstr($_SERVER['QUERY_STRING'], "'") || strstr($_SERVER['QUERY_STRING'], ";") ){ die("Access denied."); } //ih heker
if(preg_match("/\[(.*?)\].*?/i", $_SERVER['QUERY_STRING'], $comelizer)){
	define("x_ACTION", $comelizer[0]);
    define("x_QUERY", str_replace($comelizer[0], "", eregi_replace("&|/?PHPSESSID.*", "", $_SERVER['QUERY_STRING'])));
}else{
    define("x_QUERY", eregi_replace("&|/?PHPSESSID.*", "", $_SERVER['QUERY_STRING']));
}

if(strstr(x_ACTION, "debug")){ error_reporting(E_ALL); } //kalo lg mentenis
$_SERVER['QUERY_STRING'] = x_QUERY;


include ("x0x.php");
define("x_SELF", ($SITE_CONF_AUTOLOAD['ssl'] ? "https://".$_SERVER['HTTP_HOST'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_FILENAME']) : "http://".$_SERVER['HTTP_HOST'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_FILENAME'])));
if(!$mySQLserver){
    include("db_class.php");
}
if(!defined("x_BASE")){ header("Location:/404"); exit; }

$sql = new db;
$sql -> db_SetErrorReporting(FALSE);
$konek = $sql -> db_Connect($MySQLHost, $MySQLUser, $MySQLPasswd, $MySQLDb);

if(function_exists('date_default_timezone_set')) @date_default_timezone_set($SITE_CONF_AUTOLOAD['timezone']);

require_once ("global_function.php");
if(!$SITE_CONF_AUTOLOAD['cookie']){ $SITE_CONF_AUTOLOAD['cookie'] = "x0xcook"; }
if($SITE_CONF_AUTOLOAD['tracking'] == "session"){ session_start(); }

$ip = getIP();
cek_session();

require_once ("init.php");
?>