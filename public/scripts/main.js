$(document).ready(function(){

	$('#clearStorage').tooltip('show');

	$('input[name="credit-card"]').click(function() {
		if($(this).val() === 'new'){
			console.log("hi");
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

	$('#addAuthor').click(function(e) {
		e.preventDefault();
		var authorTable = $('#addAuthorList');
		var count = authorTable.attr('count') || 1;
		count++;
		authorTable.attr('count', count);
		$('#addAuthorList tr:last').after('<tr><td><input type="text" name="firstName'+ count + '" class="form-control"/></td>'
			+ '<td><input type="text" name="lastName'+count+'" class="form-control"/></td></tr>'
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
});
