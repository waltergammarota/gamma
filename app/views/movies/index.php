<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/movies/index"><i class="fa fa-home" aria-hidden="true"></i>  Home</a></li>
  <?if($search){?>
  <li class="breadcrumb-item"><i class="fa fa-search" aria-hidden="true"></i> Search <i>"<?=$search?>"</i></li>
  <?}?>
</ol>
<?if(count($data) > 0 || $search){?>
	<span data-intro='This is the home page, here you can list and filter all the movies stored in your database.'></span>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
				    <h4 class="card-title">Search</h4>
				    <p class="card-text">Filter the results by any of their properties (movie title, cast, director, summary).</p>
					<form class="form-inline" action="/movies/index" method="post" data-intro='Makes a call to the method <b>View All</b> from the controller, using a POST request and render the response into the corresponding View'>
					  <label class="sr-only" for="searchTerm">Name</label>
					  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="searchTerm" name="searchterm" placeholder="Search" value="<?=$search?>">
					  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i> Search</button> 
					  <?if($search){?>
					  	<a href="/movies/index" class="btn btn-warning ml-2 btn-sm"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</a>
					  <?}?>
					</form>
				</div>	
			</div>	
		</div>	
		<div class="col-md-6">
			<div class="card">
				<div class="card-block">
				    <h4 class="card-title">How it works?</h4>
				    <p class="card-text">Using the <a href="/movies/load">Movie Importer</a> you can make requests to the <a href="http://netflixroulette.net/api/" target="_blank">Netflix Roulette API</a>, searching by cast or director. The response which is a list of movies and their details, is saved into your database.</p>
				    <p class="card-text">Once saved, you can perform a search (left box), see movie details, or delete them from your database (list and details)</p>
				    <p class="card-text">Wanna try to import some movies? <BR><a href="/movies/load">Try the Movie Importer now</a></p>
				</div>	
			</div>	
		</div>	
	</div>	
<?} else {?>
	<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
	  </button>
	  <strong>Welcome!</strong> 
	  It seams you don't have any movie in your database.<BR>
	  You can <a href="/movies/load">start searching and importing</a>, or if you preferr we can <a href="/movies/load/actor/al pacino" data-intro='Hey! You need import some movies in order to see the explanation'>import movies staring Al Pacino on Netflix</a> 
	</div>	
<?}?>
<br>
<?php 
$number = 0;
if(count($data) > 0) {
?>
	<div class="card">
		<div class="card-block">
		    <h4 class="card-title">
		    	<span data-intro='All the results are rendered into this table, and you can see the total results in a badge.'>Movies <span class="badge badge-primary"><?=count($data)?></span></span>
		    	<span class="float-right" data-intro='This is a requirement of the asigment (4). Make a request to a method from the controller using JQUERY and AJAX. I have decided to render the response in a Modal.'>
					<button type="button" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#top5" data-order="rating" data-filter="<?=$search?>">TOP by Rating</button>
					<button type="button" class="btn btn-warning btn-sm ml-1" data-toggle="modal" data-target="#top5" data-order="release_year" data-filter="<?=$search?>">Newest Movies</button>
				</span>		    	
		    </h4>
		    <?if($search) {?>
		    	<h6 class="card-subtitle mb-2 text-muted">Filtered results for term <b>"<?=$search?>"</b></h6>
		    <?}?>	    
			<div class="table-responsive">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th></th>
			      <th>Title</th>
			      <th>Year</th>
			      <th>Category</th>
			      <th>Director</th>
			      <th>Runtime</th>
			      <th>Rating</th>
			      <th data-intro='Delete the item (movie) from database.'>Actions</th>
			    </tr>
			  </thead>
			  <tbody>

				<?php foreach ($data as $dataitem):?>    	
				    <tr>
						<td>
							<a class="big" href="../movies/view/<?php echo $dataitem['Movie']['id']?>/<?php echo strtolower(str_replace(" ","-",$dataitem['Movie']['show_title']))?>">
								<img src="<?php echo $dataitem['Movie']['poster']?>" width="100" height="100" class="img-fluid rounded" alt="<?php echo $dataitem['Movie']['show_title']?>" onerror="this.src='/public/not_available.gif'">
							</a>
						</td>
							<td>
						  	<a class="big" href="../movies/view/<?php echo $dataitem['Movie']['id']?>/<?php echo strtolower(str_replace(" ","-",$dataitem['Movie']['show_title']))?>">
							    <?php echo $dataitem['Movie']['show_title']?>
							</a>
						</td>
						<td><?php echo $dataitem['Movie']['release_year']?></td>
						<td><?php echo $dataitem['Movie']['category']?></td>
						<td><?php echo $dataitem['Movie']['director']?></td>
						<td><?php echo $dataitem['Movie']['runtime']?></td>
						<td><?php echo $dataitem['Movie']['rating']?></td>
						<td>
							<a data-toggle="tooltip" data-placement="left" title="Delete <?php echo $dataitem['Movie']['show_title']?>" class="btn btn-danger btn-sm float-right m-2" href="/movies/delete/<?php echo $dataitem['Movie']['id']?>">
								<span class="item">
									<i class="fa fa-trash-o" aria-hidden="true"></i>
								</span>
							</a>
						</td>
			    	</tr>
			    <?php endforeach?>
			  </tbody>
			</table>
			</div>
		</div>
	</div>
<?} elseif($search) {?>
	<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
	  </button>
	  <strong>Oups!</strong> No movies found for your search. Try a different term.
	</div>		
<?}?>
<div class="modal fade" id="top5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">TOP Movies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#top5').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
	var order  = button.data('order')
	var filter = button.data('filter')
	$.get( "/movies/top5/" + order + '/' + filter, function( data ) {
		$('#top5 .modal-body').html(data)
		$('#top5 #title').html($(button).text());
	});
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>