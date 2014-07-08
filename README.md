
<h1>jPut</h1>
<h2>Put you JSON to HTML easily.</h2>

<b>Description</b><br/>
jPut is a small jquey plugin which you can append your JSON to customized HTML format.

Step 1: Create a jPut HTML Template
Step 2: Call the jPut function with your json data or call the json url

jPut<br/>
<b>Installation</b>

<pre>
src="code.jquery.com/jquery-1.11.0.min.js"
<!-- Adding jput file (Dont worry about the size its less than 2kb)-->
src="js/jput.min.js"
</pre>

<b>jPut HTML Template</b>
<pre>

//jPut HTML Template (it will he hidden)
<div jput="template1">
    <div class="items" id="item_{{id}}">
      <span>{{name}}</span>
      //for image tag to avoid error put 'jsrc' instead of 'src'
	  <img jsrc="/images/{{image_loc||default.jpg}}" alt=""/>
      <span>{{description}}</span>
    </div>
</div>

<div id="main">
</div>

//JSON Data    
var projects=[{"id":"8","name":"name1","description":"This is a test","image_loc":"image1.jpg"}, {"id":"9","name":"name2", "description":"Test 2","image_loc":"image2.jpg"}];

//The div you want to upload    
$('#main').jPut({
        dataName:'',        //object name if the json data is in specified object
        jsonData:projects,      //(jsonData/ajax_url) is required	your json data to append/prepend
        ajax_url:'http://yourdomain.com/data.json',      //ajax:Specifies the URL to send the request to. Default is the current page
        ajax_data:'',      //ajax:specifies data to be sent to the server
        ajax_type:'',      //ajax:specifies the type of request. (GET or POST)
		name:'template1',   //*required field	jput template name
        limit:0,            //default:0         limit the number of record to show
        prepend:false,      //default:false     If you want to prepend data make it true. By default data will append 
        done:function(e){   
                            //on success (e will be the json data)
            },
        error:function(msg){
            alert('Error Message:'+msg);    //On error
        }
});
</pre>
