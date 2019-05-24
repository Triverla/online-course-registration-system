<div class="box box-success">
<div class="box-header"> <?php echo $_SESSION["id"];?>'s Profile</div>
<div class="box-body">
<table class="table table-bordered">
<tr>
<td>Admin ID </td>
<td><?php echo $row["id"];?> </td>
</tr>
<tr>
<td>Name </td>
<td><?php echo $row["username"];?> </td>
</tr>
<tr>
<td>Email </td>
<td><?php echo $row["email"];?> </td>
</tr>
</table>
</div>
</div>