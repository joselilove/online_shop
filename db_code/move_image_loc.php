<?php
	
	if (!empty($_FILES['file'])) {
		foreach ($_FILES['file']['name'] as $key => $name) {
			if ($_FILES['file']['error'][$key] == 0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], "image/{$name}")) {
				$uploaded[] = $name;
			}
		}
		if (!empty($_POST['ajax'])) {
			die(json_encode($uploaded));
		}
	}
?>