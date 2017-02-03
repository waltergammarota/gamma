<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/movies/viewall"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li class="breadcrumb-item active"><i class="fa fa-download" aria-hidden="true"></i> Movie Importer</li>
</ol>
	<?if(isset($moviesadded) && $moviesrepeated <= 0){?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Cool!</strong><?=($moviesrepeated) ? ' We have found '.$moviesrepeated.' repeated movies.':''?> You have added <?=$moviesadded?> new movies to your database! <a href="/movies/index">Go back to the list</a>
		</div>	
	<?}elseif(isset($moviesadded) && $moviesrepeated > 0){?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Oups!</strong><?=($moviesrepeated) ? ' We have found '.$moviesrepeated.' repeated movies.':''?> You have added <?=$moviesadded?> new movies to your database!
		</div>	
	<?}elseif(isset($moviesadded) && $moviesadded == 0){?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Oups!</strong> I couldn't find any movie using the search term you entered <b>"<?=$search?>"</b>.<BR>Try with another one, or maybe use our recommendations bellow.
		</div>	
	<?}?>

	<div class="card">
		  <div class="card-block">
		    <h4 class="card-title" data-intro='This will perform a call to a method from the Controller which makes a request to the Netflix Roulette API.'>Import Movies to Database</h4>
		    <p class="card-text">Use any of these 2 methods to import movies into your database, by using the <a href="http://netflixroulette.net/api/" target="_blank">Netflix Roulette API</a></p>
		    <h6 class="card-subtitle mb-2 text-muted">Import by Actor</h6>
		    <form action="/movies/load/actor" method="post" id="actorForm">
			    <div class="form-group row">
				  <div class="col-10">
				    <div class="input-group" data-intro='This option will perform a call to the endpoint: <i>http://netflixroulette.net/api/api.php?actor={search-term}</i>, and store the results into the database. Duplicates will be ignored.'>
				      <input type="text" class="form-control" id="actor" placeholder="Enter the name or last name of a known actor/actress" name="searchterm" value="<?=isset($actor) ? $actor : ''?>">			    	
				      <span class="input-group-btn">
				        <button class="btn btn-secondary" type="submit">Search</button>
				      </span>
				    </div>
				  </div>
				</div>
			</form>
			<span data-intro="Some examples, by clicking on them we process the search and store the results automatically">
			    <a href="#" class="card-link" onclick="$('#actor').val('Robert De Niro');$('#actorForm').submit();">Robert De Niro</a>
			    <a href="#" class="card-link" onclick="$('#actor').val('Al Pacino');$('#actorForm').submit();">Al Pacino</a>
			    <a href="#" class="card-link" onclick="$('#actor').val('Brad Pitt');$('#actorForm').submit();">Brad Pitt</a>
			</span>
		  </div>
		  <div class="card-block">
		    <h6 class="card-subtitle mb-2 text-muted">Import by Director</h6>
		    <form action="/movies/load/director" method="post" id="directorForm">
			    <div class="form-group row">
				  <div class="col-10">
				    <div class="input-group" data-intro="Same as search by actor, by this time the endpoint used is: http://netflixroulette.net/api/api.php?director={search-term}">
				      <input type="text" class="form-control" id="director" placeholder="Enter the name or lastname of a known movie director" name="searchterm" value="<?=isset($director) ? $director : ''?>">			    	
				      <span class="input-group-btn">
				        <button class="btn btn-secondary" type="submit">Search</button>
				      </span>
				    </div>
				  </div>
				</div>
			</form>
		    <a href="#" class="card-link" onclick="$('#director').val('Quentin Tarantino');$('#directorForm').submit();">Quentin Tarantino</a>
		    <a href="#" class="card-link" onclick="$('#director').val('Martin Scorsese');$('#directorForm').submit();">Martin Scorsese</a>
		    <a href="#" class="card-link" onclick="$('#director').val('Steven Spielberg');$('#directorForm').submit();">Steven Spielberg</a>
		  </div>
	</div>		
