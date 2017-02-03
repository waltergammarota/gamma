<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.4.0/introjs.min.css" integrity="sha256-xqkZ4mAs490xmDCAkpdxs8gHShKLKAoqpuxuxx7PMhQ=" crossorigin="anonymous" />
	<link rel="stylesheet" href="/public/styles.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/98c6db417c.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.4.0/intro.min.js" integrity="sha256-UocMbqHWrfuSkpVXznmcJ8f3sak/xJGVgIziKyleHsI=" crossorigin="anonymous"></script>
	<title><?php echo $title?></title>	
</head>
<body>
	<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#netflixMovies" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/movies/index">Netflix Movies</a>

      <div class="collapse navbar-collapse" id="netflixMovies">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?=($active == 'list' ? 'active' : '')?>">
            <a class="nav-link" href="/movies/index"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item <?=($active == 'load' ? 'active' : '')?>">
            <a class="nav-link" href="/movies/load"><i class="fa fa-download" aria-hidden="true"></i> Movies Importer</a>
          </li>
          <li class="nav-item <?=($active == 'settings' ? 'active' : '')?>">
            <a class="nav-link" href="/movies/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
          </li>
        </ul>
        <a class="btn btn-success" href="javascript:void(0);" onclick="javascript:introJs().start();"><i class="fa fa-question-circle" aria-hidden="true"></i> See Explanation</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <main class="col-sm-12 col-md-12 pt-3">
