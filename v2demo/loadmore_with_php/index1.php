
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>jPut with ajax</title>

	<!-- jPut core JavaScript -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<!-- jPut core JavaScript -->
	<script src="../../js_eval/jput.js"></script>

	<script>
	
	//var jput_list;	
	$(document).ready(function(){

			//your json data for initial load
		var list=[
				    {
				        "name": "Google",
				        "link": "http://google.com",
				        "data": [
				            {
				                "dt": "data1"
				            },
				            {
				                "dt": "data2"
				            }
				        ],
				        "description": "Initial data"
				    },
				    {
				        "name": "Bing",
				        "link": "bing.com"
				    }
				];
		
		jput_list=$('#list_div').jPut({
			jsonData:list,	
			clear:true,
			name:'list'
		});  
		/*
		//loading json data initally using ajax
		list=$('#list_div').jBind({
			jsonData:json,	
			name:'list', 	//jPut Template name
			error:function(msg)
			{
				alert(msg);
			}
		});
		*/


    /*
		//on click loading json from file & appending
		$('#load_more').click(function(){
			page++;
			//loading more data
			$('#list_div').jPut({
				ajax_url:"contries1.json",
				name:'list', 	//jPut Template name
				prepend:true,
				clear:true,
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
    */

	});
	</script>
	</head>

  <body>

	  <div class="page-header">
        <h1>Country Lists </h1>
      </div>
      <input type="text" value="" onkeyup="jput_list.bind(jput_list.data.json[0].name=this.value)">
       <a id="load_more" href="#list">Click Here to perpend more</a><br/>

		<!-- Creating a jPut template & with a jPut name "list" ->
	    <!-- while rendering the json data {{link}}  will be replced with the json data value. -->
          <div class="list-group" jPut="list"  >
                  	<h1>{{json.name}}</h1>
			<br/>
			<span>Country Link : {{json.link}}</span>
          </div>

		<!-- div which you want to append -->
        <div id="list_div">

        </div>

 </body>
</html>
