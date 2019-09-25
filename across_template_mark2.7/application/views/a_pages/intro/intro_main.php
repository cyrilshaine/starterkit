
<?php $this->load->view("a_pages/intro/a_js"); $this->load->view("a_pages/intro/a_css");  ?>

<h3>Intro</h3>
<h4>In using this starterkit we follow a certain pattern somehow simillar to (MVC) pattern but with added features</h4>
<pre>
Requirements: 
*knowledge in MVC patterns
*Basic codeigniter knowledge
*Basic PHP
*knowledge in making REST APIs
*App shell model

***Note***
It is recommended to not write any php code  directly on the html codes.
****


Important Parts at the starter kit

*controllers directory
*models directory
*views directory




controllers directory - we use this for creating links. we initialize the "views" filenames here.

ex.

class Your_page_name extends CI_Controller {

public function your_link_name(){
$this->load->view("a_pages/your_page_name/your_file_name");	
}

...


Model directory - where sql codes are placed although you may also use sql at the "views" files

Views directory - Where your source code will be located
                - your project pages shall be located at the "a_pages" directory

            






            Page directory file structure

            controllers
            ----"your_page_name".php



            models
            ----"your_page_name".php //(optional)  all your page links are here


            
            views
            -----a_pages
            ------------your_page_name
            -----------------a_js.php                     //main js
            -----------------a_css.php                    //main css
            -----------------"your_page_name".php         //initializes your page
            -----------------"your_page_name"_main.php    //where your initial code starts   


you may study "Personnel Information" for more details bout this pattern


************************************************
SQL Rules

instead of---  mysql_query("select * from table")
we use-------- $this->db->query("select * from table");


$query=$this->db->query("select * from table");
$r=$query->result_array();
for($counter=0;$counter&lt;count($r);$counter++){
	
	$x=$r[$counter]['columnname']; //sample accessing of column name
}


//inserting
$this->db->query("INSERT into table values.....");

//updating
$this->db->query("update table set..............");

//deleting
$this->db->query("delete from table .....");


**************************************

When making database tables always add the across_ prefix

also if needed add a "remark" column - 0- means deleted 1- means active..........this is to identify the deleted rows 

</pre>



