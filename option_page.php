<?

	$options= PCS_my_options();
	
	if(isset($_POST['image_save_msg']))
	{

		$options['select']=intval($_POST['select']);
		$options['saveimg']=intval($_POST['saveimg']);
		$options['CTRLA']=intval($_POST['CTRLA']);
		$options['CTRLC']=intval($_POST['CTRLC']);
		$options['CTRLX']=intval($_POST['CTRLX']);
		$options['CTRLV']=intval($_POST['CTRLV']);
		$options['CTRLS']=intval($_POST['CTRLS']);
		$options['cmenu']=intval($_POST['cmenu']);
		$options['CTRLINPUT']=intval($_POST['CTRLINPUT']);
		$options['image_save_msg']=$_POST['image_save_msg'];
		$options['no_menu_msg']=$_POST['no_menu_msg'];
				
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