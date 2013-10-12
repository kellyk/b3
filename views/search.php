<?php include_once('views/global/header.php'); ?>
<div>
<form role="form">
  	<div class="form-group">
	    <label for="searchFor">Search for:</label>
	    <input type="text" class="form-control" id="searchFor" placeholder="ex. Databases">
	</div>
  	<div class="form-group">
	    <label for="category">Category:</label><br/>
	    <select multiple name="category" id="category" class="form-control">
	    	<option value="compsci">Computer Science</option>
	    	<option value="music">Music</option>
	    	<option value="english">English</option>
	    </select>
  	</div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>

<?php include_once('views/global/footer.php'); ?>
