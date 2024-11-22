<?
function lock_access($param = 'show', $show_val = 'all', $hide_val = 'none'){
 $key = 'allow_site_view';
 if(isset($_SESSION[$key])){
  if(isset($_GET[$param]) && $_GET[$param] == $hide_val){
   unset($_SESSION[$key]);
   header('Location: /'); exit();
  }
 } elseif(isset($_GET[$param]) && $_GET[$param] == $show_val){
  $_SESSION[$key] = 1;
 } else{
  header('Location: //www.ingrad.ru/'); exit();
 }
}