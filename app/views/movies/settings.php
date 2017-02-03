<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/movies/index"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li class="breadcrumb-item active"><i class="fa fa-cog" aria-hidden="true"></i> Settings</li>
</ol>
<div class="card">
	  <div class="card-block">
	    <h4 class="card-title">Empty Database</h4>
	    <p class="card-text">Use this option if you need/want to clear all your database, after doing the reset all data will be deleted.</p>
	    <!-- <h6 class="card-subtitle mb-2 text-muted">Empty Database?</h6> -->
    	<button class="btn btn-danger" data-toggle="modal" data-target="#delete" data-intro="Clear all records from the table movies.">Delete All Records</button>
	  </div>
</div>		
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Reset & Delete all records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
      	<a class="btn btn-success" href="/movies/index">Wanna Start Over?</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	$('#delete').on('show.bs.modal', function (event) {
		$.get( "/movies/reset", function( data ) {
			$('#delete .modal-body').html(data)
			console.log("All Records Deleted");
		});
	});
</script>