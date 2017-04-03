<!DOCTYPE html>
<!-- Template view which all other views will use -->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- A little bit of bootstrap in my life --> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

        <!-- A little Sortable Tables is all i see -->
        <link rel='stylesheet' href="/assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/template.css"/>
	</head>
	<body>		  
		<div id="links">
			<!-- menu bar shared by all views -->
			<div class="navbar">
                <div class="navbar-inner"> 
					<a class="brand" href="/"><img height="125px;" width="auto;" src="/assets/images/UmbrellaCorporation.png"/></a>                  				
					<a style="color:white;" href="/">Main</a>
					<a style="color:white;" href="/parts">Parts</a>
					<a style="color:white;" href="/assembly">Assembly</a>
					<a style="color:white;" href="/history">History</a>					
					<a style="color:white;" href="/manage">Manage</a>
					<a style="color:white;" href="/about">About</a> 
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">User Roles<b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href="/">Guest</a></li>
							<li><a href="/">Worker</a></li>
							<li><a href="/">Supervisor</a></li>
							<li><a href="/">Boss</a></li>
						</ul>
					<a style="color:white;" href="/manage">manage</a>

				</div>
            </div>    
		</div>
		<div id="container">
				 {content}
		</div>  
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
					{ci_version}
		</p>     
		<footer>
			<!-- A little bit of jquery by my side --> 
			<script src="https://code.jquery.com/jquery-3.1.1.min.js" 
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous"></script>

			<!-- A little bit more of bootstrap is all i need -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

			<!-- A little more Sorting all night long --> 
			<script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
		</footer>
	</body>
</html>