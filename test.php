<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>tamer</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>

</head>
<body>
	<input type="text" name="autocomplete" id="search" onkeyup="auto(2,1)">
	<div class="result"></div>
</body>
<script type="text/javascript">
		
	function auto(minLength,maxResult){
		var search = document.getElementById('search').value;
		if(search.length > minLength){
			$.ajax({
			    type: 'GET',
			    url : "test_auto.php",
			    data: {search : search},
			    dataType: 'json',
	            contentType:"application/x-www-form-urlencoded",
	         	async: true,
	         	processData: true,
			    success: function(data){
			    	
	                var html = '<ul>';
				    for(k=0;k < parseInt(maxResult) ;k++){
				        var prop = Object.keys(data[k]);
				        if(prop[0] === "name"){
				            html += '<li style="list-style:none;"><a href="matheriautheque.php">'+data[k].name+'</a></li>'
				        }
				        
				    }
				    html += '</ul>';
				    $('.result').append(html)
				                    
	            },
			    error : function(){
			       	var html = '<ul><li>Sorry No Result</li></ul>';
				    $('.result').append(html)
			    },
			});
		}else{
			$('.result').empty();
		}
			
	}

	</script>
</html>
