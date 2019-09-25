 <?php
session_start();
 ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url();  ?>resources/fullcalendar/fullcalendar.print.css">
		<script type="text/javascript" src="<?php echo base_url();  ?>resources/fullcalendar/fullcalendar.js" ></script>
<div id="dashboardPanel" style=" width:50%; float:left">
<center>
<?php
$accountId=$_SESSION['2016_03_20across_accountid'];//$this->session->userdata('accountId');
$query = $this->db->query("select distinct a.pageName,a.pageAlias, b.moduleId, a.pageId,c.iconFileName 
	                       from across_page as a,across_module as b, across_icons as c,across_p_authorization as d,across_p_user_account as e,across_account_type_template as f
	                       where
	                       a.moduleId=b.moduleId and  d.pageId=a.pageId and d.pageId=f.pageId and d.accountid='$accountId' and d.accountid=e.accountid and e.userTypeId=f.userTypeId and f.aview='1'
	                       order by a.pageOrder,b.moduleOrder
	                        ");
$dashboard=$query->result();
$this->load->helper("url");
$i=0;
foreach($dashboard as $x){
		$icon=$x->iconFileName;
		$name=$x->pageName;
		$pageAlias=$x->pageAlias;
		$pageId=$x->pageId;
		$moduleId=$x->moduleId;
echo "
<a class='cpanelImageLink' target='_top' href='".base_url()."/index.php/main/page/$pageId/$accountId'>
<center>
<img style='width:53px; height:53px;' alt='My Profile' src='".base_url()."resources/images/cpanel/$icon'></img>
<span class='cpanelImageLinkLabel' style='font-size:11px;'>
        $name
    </span>
</center>
</a>
";
}
?>
</div>
<!--Dashboard-->
<div id="calendar" style=" width:50%; float:right; font-size:11px;"></div>
<div id="dialog_event"  style="display:none;font-size:12px; margin-top:20px;overflow:hidden;">  hello :) </div>
<script type="text/javascript">
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				/*$("#dialog_event").dialog('option', 'title', (m_names[start.getMonth()])+" "+start.getDate()+", "+start.getFullYear());
				 $('#dialog_event').dialog('open');*/
			}
			/*events: [
				{
					title: "",
					start: new Date(y, m, 1),
					backgroundColor: '#CCC',
					color: '#CCC',
					className:'td-info'
				},
			]*/				
		});



   	 $("#dialog_event").dialog({
        autoOpen: false,
        resizable: false,
        position: 'center',
        stack: true,
        height: '250',
        width: '450',
        modal: true,
		buttons: [
		{
		text: "CLOSE",
		click: function() { $(this).dialog( "close" ).css('color','000'); }
	    }
	    ]     
     });
</script>
