# jPut - JSON to HTML
jPut is a small jQuery plugin where you can append your JSON to customized HTML format easily. You can also dynamically bind values to your existing data easily. Its simple and fast. The jPut can call by usind data attributes.

### Features
  - You can load JSON via AJAX 
  - It can supoprt multi dimensional JSON
  - It support JSONP format

### Version
2.0.2

### Dependencies
[jQuery]

### Demo
[Simple jPut Demo]

[One Dimensional Demo]

[Multi Dimensional Demo]

[Data Binding Demo]

[Load More with jPut]

[Todo App]

[Expression]


### Installation
You need to add jquery.js & jput2.js :
```sh
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/jput.min.js"></script>
```

### Simple Example

In this simple example you have list of users as JSON. So you want to render all this as html. In this example you are using data attributes to call jPut.

#####Code 

```sh
<ul jput="users" jput-jsondata='[{"name":"User 1"},{"name":"User 2"},{"name":"User 3"}]'>
     	<li>{{json.name}}</li>
</ul> 
```

In this example <code>jput="users"</code> attribute sets the entire div as jPut template for methord users. By putting this attribute the jPut will create a Object inside the variable jPut.[<code>jPut.users</code>] (NOTE: jPut variable is created inside the jQuery plugin. So please avoide to use jPut variable in your code).

<code>jput-jsondata=''</code> is the attribute used to set your default data.If your default data is empty jPut wont render anything.

### Databinding
For data binding we use <code>{{ json.name }}</code> expression. Since jPut is storing all values in JSON you have to user <code>json.YOUR_VARIABLE_NAME</code>

### Simple Example 2 (Setting Data in JavaScript)

```sh
<script>
//on document ready
$(document).ready(function(){
    //your variable with your users information
    var users=[{"name":"User 1"},{"name":"User 2"},{"name":"User 3"}];
    /*
    * Binding your json to jPut
    * jPut.<yourTemplateName>.data
    */
    jPut.users.data=users;
});
</script>
      
<ul jput="users">
     	<li>{{json.name}}</li>
</ul> 
```

###Template Properties

In jPut template you can give any kind of expressions and also you can call your own custom JavaScript functions.
jPut expressions are written inside double braces: ```{{ expression }}```.
You can also use different expression if you have conflict with any other plugin or framework.```{[ expression ]}```
For this you have to set you expression as "exp2".

ex :

```sh
<script>
function grade(mark)
{
	if(mark>200)
		return "A";
	else if(mark>150)
		return "B";
	else
		return "C";		
}
</script>
      
<ul jput="users" jput-jsondata='[{"name":"User 1","total":180},{"name":"User 2","total":260}]'>
     	<li>Name : {{json.name}}</li>
     	<li>Total {{json.total}}</li>
     	<li>Percentage {{json.total/300}}</li>
     	<li>Grade {{grade(json.total)}}</li>
     	<li>Grade {{json.total>199?"PASS":"FAIL"}}</li>
</ul> 
```

###jPut Options
```sh
//The div you want to upload    
$('#main').jPut({
        dataName:'',    //object name if the json data is in specified object
        jsonData:projects, //(jsonData/ajax_url) is required	your json data to append/prepend
        ajax_url:'http://yourdomain.com/data.json',//ajax:Specifies the URL to send the request to. Default is the current page
        ajax_data:'', //ajax:specifies data to be sent to the server
        ajax_type:'', //ajax:specifies the type of request. (GET or POST)
		name:'template1', //*required field	jput template name
        limit:0, //default:0         limit the number of record to show
        prepend:false, //default:false     If you want to prepend data make it true. By default data will append 
        done:function(e){   
                            //on success (e will be the json data)
            },
        error:function(msg){
            alert('Error Message:'+msg);    //On error
        }
});
```
To learn more go throught the examples.


License
----

MIT



[jQuery]:http://jquery.com
[Simple jPut Demo]:http://shabeer-ali-m.github.io/jPut/v2demo/demo1/
[One Dimensional Demo]:http://shabeer-ali-m.github.io/jPut/v2demo/demo2/
[Data Binding Demo]:http://shabeer-ali-m.github.io/jPut/v2demo/data-binding/
[Load More with jPut]:http://shabeer-ali-m.github.io/jPut/v2demo/loadmore_with_php/
[Multi Dimensional Demo]:http://shabeer-ali-m.github.io/jPut/v2demo/loop_inside_loop
[Todo App]:http://shabeer-ali-m.github.io/jPut/v2demo/todo
[Expression]:http://shabeer-ali-m.github.io/jPut/v2demo/expression


