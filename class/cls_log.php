<?php

class cls_log{
	public static function info($p_message){
		echo html_entity_decode("<script>console.log('".$p_message."');</script>");
	}
}

?>