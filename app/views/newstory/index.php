<h1>New Story</h1>

<form method="post" action="<?=URL?>newstory/create">
    <label>Titulo</label><input type="text" name="title" /><br />
    <label>Texto</label><input type="text" name="text" /><br />
    <label>Tags</label><input type="text" name="tags" /><br />
    <input type="hidden" name="userId" value="<?php echo Session::get('userId') ?>" /><br />


    <input type="radio" name="location_radio" value="1">
    <select id="location" name="location"> 
    	<option value="1">Brasil</option>
    </select>
	<br />

	<input type="radio" name="location_radio" value="2">
    <select id="location" name="location">
    	<option value="2">Paraná</option>
    	<option value="3">Santa Catarina</option>
    	<option value="4">Rio Grande do Sul</option>
    </select>
	<br />

	<input type="radio" name="location_radio" value="3">
    <select id="location" name="location">
    	<option value="5">Rio do Sul</option>
    	<option value="6">Balneário Camboriú</option>
    	<option value="7">Blumenau</option>
    </select>
	<br />

    <label>&nbsp;</label><input type="submit" />
</form>