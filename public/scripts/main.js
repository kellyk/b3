$(document).ready(function(){

	$('#clearStorage').tooltip('show');

	$('input[name="credit-card"]').click(function() {
		if($(this).val() === 'new'){
			$('.newCreditCard').show();
		} else
			$('.newCreditCard').hide();

	});

	$('.main-nav li').click(function(e){
		$('.main-nav li').removeClass('active');
	});

	$('#site_login_submit').click(function(e){
		e.preventDefault();
		$('#login_form').submit();
	});

	$('#searchFor').on('keyup blur focus', function() {
		if ($(this).val() < 1)
			$('#searchSubmit').attr('disabled', 'disabled');
		else
			$('#searchSubmit').removeAttr('disabled');
	});

	$('#addAuthor').click(function(e) {
		e.preventDefault();
		var authorTable = $('#addAuthorList');
		var count = authorTable.attr('count') || 1;
		count++;
		authorTable.attr('count', count);
		$('#addAuthorList tr:last').after('<tr><td><input type="text" name="firstName'+ count + '" class="form-control"/></td>' +
			'<td><input type="text" name="lastName'+count+'" class="form-control"/></td></tr>'
		);
	});

	$('#removeAuthor').click(function(e) {
		e.preventDefault(e);
		var authorTable = $('#addAuthorList');
		var count = authorTable.attr('count') || 1;
		if (count > 1) {
			count--;
			authorTable.attr('count', count);
			$('#addAuthorList tr:last').remove();
		}
	});

	$('#addReview').click(function(e) {
		e.preventDefault();
		var reviews = $('#reviewsBox');
		var count = reviews.attr('count') || 1;
		count++;
		reviews.attr('count', count);
		reviews.find('textarea:last').after('<textarea name="review'+count+'" class="form-control"></textarea>');
	});

	$('#removeReview').click(function(e) {
		e.preventDefault();
		var reviews = $('#reviewsBox');
		var count = reviews.attr('count') || 1;
		if (count > 1) {
			count--;
			reviews.attr('count', count);
			reviews.find('textarea:last').remove();
		}
	});
});
