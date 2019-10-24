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
Author: Author: Mr. Jayanath Liyanage   jayanathl@icta.lk
                 
URL: http://www.govforge.icta.lk/gf/project/hhims/
----------------------------------------------------------------------------------
*/


 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//echo count ($top_menu);

	
	$el_menu_count = count($toolbar_menu);
		$el_menu = '';
		$el_menu.= '<ul class="nav nav-pills "><div class="">';
		
			for ($i = 0 ; $i < $el_menu_count ; $i++){
				$el_menu.= '<button type="button" class="btn btn-default" title="'.$toolbar_menu[$i]["name"].'" onclick = "'.$toolbar_menu[$i]["on_click"].'">';
				$el_menu.= '<span class="'.$toolbar_menu[$i]["image"].'"></span>';
				$el_menu.= '</button>';
			}
		$el_menu.= '</div></ul>';
	echo $el_menu;
		
?>

