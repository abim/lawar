<?php
/**
* @package      Lawar 1.0
* @version      Beta : 1.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @author       Uray Irvan Prasetya <urayirvan@gmail.com>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2013 underlegal Throne, Inc.
* @since        File available since Release 1.0
* @category     function
*/

/**
 * IP detector
 */
function getIP(){
    if(getenv('HTTP_X_FORWARDED_FOR')){
        $ip = $_SERVER['REMOTE_ADDR'];
        if(preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", getenv('HTTP_X_FORWARDED_FOR'), $ip3)){
            $ip2 = array('/^0\./', '/^127\.0\.0\.1/', '/^192\.168\..*/', '/^172\.16\..*/', '/^10..*/', '/^224..*/', '/^240..*/');
            $ip = preg_replace($ip2, $ip, $ip3[1]);
        }
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if($ip == ""){ $ip = "x.x.x.x"; }
    return $ip;
}

/**
 * Cek php session
 */
function cek_session(){
    global $sql, $SITE_CONF_AUTOLOAD;

    if(!$_COOKIE[$SITE_CONF_AUTOLOAD['cookie']] && !$_SESSION[$SITE_CONF_AUTOLOAD['cookie']]){
            define("USER", FALSE); define("ADMIN", FALSE); define("PENGUNJUNG", TRUE);
    } else {
        list($uid, $upw) = ($_COOKIE[$SITE_CONF_AUTOLOAD['cookie']] ? explode(".", $_COOKIE[$SITE_CONF_AUTOLOAD['cookie']]) : explode(".", $_SESSION[$SITE_CONF_AUTOLOAD['cookie']]));
        if(empty($uid) || empty($upw)){         // corrupt cookie? *wew~ ada heker!*
            isicookie($SITE_CONF_AUTOLOAD['cookie'], "", (time()-2592000));
            $_SESSION[$SITE_CONF_AUTOLOAD['cookie']] = "";
            session_destroy();
            define("ADMIN", FALSE); define("USER", FALSE); define("U_LEVEL",""); 
            define("TEKSLOGIN", "Terdeteksi Kesalahan cookie Pada Komputer anda - Keluar Account User.<br /><br />");
            return(FALSE);
        }
        if($sql -> db_Select("users", "*", "id_user='$uid' AND md5(userpass)='$upw'")){
            $result = $sql -> db_Fetch(); extract($result);
            define("USER", TRUE);

            define("U_ID", $id_user);
            define("U_NAME", $username);
            define("U_PASS", $userpass);
            define("U_NICK", $usernick);
            define("U_SESSION", $session);
            define("U_EMAIL", $email);

            define("U_NOWLOG", $nowlog);
            define("U_IP", $ip);
            define("U_STATUS", $status);
            define("U_HIT", $hit);
            define("U_LEVEL", $level);
            define("U_PWCHANGE", $pwchange);
            define("U_CREATED", $created);
            define("U_OPTION", $option);
            
            if($nowlog + 3600 < time()){
                $lastlog = $nowlog;
                $nowlog = time();
                $sql -> db_Update("users", "hit=hit+1, lastlog='$lastlog', nowlog='$nowlog' WHERE username='".U_NAME."' ");
            }
            define("U_LASTLOG", $lastlog);

            if($status == 1){ exit;}
            
            if($level == "admin"){
                define("ADMIN", TRUE); define("ADMINID", $id_user); 
                define("ADM_NAME", $username); 
                define("ADM_NICK", $usernick); 
                define("ADM_EMAIL", $email); 
                define("ADM_LEVEL", $level); define("ADM_PWCHANGE", $pwchange);
            } else { 
                define("ADMIN", FALSE);
            }
        } else {
            define("USER", FALSE); define("ADMIN", FALSE);
            define("SALAH_COOKIE",TRUE); define("U_LEVEL","");
        }
    }
}

/**
 * Isi Cookie
 */
function isicookie($name, $value, $expire, $path="/", $domain="", $secure=0){
        setcookie($name, $value, $expire, $path, $domain, $secure);
}
?>