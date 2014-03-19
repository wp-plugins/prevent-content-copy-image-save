<?php

function PCS_get_abs_path()
{
	return WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/';
}
	
//-----------------------------------------------------

function PCS_get_url_path()
{
	return WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/';
}


//---------------------------------------------------- 

function PCS_init_options()
{	
	add_option(PCS_OPTIONS);
	
	$options['select']=1;
	$options['saveimg']=1;
	$options['CTRLA']=1;
	$options['CTRLC']=1;
	$options['CTRLX']=1;
	$options['CTRLV']=1;
	$options['CTRLS']=1;
	$options['cmenu']=1;
	$options['CTRLINPUT']=0;
	$options['image_save_msg']="You Can Not Save images!";
	$options['no_menu_msg']="Context Menu disabled!";
	
	update_option(PCS_OPTIONS,$options);
} 

//---------------------------------------------------- 

function PCS_update_my_options($options)
{	
	
	update_option(PCS_OPTIONS,$options);
} 

//---------------------------------------------------- 

function PCS_my_options()
{	
	$options=get_option(PCS_OPTIONS);
	if(!$options)
	{
		PCS_init_options();
		$options=get_option(PCS_OPTIONS);
	}
	return $options;			
}

//---------------------------------------------------- 

function PCS_option_msg($msg)
{	
	echo '<div id="message" class="updated"><p>' . $msg . '</p></div>';		
}
  
     
?>