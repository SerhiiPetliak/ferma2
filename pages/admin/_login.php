<h2>�����������</h2>

<?PHP
if(isset($_SESSION["admin"])){ Header("Location: /?menu=helpmyadmin"); return; }

if(isset($_POST["admlogin"])){

	$db->Query("SELECT * FROM db_config WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	
	if(strtolower($_POST["admlogin"]) == strtolower("adminfarmer") AND strtolower($_POST["admpass"]) == strtolower("2F6n6Z9b") ){
		 
		$_SESSION["admin"] = $data_log['admin'];
		Header("Location: /?menu=helpmyadmin");
		return;
	}else echo "<center><font color = 'red'><b>������� ������ ����� �/��� ������</b></font></center><BR />";
	
}

?>
<form action="" method="post">
<table width="300" border="0" align="center">
  <tr>
    <td><b>�����:</b></td>
	<td align="center"><input type="text" name="admlogin" value="" /></td>
  </tr>
  <tr>
    <td><b>������:</b></td>
	<td align="center"><input type="password" name="admpass" value="" /></td>
  </tr>
  <tr>
	<td style="padding-top:5px;" align="center" colspan="2"><input type="submit" value="�����" /></td>
  </tr>
</table>
</form>