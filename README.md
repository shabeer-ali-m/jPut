
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
</pre>

<b>jPut Code</b>

<pre>
//JSON Data    
var projects=[{"id":"8","name":"name1","description":"This is a test","image_loc":"image1.jpg"}, {"id":"9","name":"name2", "description":"Test 2","image_loc":"image2.jpg"}];

//The div you want to upload    
$('#main').jPut({
        dataName:'',        //object name if the json data is in specified object
        jsonData:projects,      //(jsonData/ajax_url) is required	your json data to append/prepend
        ajax_url:'http://yourdomain.com/data.json',      //ajax:Specifies the URL to send the request to. Default is the current page
	name:'template1',   //*required field	jput template name
        limit:0,            //default:0         limit the number of record to show
        prepend:false,      //default:false     If you want to prepend data make it true. By default data will append 
        ajax_data:'',      //ajax:specifies data to be sent to the server
        ajax_type:'',      //ajax:specifies the type of request. (GET or POST)
        ajax_dataType:'json',   //ajax:you can use 'json' or 'jsonp'. By deafult it will be json
        ajax_jsonpCallback:'',  //ajax:jsonp callback
        done:function(e){   
                            //on success (e will be the json data)
            },
        error:function(msg){
            alert('Error Message:'+msg);    //On error
        }
});
</pre>

<b>jPut with Multidimensional json</b>

<pre>
{
    "name": "Shabeer Ali M",
    "tags": [
        "json",
        "jput",
        "append"
    ],
    "comments": [
        {
            "name": "user1",
            "comment": "its awsome !"
        },
        {
            "name": "user2",
            "comment": "its easy !"
        }
    ]
}
</pre>
If you want to display name & comment of the 1st user the jPut template should be like this.

<pre>
    The first comment was made by {{comments.0.name}}. Comment : {{comments.0.comment}}
    {{tags}} will gave all the tags.
    1st tag : {{tags.0}}
</pre>


<b>jPut with jsonp</b>

<pre>
        //loading jsonp data using ajax
        $('#yahooEntry').jPut({
            ajax_url:'//pipes.yahoo.com/pipes/pipe.run?_id=e4e173cf75b0aa1b374b7987398d6091&_render=json&_callback=getYahooFeed',
            ajax_jsonpCallback:'getYahooFeed',  //jsonp call back
            ajax_dataType:'jsonp',              //jsop or json
            dataName:'value.items',         
            name:'list'                         //jPut name
        });
</pre>


