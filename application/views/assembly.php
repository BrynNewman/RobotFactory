
    <body>
		<h1>Assembly<h1>
        <div class="container">
            <div id="content">
				<h2>parts</h2>
				<h3>filter: <a href="/filter/actor/ALL" ><button style="color:black;">All</button></a> <a href="/filter/actor/A" style="color:black;"><button style="color:black;">A</button></a> <a href="/filter/actor/B"><button style="color:black;">B</button></a> <a href="/filter/actor/C" ><button style="color:black;">C</button></a> <a href="/filter/actor/M" ><button style="color:black;">M</button></a> <a href="/filter/actor/R" ><button style="color:black;">R</button></a> <a href="/filter/actor/W" ><button style="color:black;">W</button></a></h3>
				<form method='POST' action='/assembly/pressed'>
					<div class = "row">
						{hasParts}
						<span class='col-md-6'>
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
									<td><input type="checkbox" name="pick{part}" /></td>
									<td>{part}</td>
									<td>{partCode}</td>
									<td>{caCode}</td>
									<td>{plantBuiltAt}</td>
								</tr>
								{/partTable}
							</table>
						</span>
					</div>
					<input type= "submit" name = "build" value= "Build" style="color:black;"/> <input type= "submit" name= "return" value= "return to head office" style="color:black;"/>
				</form>
				<h2>completed bots</h2>
				<div class = "row">	
					{hasBots}				
					<table class = "table">
						<tr>
							<th></th>
							<th>model</th>
							<th>head Ca code</th>
							<th>torso Ca code</th>
							<th>bottom Ca made</th>
						</tr>
						{completeBots}
						<tr>
							<td></td>
							<td>{model}</td>
							<td>{headCaCode}</td>
							<td>{torsoCaCode}</td>
							<td>{bottomCaCode}</td>
						</tr>
						{/completeBots}
					</table>
				</div>
			</div>
		</div>