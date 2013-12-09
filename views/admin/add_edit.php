<div>
	<div id="insert_new_book" >
		<form role="form" action="<?php echo $isbn ? "update_book" : "create_book"; ?>" method="post">
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<?php if($isbn) : ?>
				<input type="text" name="isbn" class="form-control" id="isbn" value="<?php echo $isbn; ?>" disabled />
				<?php else : ?>
				<input type="text" name="isbn" class="form-control" id="isbn" />
				<?php endif; ?>
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control" id="title" />
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
							<tr>
								<td><input type="text" name="firstName1" class="form-control"/></td>
								<td><input type="text" name="lastName1" class="form-control"/></td>
							</tr>
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
				<input type="text" name="publisher" class="form-control" id="publisher" />
				<label for="year">Year:</label>
				<input type="text" name="year_published" class="form-control" id="year" maxlength="4" />
			</div>
			<div class="form-group">
				<label for="category">Category:</label>
				<select name="category" class="form-control" id="category">
					<option value="compsci">Computer Science</option>
					<option value="music">Music</option>
					<option value="english">English</option>
				</select>
				<label for="price">Price:</label>
				<input type="text" name="price" class="form-control" id="price" />
				<label for="quantity">Min. Qty Required In-Stock:</label>
				<input type="text" name="inventory_minimum" class="form-control" id="quantity" />
			</div>
			<div class="form-group">
				<label for="reviewsBox">Review(s):</label>
				<div class="form-group" id="reviewsBox">
					<textarea name="review" class="form-control"></textarea>
				</div>
				<a href="#" class="addReview">Add Review</a><a href="#" class="removeReview">Remove last review</a>
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


