<?php
foreach ($viewData as $key => $value) {
	?>

	<a href="<?=URL?>story/view/<?=$viewData[$key]['id'] .'/'. $viewData[$key]['title']?>"><h3><?=$viewData[$key]['title']?></h3></a>
	
	Por <a href=""><?=$viewData[$key]['name']?></a> | Em <a href="<?=URL . 'home/index/' . $viewData[$key]['id_location']?>"><?=$viewData[$key]['location_name']?></a>

	<?php
	
}


?>