<h1>HISTORY VIEW</h1>

<div id="body">
	<p>This is the history page</p>       
		<div class="row">
			<table style="border: 1px solid white;">
				<tr>
					<th>id</th>
					<th>purchase</th>
					<th>assemblies</th>
					<th>shipment</th>
					<th>time</th>    
				</tr>
			{history}
			<tr>
				<td>{id}</td>
				<td>{purchase}</td>
				<td>{assemblies}</td>
				<td>{shipment}</td>
				<td>{time}</td>
			</tr>
			{/history}
			</table>
		</div>
</div>