<?php
	if(isset($_POST['input']))
	{
		$input = $_POST['input'];
		if(!empty($input))
		{
			$mysql_host = 'localhost';
			$mysql_user = 'root';
			$mysql_password = '';

			$mysql_db = 'searchCollege';
			$mysql_conn_error = 'Oops! Could not connect to database';

			if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password) or !@mysql_select_db($mysql_db))
			{	
				die($mysql_conn_error);
			}

			$query = "SELECT * FROM `colleges` WHERE `Name`= '$input'";
			if($query_run = mysql_query($query))
			{
				if(mysql_num_rows($query_run)==NULL)
				{
					echo '<html>
								<head><title></title>
								<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
								</head>
								<body class="class-body">
									<div class="navbar navbar-default navbar-fixed-top">
								        <div class="container">
								            <a href="/searchEngine" class="navbar-brand">College Search Engine</a>
								        </div>
								    </div>
								    <br><br><br>

								    <div class="container">
								    	<div class="jumbotron">
								    		<h1>NO RESULTS FOUND......</h1>
								    	</div>
								    </div>
							    <script type="text/javascript" src="js/bootstrap.min.js"></script>
							    <script type="text/javascript" src="js/jquery.js"></script>    
								</body>					
							</html>';
				}
				else{
					while ($query_row = mysql_fetch_assoc($query_run)) {
						$name = $query_row['Name'];
						$address = $query_row['Address'];
						$description = $query_row['Description'];
						$contact = $query_row['Contact'];
						$website = $query_row['Website'];

						echo '<html>
								<head><title></title>
								<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
								</head>
								<body class="class-body">
									<div class="navbar navbar-default navbar-fixed-top">
								        <div class="container">
								            <a href="/searchEngine" class="navbar-brand">College Search Engine</a>
								        </div>
								    </div>
								    <br><br><br>

								    <div class="container">
								    	<table class="table table-striped table-hover ">
										  <tbody>
										    <tr>
										      <th>Name</th>
										      <td>'.$name.'</td>
										    </tr>
										    <tr class="info">
										      <th>Address</th>
										      <td>'.$address.'</td>
										    </tr>
										    <tr>
										      <th>Description</th>
										      <td>'.$description.'</td>
										    </tr>
										    <tr>
										      <th>Contact</th>
										      <td>'.$contact.'</td>
										    </tr>
										    <tr>
										      <th>Website</th>
										      <td><a href="'.$website.'" target="_blank">'.$website.'</td>
										    </tr>
										  </tbody>
										</table> 
								    </div>
							    <script type="text/javascript" src="js/bootstrap.min.js"></script>
							    <script type="text/javascript" src="js/jquery.js"></script>    
								</body>								
							</html>';

					}
				}
			}			
		}
		else
		{
			echo '<html>
					<head><title></title>
					<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
					</head>
					<body class="class-body">
						<div class="navbar navbar-default navbar-fixed-top">
					        <div class="container">
					            <a href="/searchEngine" class="navbar-brand">College Search Engine</a>
					        </div>
					    </div>
					    <br><br><br>

					    <div class="container">
					    	<div class="jumbotron">
					    		<h1>NO RESULTS FOUND......</h1>
					    	</div>
					    </div>
				    <script type="text/javascript" src="js/bootstrap.min.js"></script>
				    <script type="text/javascript" src="js/jquery.js"></script>    
					</body>					
				</html>';
		}		
	}
	
?>


