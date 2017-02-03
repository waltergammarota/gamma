<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/movies/index">Home</a></li>
  <li class="breadcrumb-item">Movie Detail</li>
  <li class="breadcrumb-item active" data-intro="Just a detail of the Movie"><i class="fa fa-film" aria-hidden="true"></i> <?php echo $data['Movie']['show_title']?></li>
</ol>

<div class="card">
	<div class="row">
		<div class="col-md-6">
			<img class="card-img-top" src="<?php echo $data['Movie']['poster']?>" style="width:100%" onerror="this.src='/public/not_available.gif'">
		</div>
		<div class="col-md-6">
		  <div class="card-block">
		    <h4 class="card-title"><?php echo $data['Movie']['show_title']?></h4>
		    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['Movie']['category']?></h6>
		    <p class="card-text">
		    	<b><i class="fa fa-calendar" aria-hidden="true"></i> Release Year:</b> <?php echo $data['Movie']['release_year']?> <BR>
		    	<b><i class="fa fa-star" aria-hidden="true"></i> Rating:</b> <?php echo $data['Movie']['rating']?> <BR>
		    	<b><i class="fa fa-clock-o" aria-hidden="true"></i> Runtime:</b> <?php echo $data['Movie']['runtime']?> <BR>
		    	<b><i class="fa fa-video-camera" aria-hidden="true"></i> Director:</b> <?php echo $data['Movie']['director']?> <BR>
		    </p>
		    <p class="card-text">
		    	<h5>Cast:</h5>
		    	<?php echo $data['Movie']['show_cast']?>
		    </p>
		    <p class="card-text">
		    	<h5>Summary:</h5>
		    	<?php echo $data['Movie']['summary']?> <BR>
		    </p>
			<a class="btn btn-danger btn-sm float-right m-2" href="/movies/delete/<?php echo $data['Movie']['id']?>" data-intro="And the option to delete it from the database">
				<span class="item">
				<i class="fa fa-trash-o" aria-hidden="true"></i> Delete this Movie
				</span>
			</a>
		  </div>
	  </div>
  </div>
</div>
