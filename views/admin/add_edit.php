<div>
	<div id="insert_new_book" >
		<?php $isbn = $args['isbn']; // print_r($args); ?>
		<form role="form" action="<?php echo SITE_ROOT . "admin/" . ($isbn ? "update_book" : "create_book"); ?>" method="post">
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<?php if($isbn) : ?>
				<input type="text" name="isbn" class="form-control" id="isbn" value="<?php echo $isbn; ?>" disabled />
				<?php else : ?>
				<input type="text" name="isbn" class="form-control" id="isbn" />
				<?php endif; ?>
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control" id="title" value="<?php echo $args['book']['title']; ?>"/>
			</div>
			<div class="form-group">
				<label for="AuthorBox">Author(s):</label>
				<div class="form-group" id="AuthorBox">
					<table class="table table-stripted">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last Name</th>
							</tr>
						</thead>
						<tbody id="addAuthorList" count="1">
						<?php if (isset($args['authors'])) {
							$count = 1;
							foreach ($args['authors'] as $author) { ?>
							<tr>
								<td><input type="text" name="firstName<?php echo $count; ?>" class="form-control" value="<?php echo $author['first_name']; ?>"/></td>
								<td><input type="text" name="lastName<?php echo $count; ?>" class="form-control" value="<?php echo $author['last_name']; ?>"/></td>
							</tr>
						<?php 	$count++; }
						} 
						else { ?> 
							<tr>
								<td><input type="text" name="firstName1" class="form-control" /></td>
								<td><input type="text" name="lastName1" class="form-control"/></td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<td><a href="#" id="addAuthor">Add Author</a></td>
							<td><a href="#" id="removeAuthor">Remove
 last author</a></td>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="form-group">
				<label for="publisher">Publisher:</label>
				<input type="text" name="publisher" class="form-control" id="publisher" value="<?php echo $args['book']['publisher']; ?>" />
				<label for="year">Year:</label>
				<input type="text" name="year_published" class="form-control" id="year" maxlength="4" value="<?php echo $args['book']['year_published'] ?>" />
			</div>
			<div class="form-group">
				<label for="category">Category:</label>
				<select name="category" id="editCategory" class="form-control" <?php if ($isbn) {
					$category = $args[book][category]; echo "set_to=\"$category\""; }?>>
				    	<option value="art">Art</option>
				    	<option value="biology">Biology</option>
				    	<option value="chemistry">Chemistry</option>
				    	<option value="compsci">Computer Science</option>
				    	<option value="english">English</option>
				    	<option value="film">Film</option>
				    	<option value="math">Mathematics</option>
				    	<option value="music">Music</option>
				</select>
				<label for="price">Price:</label>
				<input type="text" name="price" class="form-control" id="price" value="<?php echo $args['book']['price']; ?>" />
				<label for="quantity">Min. Qty Required In-Stock:</label>
				<input type="text" name="inventory_minimum" class="form-control" id="quantity" value="<?php echo $args['book']['inventory_minimum']; ?>" />
			</div>
			<div class="form-group">
				<label for="reviewsBox">Review(s):</label>
				<div class="form-group" id="reviewsBox" count="1">
				<?php 
				$count = 1; 
				if (isset($args['reviews'])) { 
					foreach ($args['reviews'] as $review) { ?>
					<textarea name="review<?php echo $count; ?>" class="form-control"><?php echo $review['review_text']; ?></textarea>
				<?php $count++;} } else { ?>
					<textarea name="review1" class="form-control"></textarea>
				<?php } ?>
				</div>
				<a href="#" id="addReview" class="addReview">Add Review</a><a href="#" id="removeReview" class="removeReview">Remove last review</a>
			</div>
			<div class="form-group">
				<input type="hidden" name="deleted" value="0" />
				<input type="submit" class="form-control" value="Insert" />
				<input type="button" class="form-control" value="Cancel" />
			</div>

		</form>
	</div>
</div>
</div>


