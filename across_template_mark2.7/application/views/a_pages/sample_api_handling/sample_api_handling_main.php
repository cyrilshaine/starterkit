<h3>Sample API handling with jquery</h3>
<h4>Example your api returns a json like this</h4>
<pre>
[
{
	name:John
	age:12
},
{
	name:James
	age:11
},
{
	name:Jolly
	age:12
},

]


The URL of this api for example is http://localhost/yourapp/index.php/sample_api_handling/get_details_api

you will use 

$.post("http://localhost/yourapp/index.php/sample_api_handling/get_details_api").done(function(data){
var n=JSON.parse();   //this parses json

n[0].name //based on the sample returned json is equivalent to John 
n[0].ages //based on the sample returned json is equivalent to 12 

n[1].name //based on the sample returned json is equivalent to James 
n[1].ages //based on the sample returned json is equivalent to 11 





});



or 



$.ajax({
	url:"",
	data:{}, //<--if you need to transfer data to php
	method:"POST",
	success:function(data){
		var n=JSON.parse(data);


n[0].name //based on the sample returned json is equivalent to John 
n[0].ages //based on the sample returned json is equivalent to 12 

n[1].name //based on the sample returned json is equivalent to James 
n[1].ages //based on the sample returned json is equivalent to 11 





    },
    error:function(err){
         console.log(err);
    }
});




... you may use fetch if you want....as long as we generate APIs (usually returns json string or jsons) from out back end code


</pre>


<div style='margin-top:5%; margin-bottom:5%;'>

	<h1>Sample Results</h1>
<div id='apiresult'></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
getapi();
});



function getapi(){ //a functions that performs basic apiu
$.post(URL+"index.php/sample_api_handling/get_details_api").done(function(data){
var n=JSON.parse(data); /*parses json encoded data*/
var str="";
for(var x=0;x<n.length;x++){
str+="Name: "+n[x].name+"<br>"; //get data of index
str+="Age: "+n[x].age+"<br>"; //get data of index
}









$('#apiresult').html(str);
});
}
</script>