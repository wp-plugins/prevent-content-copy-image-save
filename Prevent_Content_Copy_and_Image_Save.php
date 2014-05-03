<?php
/*
Plugin Name: Prevent Content Copy & Image Save Protection
Plugin URI: http://codecanyon.net/user/fakhri/portfolio
Description: This plugin protects your content from steeling, it prevents content select and copy and also prevents image saving from context menu.
Author: Fakhri Alsadi
Version: 1.2
Author URI: http://www.clogica.com
*/
define( 'PCS_OPTIONS', 'pcs-options-group' );

require_once ('functions.php');

add_action('admin_menu', 'PCS_admin_menu');
add_action('wp_head', 'PCS_script');

register_deactivation_hook( __FILE__ , 'PCS_uninstall' );

//----------------------------------------------------

function PCS_script()
{

$options= PCS_my_options();

	if($options['select']==1 || $options['saveimg']==1 || $options['CTRLA']==1 || $options['CTRLC']==1 ||  $options['CTRLX']==1  || $options['CTRLV']==1 || $options['CTRLS']==1 || $options['cmenu']==1  ){
	
	
	$block_ctrl=false;
	$keys="";
	$text_keys="";
	
	if($options['CTRLA']==1 || $options['CTRLC']==1 ||  $options['CTRLX']==1  || $options['CTRLV']==1 || $options['CTRLS']==1)
	{
		$block_ctrl=true;
		
		if($options['CTRLA']==1)
			if($keys=='')
				$keys=' key == 65 ';
			else
				$keys= $keys . ' || key == 65 ';
				
		if($options['CTRLC']==1)
			if($keys=='')
				$keys=' key == 67 ';
			else
				$keys= $keys . ' || key == 67 ';
		
		if($options['CTRLX']==1)
			if($keys=='')
				$keys=' key == 88 ';
			else
				$keys= $keys . ' || key == 88 ';
				
		if($options['CTRLV']==1)
			if($keys=='')
				$keys=' key == 86 ';
			else
				$keys= $keys . ' || key == 86 ';
				
		$text_keys = $keys;
		
		if($options['CTRLS']==1)
			if($keys=='')
				$keys=' key == 83 ';
			else
				$keys= $keys . ' || key == 83 ';
		
	}
	
	$script=" <script type='text/javascript'>
	var image_save_msg='" . str_replace("'","",$options['image_save_msg']) . "';
	var no_menu_msg='" . str_replace("'","",$options['no_menu_msg']) . "';
	
	";
	
	if($block_ctrl)
	$script = $script . " function disableCTRL(e)
	{
		var allow_input_textarea = true;
		var key; isCtrl = false;
		if(window.event)
			{ key = window.event.keyCode;if(window.event.ctrlKey)isCtrl = true; ";
			
					if($options['CTRLINPUT']==1)$script = $script . "if( (window.event.srcElement.nodeName =='INPUT' || window.event.srcElement.nodeName=='TEXTAREA') && isCtrl && ($text_keys))
					return true;";
					
		$script = $script .  " }
		else
			{ key = e.which; if(e.ctrlKey) isCtrl = true; ";
					if($options['CTRLINPUT']==1) $script = $script . "if( (e.target.nodeName =='INPUT' || e.target.nodeName =='TEXTAREA') && isCtrl && ($text_keys)) 
					return true; ";
			$script = $script . " }
	        
	     if(isCtrl && ($keys))
	          return false;
	          else
	          return true;} ";
	          
	if($options['select']==1)
	$script = $script . "          
	function disableselect(e)
	{	
	    if(e.target.nodeName !='INPUT' && e.target.nodeName !='TEXTAREA' && e.target.nodeName !='HTML' )
		return false;
	}
	function disableselect_ie()
	{	    
    	if(window.event.srcElement.nodeName !='INPUT' && window.event.srcElement.nodeName !='TEXTAREA')
		return false;
	}	
	function reEnable()
	{
		return true;
	}";
	
	if($options['saveimg']==1 || $options['cmenu']==1) {
	
	if($options['saveimg']==1 && $options['cmenu']==1)
	$function = " function disablecmenu(e)
	{		
	if (document.all){
		if(window.event.srcElement.nodeName=='IMG')
 		{alert(image_save_msg); return false; }
 		else
 		{alert(no_menu_msg); return false;} // Blocks Context Menu

	 }else
	 {
		
	 	if(e.target.nodeName=='IMG')
	 		{alert(image_save_msg); return false;}
	 	else
	 		{alert(no_menu_msg); return false;} // Blocks Context Menu
	 	
	 }
 
	}";
	
	
	if($options['saveimg']==1 && $options['cmenu']==0)
	$function = " function disablecmenu(e)
	{		
	if (document.all){
		if(window.event.srcElement.nodeName=='IMG')
 		{alert(image_save_msg); return false; }

	 }else
	 {
		
	 	if(e.target.nodeName=='IMG')
	 		{alert(image_save_msg); return false;}
	 	
	 }
 
	}";	
	

	if($options['saveimg']==0 && $options['cmenu']==1)
	$function = " function disablecmenu(e)
	{		
	if (document.all){
		
		{alert(no_menu_msg); return false;} // Blocks Context Menu

	 }else
	 {
		
	 	{alert(no_menu_msg); return false;} // Blocks Context Menu
	 	
	 }
 
	}";		
	
	
	
	$script = $script . $function;

	 }


	 
	if($block_ctrl)
	$script = $script . " 
	document.onkeydown= disableCTRL; ";
	
	if($options['saveimg']==1 || $options['cmenu']==1)
	$script = $script . "
	document.oncontextmenu = disablecmenu;
	 ";
	
	
		
	if($options['select']==1)
	$script = $script . " 
	document.onselectstart=disableselect_ie;
	if(navigator.userAgent.indexOf('MSIE')==-1){
	document.onmousedown=disableselect;
	document.onclick=reEnable;
	}
	 ";
	
	$script = $script . "
	</script> ";
	
	echo $script;
	
	}

}

//----------------------------------------------------

function PCS_admin_menu() {
	add_options_page('Prevent Content Copy & Image Save', 'Prevent Content Copy & Image Save', 'manage_options', basename(__FILE__), 'PCS_options_menu'  );
}

//----------------------------------------------------
function PCS_options_menu() {
	
	if (!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		
	echo '<div class="wrap"><h2>Prevent Content Copy and Image Save</h2><br/>';
	include "option_page.php";
	echo '</div>';
}
//----------------------------------------------------

function PCS_uninstall(){

	delete_option(PCS_OPTIONS);
}


?>