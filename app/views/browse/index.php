<br/>
<br/>

País <br /><br />
<?php
foreach ($viewData as $key => $value) {
	if ($viewData[$key]['id_type'] == 'Country') {
		echo "<a href='" . URL . "home/index/" . $viewData[$key]['id'] . "'>" . $viewData[$key]['descr'] . "</a> (" . $viewData[$key]['user_count'] . ")<br/>";
		unset($viewData[$key]);
	} else {
		break;
	}
}

echo "<hr/>Estado<br/><br/>";
foreach ($viewData as $key => $value) {
	if ($viewData[$key]['id_type'] == 'State') {
		echo "<a href='" . URL . "home/index/" . $viewData[$key]['id'] . "'>" . $viewData[$key]['descr'] . "</a> (" . $viewData[$key]['user_count'] . ")<br/>";
		unset($viewData[$key]);
	} else {
		break;
	}
}

echo "<hr/>Cidade<br/><br/>";
foreach ($viewData as $key => $value) {
	if ($viewData[$key]['id_type'] == 'City') {
		echo "<a href='" . URL . "home/index/" . $viewData[$key]['id'] . "'>" . $viewData[$key]['descr'] . "</a> (" . $viewData[$key]['user_count'] . ")<br/>";
		unset($viewData[$key]);
	} else {
		break;
	}
}
?>

<br/>
<br/>
