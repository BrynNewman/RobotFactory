<!--maybe add table type a c b etc-->
<table class = "table">
	<tr>
		<th></th>
		<th>part</th>
		<th>Part code</th>
		<th>Ca code</th>
		<th>plant made</th>
	</tr>
	{partTable}
	<tr>
		<td class="col-md-3">{part}</td>
		<td class="col-md-3">{partCpde}</td>
		<td class="col-md-3">{caCode}</td>
		<td class="col-md-3">{plant}</td>
	</tr>
	{/partTable}
</table>