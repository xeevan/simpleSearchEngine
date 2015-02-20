
<html>
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
	    	<form  method="post" action="searched.php" role="search">	    	
		    	<div class="form-group">
		    		<div class="dropdown">
					<input class="form-control dropdown-toggle" type="text" name="input" id="inputfield" data-toggle="dropdown" autocomplete="off" />
						<ul class="dropdown-menu" role="menu" id="search_list">

						</ul>
	                </div>
	                
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Search</button> 
				</div>
			</form>	
	    </div>
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	$('#inputfield').keyup(function(){
    		var input = $('#inputfield').val();
    		console.log(input);
    		if(input!="")
    		{
    			$.ajax({
    				type: 'POST',
    				url: 'search_ajax.php',
    				data: 'name='+input,
    				success: function(res){
    					console.log(res);

    					$('#search_list').html(res);

    					$('li').click(function(){
		                 var value = $(this).attr('value');
		                 $('#inputfield').val(value);
		                 $('#inputfield').focus();
	             	});
    				}
    			});
    		}
    	});
    </script>

	</body>
	
</html>
