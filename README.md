# jPut

jPut is a small jquey plugin which you can put your JSON as customized HTML format easily.It supports loading JSON via ajax and multi level json. Put your JSON to HTML easily by just two steps.

 - Create jPut Template
 - Call jPut function

### Demo
[Demo Page] 
 
### Version
1.1.6

### Dependencies
[jQuery]

### Installation

You need to add jquery.js & jput.min.js :

```sh
<script src="code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/jput.min.js"></script>
```

### jPut HTML Template

To use jPut you need a jPut template. 

```sh
<div jput="templateName">
    <div class="items" id="item_{{id}}">
      <span>{{name}}</span>
      //for image tag to avoid error put 'jsrc' instead of 'src'
	  <img jsrc="/images/{{image_loc||default.jpg}}" alt=""/>
      <span>{{description}}</span>
    </div>
</div>
```

Template Featurs:
You can gave custom conditions in templates.
On Null:
```sh
<div id="test">{{name||There is no elemant or name is null}}</div>
```

### jPut Code

jPut Javasctipt Code

```sh
//JSON Data    
var projects=[{"id":"8","name":"name1","description":"This is a test","image_loc":"image1.jpg"}, {"id":"9","name":"name2", "description":"Test 2","image_loc":"image2.jpg"}];

//The div you want to upload    
$('#main').jPut({
dataName:'',        //object name if the json data is in specified object
jsonData:projects,      //(jsonData/ajax_url) is required   your json data to append/prepend
ajax_url:'http://yourdomain.com/data.json',      //ajax:Specifies the URL to send the request to. Default is the current page
name:'template1',   //*required field   jput template name
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
```

### jPut with jsonp
```sh
 //loading jsonp data using ajax
    $('#yahooEntry').jPut({
    ajax_url:'//pipes.yahoo.com/pipes/pipe.run?_id=e4e173cf75b0aa1b374b7987398d6091&_render=json&_callback=getYahooFeed',
    ajax_jsonpCallback:'getYahooFeed',  //jsonp call back
    ajax_dataType:'jsonp',              //jsop or json
    dataName:'value.items',         
    name:'list'                         //jPut name
});
```

[Demo Page]:http://shabeer-ali-m.github.io/jPut/
[jQuery]:http://jquery.com/