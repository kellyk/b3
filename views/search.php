<?php include_once('views/global/header.php'); ?>

<div class="col-md-6">
<div>
<form role="form">
  	<div class="form-group">
	    <label for="searchFor">Search for:</label>
	    <input type="text" class="form-control" id="searchFor" placeholder="ex. Databases">
	</div>
	<div class="form-group">
	    <label for="searchIn">Search in:</label>
	    <select name="searchIn" id="searchIn" class="form-control" multiple>
	    	<option value="keyword">Keyword Anywhere</option>
	    	<option value="title">Title</option>
	    	<option value="author">Author</option>
	    	<option value="publisher">Publisher</option>
	    	<option value="isbn">ISBN</option>
	    </select>
	</div>
  	<div class="form-group">
	    <label for="category">Category:</label><br/>
	    <select name="category" id="category" class="form-control">
	    	<option value="art">Art</option>
	    	<option value="biology">Biology</option>
	    	<option value="chemistry">Chemistry</option>
	    	<option value="compsci">Computer Science</option>
	    	<option value="english">English</option>
	    	<option value="film">Film</option>
	    	<option value="math">Mathematics</option>
	    	<option value="music">Music</option>
	    </select>
  	</div>

  <!--This button auto forwards temporarily -->
		<a href="<?php echo SITE_ROOT; ?>search/results" class="btn btn-primary">Submit</a>
</form>
</div>
</div>

<?php include_once('views/global/footer.php'); ?>
