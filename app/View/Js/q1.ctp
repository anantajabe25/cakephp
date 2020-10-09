<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">') ?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton">
	<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
<tr>
	<td id="delete"><a href="#" class="delete-record" style="font-size:1rem;" onClick="$(this).closest('tr').remove()">x</a></td>
	<td id="description"><div contentEditable="true" name="data[1][description]" class="description">Mac Book</div></td>
	<td id="quantity"><div contentEditable="true" name="data[1][quantity]" class="quantity">1</div></td>
	<td id="unit-price"><div contentEditable="true" name="data[1][unit_price]" class="unit-price">SGD 2000</div></td>
</tr>

</tbody>

</table>

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%" controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

	$("#add_item_button").click(function(){
		var table = $('.table.table-striped');
		var currentRowCount = $(".table.table-striped tbody tr").length;
		var nextRow =currentRowCount + 1;
	var markup = '<tr><td id="delete"><a href="#" class="delete-record" style="font-size:1rem;" onClick="$(this).closest(\'tr\').remove()">x</a></td> <td id="description"><div contentEditable="true" name="data['+nextRow+'][description]" class="description">Mac Book</div></td> <td id="quantity"><div contentEditable="true" name="data['+nextRow+'][quantity]" class="quantity">1</div></td> <td id="unit-price"><div contentEditable="true" name="data['+nextRow+'][unit_price]" class="unit-price">SGD 2000</div></td> </tr>';
		$(".table.table-striped tbody").append(markup);
	});
});
function deleteRow(){
	console.log($(this));
	$(this).parent().html();
}
</script>
<?php $this->end();?>

