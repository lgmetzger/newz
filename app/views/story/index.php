<h1><?=$viewData['title']?></h1>

<?php
echo $viewData['body'];
echo "<br/><br/>Views: " . $viewData['view_count'];
// echo "<br/>Local: " . $viewData['descr'];
?>
<br />
Local: <a href="<?=URL?>home/index/<?=$viewData['id_location']?>"><?=$viewData['descr']?></a><br />
Autor: <a href="<?=URL?>home/user/<?=$viewData['id_author']?>"><?=$viewData['name']?></a><br />
<?php

	echo "Tags: ";

	// 1_a,2_b,3_c
	$tags = explode(',', $viewData['Tags']);
	$toPrint = '';

	foreach ($tags as $key2 => $value2) {
		$currentTag = explode('_', $tags[$key2]);
		$toPrint .= "<a href=' " . URL . "home/tag/$currentTag[0]'>$currentTag[1]</a>" . ', ';
	}

	echo rtrim($toPrint, ', ');

?>

<br /><br />




<h3>Comentarios</h3>
<textarea name="comment_body" form="comment_form" rows="5" cols="50" placeholder="Comment"></textarea>
<form action="comment/submit" method="post" id="comment_form" onclick="alert(1);return false;">
	<input type="hidden" name="userId">
	<input type="submit">
</form>

<br />