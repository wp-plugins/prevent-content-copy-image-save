<?

	$options= PCS_my_options();
	
	if(isset($_POST['image_save_msg']))
	{

		if(array_key_exists('select',$_POST))
		$options['select']=intval($_POST['select']);
		else
		$options['select']=0;
		
		if(array_key_exists('saveimg',$_POST))
		$options['saveimg']=intval($_POST['saveimg']);
		else
		$options['saveimg']=0;
		
		if(array_key_exists('CTRLA',$_POST))
		$options['CTRLA']=intval($_POST['CTRLA']);
		else
		$options['CTRLA']=0;
		
		if(array_key_exists('CTRLC',$_POST))
		$options['CTRLC']=intval($_POST['CTRLC']);
		else
		$options['CTRLC']=0;
		
		if(array_key_exists('CTRLX',$_POST))
		$options['CTRLX']=intval($_POST['CTRLX']);
		else
		$options['CTRLX']=0;
		
		if(array_key_exists('CTRLV',$_POST))
		$options['CTRLV']=intval($_POST['CTRLV']);
		else
		$options['CTRLV']=0;
		
		if(array_key_exists('CTRLS',$_POST))
		$options['CTRLS']=intval($_POST['CTRLS']);
		else
		$options['CTRLS']=0;
		
		if(array_key_exists('cmenu',$_POST))
		$options['cmenu']=intval($_POST['cmenu']);
		else
		$options['cmenu']=0;
		
		
		if(array_key_exists('CTRLINPUT',$_POST))
		$options['CTRLINPUT']=intval($_POST['CTRLINPUT']);
		else
		$options['CTRLINPUT']=0;
		
		
		if(array_key_exists('image_save_msg',$_POST))
		$options['image_save_msg']=$_POST['image_save_msg'];
		else
		$options['image_save_msg']='';
		
		
		if(array_key_exists('no_menu_msg',$_POST))
		$options['no_menu_msg']=$_POST['no_menu_msg'];
		else
		$options['no_menu_msg']='';
		
		
		PCS_update_my_options($options);
		$saved_options="Your Settings Saved Successfully!";
		PCS_option_msg($saved_options);
	}
		
	$options= PCS_my_options();

?>

<form id='options_frm' method="POST">
	<b>Text Options</b>
	<hr/>
	<input type="checkbox" name="select" id="select" value="1"> Prevent Selection.<br/>
	<input type="checkbox" name="CTRLA" id="CTRLA" value="1"> Prevent CTRL + A 
	(Select All).<br/>
	<input type="checkbox" name="CTRLC" id="CTRLC" value="1"> Prevent CTRL + C 
	(Copy).<br/>
	<input type="checkbox" name="CTRLX" id="CTRLX" value="1"> Prevent CTRL + X 
	(Cut).<br/>
	<input type="checkbox" name="CTRLV" id="CTRLV" value="1"> Prevent CTRL + V 
	(Paste).<br/>
	<input type="checkbox" name="CTRLINPUT" id="CTRLINPUT" value="1"> Allow Copy, Cut and Paste for Text Input and Text Area.<br/>

	<br/>
	<b>Image Options</b>
	<hr/>
	<input type="checkbox" name="saveimg" id="saveimg" value="1"> Prevent Image 
	Saving. <br/>
		&nbsp;Image Saving Disabled Message Text 
	<input type="text" name="image_save_msg" id="image_save_msg" size="59" value="<?=$options['image_save_msg']?>">.<br/>
	
	<br/>
	<b>Other Options</b>
	<hr/>
	<input type="checkbox" name="CTRLS" id="CTRLS" value="1"> Prevent Saving Page 
	Using CTRL + S.<br/>
	<input type="checkbox" name="cmenu" id="cmenu" value="1"> Disable Context Menu. <br/>
	&nbsp;Context menu Disabled Message Text 
	<input type="text" name="no_menu_msg" id="no_menu_msg" size="59" value="<?=$options['no_menu_msg']?>">.<br/>
	<br/>
	
	<br/><br/>
	<input  class="button-primary" type="submit" value="  Update Options  " name="Save_Options">


<script type="text/javascript">
	document.getElementById('select').checked=<? if($options['select']) echo 'true'; else echo 'false'?>;
	document.getElementById('saveimg').checked=<? if($options['saveimg']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLA').checked=<? if($options['CTRLA']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLC').checked=<? if($options['CTRLC']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLX').checked=<? if($options['CTRLX']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLV').checked=<? if($options['CTRLV']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLS').checked=<? if($options['CTRLS']) echo 'true'; else echo 'false'?>;
	document.getElementById('cmenu').checked=<? if($options['cmenu']) echo 'true'; else echo 'false'?>;
	document.getElementById('CTRLINPUT').checked=<? if($options['CTRLINPUT']) echo 'true'; else echo 'false'?>;
</script>

</form>
<br/>
<a target="_blank" href="http://www.clogica.com/product/wp-content-protection-manager">
<img style="border-style:solid; border-width:1px;" border="1" alt="Turn Thieves into Money" src="<?=get_url_path()?>/images/ad1.jpg">
</a>