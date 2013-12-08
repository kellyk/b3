<?php include_once('views/global/header.php'); ?>
<div>
<?php if (sizeof($data > 0)) { ?>
	
	<h3>Reviews for <span class="text-primary"><?php echo $data[0]['title']?></span></h3>
	<div class="reviews">
		<?php
			foreach ($data as $review) {
				echo '<div class="well review">';
				echo '<p>' . $review['review_text'] . '</p>';
				echo '</div>';
			}
		?>
	</div>
<?php } else { ?>
	No reviews yet!
<?php } ?>

  <!--This button auto forwards temporarily -->
		<a href="<?php echo SITE_ROOT; ?>search/results" class="btn btn-primary">Back to Search Results</a>
</div>

</div>
</div>

<?php include_once('views/global/footer.php'); ?>
