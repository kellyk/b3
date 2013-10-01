<!--
	The following content is just a modal box and javascript for the first
	time the user lands on this website (if they have modern browser).
	If they have an older browser they are redirected to search page
-->
<script>
$(document).ready(function() {

	// if we have access to local storage, we can do a one-off modal box to let the user choose
	// between logging in, registering, or searching. Otherwise just let them hit the search screen.
	if(typeof(Storage)!=="undefined") {
		var db = db || localStorage;
		if (!db.entryScreenShown) {
			$('#firstScreenModal').modal("show");
			db.entryScreenShown = true;
		}
	} else {
		window.location = "./search";
	}

	$('#firstScreenFormSubmit').click(function() {
		var selection = $('#firstScreenForm input[type="radio"]:checked').val();

		switch(selection) {
			case 'new':
				window.location = "./profile"
				break;
			case 'returning':
				window.location = "./login"
				break;
			case 'admin':
				window.location = "./login"
				break;
			default:
				window.location = "./search"
				break;
		}
	});
});
</script>
<!-- -->
<div id="firstScreenModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Welcome to Best Book Buy</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="firstScreenForm">
        	<div class="radio">
			  	<label>
			    	<input type="radio" name="firstPageAction" value="search" checked />
			    	Search Only
			  	</label>
			</div>
			<div class="radio">
			  	<label>
			    	<input type="radio" name="firstPageAction" value="new" />
			    	New Customer
			  	</label>
			</div>
			<div class="radio">
			  	<label>
			    	<input type="radio" name="firstPageAction" value="returning" />
			    	Returning Customer
			  	</label>
			</div>
			<div class="radio">
			  	<label>
			    	<input type="radio" name="firstPageAction" value="admin">
			    	Administrator
			  	</label>
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Default</button>
        <button type="button" class="btn btn-primary" id="firstScreenFormSubmit">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
