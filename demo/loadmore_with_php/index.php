
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>jPut with ajax</title>
	
	<!-- jPut core JavaScript -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<!-- jPut core JavaScript -->
	<script src="../../js/jput.min.js"></script>
	 
	<script>	
	$(document).ready(function(){
		
		page=1;
		//loading json data initally using ajax
		$('#list_div').jPut({
			ajax_url:"contries.php?page="+page,
			prepend:true,
			name:'list', 	//jPut Template name
			error:function(msg)
			{
				alert(msg);
			}
		});	
		
		//on click loading json from file & appending
		$('#load_more').click(function(){
			page++;
			//loading more data
			$('#list_div').jPut({
				ajax_url:"contries.php?page="+page,
				name:'list', 	//jPut Template name
				prepend:true,
				error:function(msg)
				{
					alert(msg);
				},
				done:function(json){
					//hidding load more if the page is 4
					if(page==3)
						$('#load_more').hide();
				}
			});	
		});
		

	});
	</script>	
	</head>

  <body>
      
	  <div class="page-header">
        <h1>Country Lists </h1>
      </div>
       <a id="load_more" href="#list">Click Here to perpend more</a><br/>
	   
		<!-- Creating a jPut template & with a jPut name "list" -> 
	    <!-- while rendering the json data {{link}}  will be replced with the json data value. -->	
          <div class="list-group" jput="list" >
			<span>Country Name : {{name}}</span>
			<img jsrc="flags/{{img}}.png" title="{{name}}"/>
			<br/>
          </div>
		
		<!-- div which you want to append -->
        <div id="list_div">
		  
        </div>

 </body>
</html>
