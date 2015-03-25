<?php
foreach ($viewData as $key => $value) {
	?>

	<a href="<?=URL?>story/view/<?=$viewData[$key]['id'] .'/'. $viewData[$key]['title']?>"><h3><?=$viewData[$key]['title']?></h3></a>
	
	Por <a href=""><?=$viewData[$key]['name']?></a> | Em <a href="<?=URL . 'home/index/' . $viewData[$key]['id_location']?>"><?=$viewData[$key]['location_name']?></a>

	<?php

	echo "| Tags: ";

	// 1_a,2_b,3_c
	$tags = explode(',', $viewData[$key]['Tags']);
	$toPrint = '';

	foreach ($tags as $key2 => $value2) {
		$currentTag = explode('_', $tags[$key2]);
		$toPrint .= "<a href=' " . URL . "home/tag/$currentTag[0]'>$currentTag[1]</a>" . ', ';
	}

	echo rtrim($toPrint, ', ');
	
}


?>