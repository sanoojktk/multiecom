<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="panel-body">
<table border="3">
<thead>
<tr>
<th>Invoice ID</th>
<th>Invoice Name</th>
<th>Invoice Title</th>
<th>Invoice Keywods</th>
<th>Invoice Desc</th>
<th>Action</th>
<th>Status</th>
</tr>
</thead>
<tbody><!--?php $pageid=1; while($result_data = mysqli_fetch_array($str)) { ?-->
<tr class="odd gradeX">
<td></td>
<td></td>
<td></td>
<td class="center"></td>
<td class="center"></td>
<td class="center"><a id="myWish" class="btn btn-danger btn-xs" href="do_action.php?page=invoice&did=<?php echo $result_data['productid']; ?>"><i class="glyphicon glyphicon-remove"></i> </a> <!--| <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> </a>--></td>
<td><!--?php if($result_data['status']=='0') { ?-->
<input id="toggle_<?php echo $result_data['productid']; ?>" name="toggle" type="checkbox" value="<?php echo $result_data['productid']; ?>" data-toggle="toggle" data-off="Closed" data-on="Open" />
<!--?php }?-->
<!--?php if($result_data['status']=='1') { ?-->
<input id="toggle_<?php echo $result_data['productid']; ?>" checked="checked" name="toggle" type="checkbox" value="<?php echo $result_data['productid']; ?>" data-toggle="toggle" data-off="Closed" data-on="Open" />
<!--?php }?--></td>
</tr>
<!--?php $pageid++; } ?--></tbody>
</table>
</div>
</body>
</html>