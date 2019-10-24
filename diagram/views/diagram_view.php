<?php
/*
--------------------------------------------------------------------------------
HHIMS - Hospital Health Information Management System
Copyright (c) 2011 Information and Communication Technology Agency of Sri Lanka
<http: www.hhims.org/>
----------------------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Affero General Public License as published by the Free Software 
Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,but WITHOUT ANY 
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR 
A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along 
with this program. If not, see <http://www.gnu.org/licenses/> or write to:
Free Software  HHIMS
ICT Agency,
160/24, Kirimandala Mawatha,
Colombo 05, Sri Lanka
---------------------------------------------------------------------------------- 
Date : June 2016
Author: Mr. Jayanath Liyanage   jayanathl@icta.lk

Programme Manager: Shriyananda Rathnayake
URL: http://www.govforge.icta.lk/gf/project/hhims/
----------------------------------------------------------------------------------
*/

?>
 <html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Clinic Diagram</title>
	 <?php
		echo "<link rel='icon' type='image/ico' href='". base_url()."images/mds-icon.png'>";
		echo "<link rel='shortcut icon' href='". base_url()."images/mds-icon.png'>";
		echo "<script type='text/javascript' src='".base_url()."/js/jquery.js' ></script>";
		echo "\n    <script type='text/javascript' src='".base_url()."js/bootstrap/js/bootstrap.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/json.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/pain_ploter/pain_ploter.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/pain_ploter/jsgl.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/pain_ploter/MDS.Styler.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/pain_ploter/MDS.Element.js' ></script>";
		echo "<script type='text/javascript' src='".base_url()."/js/pain_ploter/MDS.Editor.js' ></script>";
		
		echo "\n    <link href='". base_url()."js/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />";
		echo "\n    <link href='". base_url()."js/bootstrap/css/bootstrap-theme.min.css' rel='stylesheet' type='text/css' />";	
	?>
	</head>	
  <body style='background:#aaaaaa;'>
  <table border=1 bordercolor='#000000' width=100% height=90% style='background:#555555;font-family:Arial;color:#F1F2F2;'>
  <tr><td colspan=3 id='file' style='font-size:14;'><b><?php echo $diagram_info["name"].'  <i>'.$diagram_info["description"] .'</i>'  ?><b></td></tr>
  <tr>
  <td width=20px  id='left_menu' valign=top>
  <span id='left_tool_menu_div'><?php echo Modules::run('diagram/toolbar');?></span>
  <td>
  <td width=70% height=100% id='info' valign=top>
  <div id="diagram_div">
	<div id="diagram_tool">
		<?php echo Modules::run('diagram/pain_toolbar');?>
	</div>
	  <div id="diagram" style="border:1px solid #FFFFFF;background-repeat:no-repeat;background-image: url('<?php echo base_url().ltrim($diagram_info["diagram_link"],'./'); ?>');width:<?php echo $diagram_info["width"]; ?>px;height:<?php echo $diagram_info["height"]; ?>">
	  </div>
  </div>
  </td>
  <td valign='top'>
	  <?php	
		if ($mode != "VIEW") {
		  echo '<table width=100% border=0 cellspacing=1 cellpadding=2 style="background:#555555;font-family:Arial;color:#F1F2F2;font-size:12px;">';
		  if(isset($patient)){
			  echo '<tr><td width=25% valign=top>Patient : </td><td>';
			  echo $patient["Full_Name_Registered"]. ' ';
			  echo $patient["Personal_Used_Name"];
			  echo '</td></tr>';
			  echo '<tr><td width=25% valign=top>Patient ID : </td><td>'.$patient["PID"].'</td></tr>';
			  echo '<tr><td width=25% valign=top>Patient HIN : </td><td>'.$patient["HIN"].'</td></tr>';
			  echo '<tr><td valign=top>Sex : </td><td><?php echo $patient["Gender"]; ?> </td></tr>';
			  echo '<tr><td valign=top>Age : </td><td>';
			  echo $patient["Age"]["years"].' Years '; 
			  echo $patient["Age"]["months"].' Months'; 
			  echo '</td></tr>';
			  echo '<tr><td valign=top>Address : </td><td>'.$patient["Address_Village"].'</td></tr>';
		  }
		  echo '<tr><td valign=top colspan=2><hr></td></tr>';
		  echo '<tr><td width=25% valign=top>Diagram : </td><td>'.$diagram_info["name"].'</td></tr>';
		   echo '<tr><td valign=top>Remarks : </td><td>'.$diagram_info["description"].'</td></tr>';
		  echo '<tr><td valign=top>Type : </td><td>'.$diagram_info["diagram_type"].'</td></tr>';
	 
		  echo '<tr><td valign=top colspan=2><hr></td></tr>';
		  if ($mode =="run"){
		    echo '<tr><td valign=top align=center><button onclick=save_data(); style="width:200px;height:50px;">Save data</button>';
			if (isset($answer["answer"])){
				echo '<textarea id="diagram_data" style="display:none">'.$answer["answer"].'</textarea>';
			}
			echo '</td></tr>';
		  }
		   else if ($mode =="view_data"){
			if (isset($answer)){
				echo '<tr><td valign=top align=center><textarea id="diagram_data" style="display:none">'.$answer["answer"].'</textarea>';
			}
			else{
				echo '<tr><td valign=top align=center><textarea id="diagram_data" style="display:none"></textarea>';
			}
			echo '<button onclick="window.close()" style="width:200px;height:50px;">Close</button></td></tr>';
		  }
		  else{
		  echo '<button onclick="window.history.back();" class="btn btn-default" style="width:200px;height:50px;">Back</button>';
		  }
		  echo '</table>';
		  
		  if(isset($repid)){
			echo '<input type="hidden" id="repid" value= "'.$repid.'"/>';
		  }
		  else{
			echo '<input type="hidden" id="repid" value= ""/>';
		  }
		} 
	  ?>
	</td></tr>
  
  </table>
<script>
	var plotter = null;
	var editor = new CFEditor(); 
    editor.set_div("diagram");
	editor.base_url = "<?php echo base_url(); ?>";
    editor.init();
	
	if (($("#diagram_data").html()!="")&&($("#diagram_data").html()!=undefined)){
		console.log(JSON.parse($("#diagram_data").html()));
		editor.element_load(JSON.parse($("#diagram_data").html()));
	}
	editor.run($("#repid").val());
	$(function(){
	/*
		plotter = new Pain_ploater();
		plotter.load_tool("diagram_tool");
		plotter.init("diagram");
		if (($("#diagram_data").html()!="")&&($("#diagram_data").html()!=undefined)){
		
			plotter.load_data($("#diagram_data").html());
		}
		*/
	});
	function save_data(){
		var repid =$("#repid").val();
                console.log(editor.get_json());
		window.opener.set_data(JSON.stringify(editor.get_json()),repid);
		window.close();

	}
	function addComment(uid,attid){
		var reg = /[\<\>\.\'\"\:\;\|\{\}\[\]\,\=\+\-\_\!\~\`\(\)\$\#\@\^\&\,\d\\/\\?]/;
		var comment = $("#comment").val().replace(reg,'');
		var result = $.ajax({
			url : "attachment_comment_save.php",
			data:{"UID":uid,"comment":comment,"ATTID":attid},
			global : false,
			type : "POST",
			async : false
		}).responseText;
		if (result!=""){
			$("#other_comments").append(result);
			$("#comment").val("");
		}
	}
</script>
  </body>
  </html>