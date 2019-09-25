


<!-- Modal blue -->
<div class="modal fade " id="centralModal_blue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
               
                <h4 class="modal-title w-100"  id='jse-modal-title'></h4>
                 <button type="button" style='float:right;' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body" id='jse-modal-content'>
                
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id='jse-btn'>Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->


<!-- Modal red-->
<div class="modal fade " id="centralModal_red" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
               
                <h4 class="modal-title w-100"  id='jse-modal-title'></h4>
                 <button type="button" style='float:right;' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body" id='jse-modal-content'>
                
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id='jse-btn'>Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->




<!-- Modal yellow-->
<div class="modal fade " id="centralModal_yellow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
               
                <h4 class="modal-title w-100"  id='jse-modal-title'></h4>
                 <button type="button" style='float:right;' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body" id='jse-modal-content'>
                
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id='jse-btn'>Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->




<!----------

Confirmation Modals
--------->


<!-- Modal blue -->
<div class="modal fade " id="centralModal_confirm_blue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
               
                <h4 class="modal-title w-100"  id='jse-modal-title'></h4>
                 <button type="button" style='float:right;' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body" id='jse-modal-content'>
                
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  id='jse-btn'>Close</button>
                 <button type="button" class="btn btn-success"  id='jse-btn-save'>Save</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->





<script type="text/javascript">
/*

Usage

jse_confirm_dialog({type:"blue",title:"hello world",html:"<h1>dfgdgd</h1>",save_text:"Save",cancel_text:"Close",success:function(){  },cancel:function(){   }});

*/
function jse_confirm_dialog(options){

var title=(options.title)?options.title:"";
	var html_content=(options.html)?options.html:"";
	var closebtn=(options.cancel_text)?options.cancel_text:"Close";
	var savebtn=(options.save_text)?options.save_text:"Save";
    var success=(options.success)?options.success:function(){};
    var cancel=(options.cancel)?options.cancel:function(){};

	  $('#centralModal_confirm_blue').modal('show');
	  $('#centralModal_confirm_blue #jse-modal-title').html(title);
	  $('#centralModal_confirm_blue #jse-modal-content').html(html_content);
	  $('#centralModal_confirm_blue #jse-btn').html(closebtn);
	  $('#centralModal_confirm_blue #jse-btn-save').html(savebtn);



	    $('#centralModal_confirm_blue #jse-btn').click(function(){   $('#centralModal_confirm_blue').modal('hide'); cancel(); });
	  $('#centralModal_confirm_blue #jse-btn-save').click(function(){ success(); });
     

}


function jse_confirm_dialog_hide(){
     $('#centralModal_confirm_blue').modal('hide'); 
}


/*

Usage

jse_dialog({type:"blue",title:"hello world",html:"<h1>dfgdgd</h1>",button_text:"Go"});

*/
function jse_dialog(options){

if(options.type=="blue"){
	var title=(options.title)?options.title:"";
	var html_content=(options.html)?options.html:"";
	var closebtn=(options.button_text)?options.button_text:"Close";

	  $('#centralModal_blue').modal('show');
	  $('#centralModal_blue #jse-modal-title').html(title);
	  $('#centralModal_blue #jse-modal-content').html(html_content);
	  $('#centralModal_blue #jse-btn').html(closebtn);




}
else if(options.type=="red"){
	var title=(options.title)?options.title:"";
	var html_content=(options.html)?options.html:""; 
	var closebtn=(options.button_text)?options.button_text:"Close";
	  $('#centralModal_red').modal('show');
	  $('#centralModal_red #jse-modal-title').html(title);
	  $('#centralModal_red #jse-modal-content').html(html_content);
	   $('#centralModal_red #jse-btn').html(closebtn);



}
else if(options.type=="yellow"){
	var title=(options.title)?options.title:"";
	var html_content=(options.html)?options.html:""; 
	var closebtn=(options.button_text)?options.button_text:"Close";
	  $('#centralModal_yellow').modal('show');
	  $('#centralModal_yellow #jse-modal-title').html(title);
	  $('#centralModal_yellow #jse-modal-content').html(html_content);
	   $('#centralModal_yellow #jse-btn').html(closebtn);



}
else{
var title=(options.title)?options.title:"";
var html_content=(options.html)?options.html:""; 
var closebtn=(options.button_text)?options.button_text:"Close";
	  $('#centralModal_blue').modal('show');
	  $('#centralModal_blue #jse-modal-title').html(title);
	  $('#centralModal_blue #jse-modal-content').html(html_content);
	   $('#centralModal_blue #jse-btn').html(closebtn);

}

}
</script>