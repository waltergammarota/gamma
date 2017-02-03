<?
class MoviesController extends Controller {

    // Settings (/movies/settings)

    function methodexample()
    {
        $day = date("l");
        $this->set('day', $day);
    }

    function settings()
    {
        $this->set('active','settings');
        $this->set('title','Settings - Netflix Movies');
    }

    // List all and search movies (/movies/index)
    function index()
    {
        $search = isset($_POST["searchterm"]) ? $_POST["searchterm"] : '';
        $this->set('active','list');
        $this->set('search',$search);
        if($search)
        {
            $this->set('title','Results for '.$search . ' - Netflix Movies');
            $this->set('data',$this->Movie->search($search));   
        }
        else
        {
            $this->set('title','All Results - Netflix Movies');
            $this->set('data',$this->Movie->selectAll());
        }
    }

    // Import/Load movies by making a request to the Netflix Roulette API
    function load($type = null, $searchterm = null) {
        $this->set('active','load');
        $this->set('title', 'Import movies from Netflix - Netflix Movies');     

        if(isset($_POST["searchterm"]))
            $searchterm = $_POST["searchterm"];

        if($type && isset($searchterm))
        {
            $this->set($type, $searchterm);       
            $this->set('search', $searchterm); 

            //Make a request to the API   
            $movies = @file_get_contents("http://netflixroulette.net/api/api.php?$type=" . rawurlencode($searchterm));
                 
            if($movies)
            {
                $movies = json_decode($movies);
                $affectedRows = $this->Movie->bulkAdd($movies);
                $this->set('moviesadded', $affectedRows);           
                $this->set('moviesrepeated', count($movies) - $affectedRows);           
            } 
            else
            {
                $this->set('moviesadded', 0);           
            }
        }
    }

    // Retrieve the TOP 5 Movies by rating or year
    function top5($order="rating", $search = "")
    {
        $this->ajax();
        $this->set('data',$this->Movie->top5($order, $search)); 
    }
    function reset()
    {
        $this->ajax();
        $this->Movie->reset();
    }
}
