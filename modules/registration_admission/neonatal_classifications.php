<?php
require('./roots.php');
require($root_path.'include/core/inc_environment_global.php');
error_reporting($ErrorLevel);
$lang_tables[]='actions.php';
define('LANG_FILE','obstetrics.php');
$local_user='aufnahme_user';
require_once($root_path.'include/core/inc_front_chain_lang.php');
# Create obstetrics object and get all neonatal classifications
require_once($root_path.'include/care_api_classes/class_obstetrics.php');
$neo=new Obstetrics;
$classif= &$neo->Classifications();
$rows=$neo->LastRecordCount();

?><?php html_rtl($lang); ?>
<!-- Generated by AceHTML Freeware http://freeware.acehtml.com -->
<head>
<?php echo setCharSet(); ?>
<title><?php echo $LD['classification']; ?></title>


<script language="JavaScript">
<!-- Script Begin
function process(d) {
	if(0==<?php echo $rows ?>) return false;
	clo=false;
	wd=window.opener.document.report.classification;
	for(i = 0; i<<?php echo $rows ?>; i++){
		eval("if(d.c"+i+".checked) {wd.value=wd.value + d.c"+i+".value + \"\\n\"; clo=true;}");

	}
	if(clo) window.close();
		else return false;
}
//  Script End -->
</script>
</head>
<body onLoad="if (window.focus) window.focus()"><font face=arial>

<form name="classif" onSubmit="return process(this)">
<table border=0 cellpadding=0 cellspacing=0 bgcolor="#efefef">
  <tr>
    <td>

	<table border=0 cellspacing=1>


   <tr>
     <td background="../../gui/img/common/default/tableHeaderbg.gif">
	 <font face=arial color="#efefef" size=3><b><?php echo $LD['classification']  ?> </b>
	 </td>
   </tr>

<?php
    //echo $mode;
    if ($rows)
	{
?>
   <tr bgcolor="#ffffff">
     <td ><font face=arial size=2>
	 <?php
	 $c=0;
	 while($row=$classif->FetchRow()){
	 	if(isset(${$row['LD_var']})&&!empty(${$row['LD_var']})) $buffer= ${$row['LD_var']};
			else $buffer= $row['name'];
	 	echo '<nobr><input type="checkbox" name="c'.$c.'" value="'.$buffer.'">&nbsp;'.$buffer.'</nobr><br>
		';
		$c++;
	}
	 ?>
	 &nbsp;
	 </td>
   </tr>
<?php
	}
?>		 </table>

	</td>
  </tr>
</table>
 	<input type="submit" value="<?php echo $LDOk ?>">
  <input type="button" value="<?php echo $LDClose ?>" onClick="window.close()">

</form>



</font>
</body>
</html>
