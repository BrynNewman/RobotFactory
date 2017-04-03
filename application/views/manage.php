<head>
    <link rel='stylesheet' type="text/css" href="/assets/css/about.css">
</head>

<body>
    <span class="12-md-col" id="content">
        <div class="4-md-col" id="reset">
            <p>This button will reset all of our data with the main server (I think) do not press until 100% certain it's necessary</p>
            <p>This will erase our history, inventory, and reset our plant balance. Repeat; do not press unless absolutely sure.</p>
            <a href ="/Manage/reboot" ><button type="button" style="color:black" value="Reboot">Reboot</button></a>
        </div>
        <div class="4-md-col" id="login">
            <!--This is a form to "register" with the PRC servers. It sounds a lot like logging in.
            I assume a form is used at some point.-->

           <form method="POST" action="/Manage/register">
                {header}
            <p> Team Name</p><input type="text" name ="username" style="color:black;" placeholder="elderberry" value = "elderberry"/>
			<p>pasword</p>	<input type="text" name = "password" style="color:black;"/>
			<input type= "submit" name = "login" value= "login" style="color:black;"/>
			<br>
			</br>
			
            </form>

        </div>
        <div class="4-md-col" id="buyme">
			<form method="POST" action="/Manage/sellBot">
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
							<td><input type="checkbox" name="pick{headCaCode}"/></td>
							<td>{model}</td>
							<td>{headCaCode}</td>
							<td>{torsoCaCode}</td>
							<td>{bottomCaCode}</td>
						</tr>
						{/completeBots}
					</table>
					<input type= "submit" name = "sell" value= "sell" style="color:black;"/>
					</form>
        </div>
    </span>    
</body>