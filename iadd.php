<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("category",$con);

extract($_REQUEST);
if(isset($s))
  {
     mysql_query("insert into item set icode='{$icode}',
	                             iname='{$iname}',
								 ccid='{$ccid}'");
								 
	    header('location:ilist.php?add');                       
  }
?>
<form action="" method="post">
<table>

<tr>
<td>Item Code   </td>
<td><input type="text" name="icode"></td>

</tr>

<tr>
<td>Item Name   </td>
<td><input type="text" name="iname"></td>

</tr>


 <tr>
<td>Category Name   </td>
<td> <?php $res=mysql_query("select * from category");?>
<select name="ccid">
<option value="select">Select</option>
<?php while($r=mysql_fetch_object($res)) {?>
<option value="<?php echo $r->cid;?>"><?php echo $r->cname;?></option> 
<?php }?>
   </select>
</td>

</tr>

<tr> <td colspan="2"><input type="submit" value="Add" name="s"></td>
<td> <input type="button" name="cancel" value="Cancel" onclick="window.location.href='index.php';"></td>
</tr>
</table>
</form>
<script>
  function f(frm)
    {
	   if(frm.icode.value=='')
	      {
		     alert("Please enter the code");
		     frm.icode.focus();
			 return false;
		  }
		 if(frm.iname.value=='')
	      {
		     alert("Please enter the name");
		     frm.iname.focus();
			 return false;
		  }
		if(frm.ccid.value=='')
	      {
		     alert("Please enter the description");
		     frm.ccid.focus();
			 return false;
		  }
		  return true;   
	}
    
</script>
