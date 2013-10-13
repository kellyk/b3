<div>
	<div id="insert_new_book" >	
		<form role="form">
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<?php if($_GET['isbn']) : ?>
				<input type="text" name="isbn" class="form-control" id="isbn" value="<?php echo $_GET['isbn']; ?>" disabled />
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
						<tbody>
							<td><input type="text" name="firstName" class="form-control"/></td>
							<td><input type="text" name="lastName" class="form-control"/></td>
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
				<input type="text" name="year" class="form-control" id="year" maxlength="4" />
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
				<input type="text" name="quantity" class="form-control" id="quantity" />
			</div>
			<div class="form-group">
				<label for="reviewsBox">Review(s):</label>
				<div class="form-group" id="reviewsBox">
					<textarea name="review" class="form-control"></textarea> 
				</div>
				<a href="#" class="addReview">Add Review</a><a href="#" class="removeReview">Remove last review</a>
			</div>
			<div class="form-group">
				<input type="button" class="form-control" value="Insert" />
				<input type="button" class="form-control" value="Cancel" />
			</div>
			
		</form>
	</div>
</div>
</div>


