<?php $number = 0?>

<?php foreach ($data as $dataitem):?> 
<div class="card">
  <img class="card-img-top" src="<?php echo $dataitem['Movie']['poster']?>" style="width:100%" onerror="this.src='/public/not_available.gif'">
  <div class="card-block">
    <h4 class="card-title"><?php echo $dataitem['Movie']['show_title']?> (<?php echo $dataitem['Movie']['release_year']?>)</h4>
    <h6 class="card-subtitle mb-2 text-muted">Raiting: <b><?php echo $dataitem['Movie']['rating']?></b></h6>
    <p class="card-text"><?php echo $dataitem['Movie']['summary']?></p>
    <a href="/movies/view/<?php echo $dataitem['Movie']['id']?>" class="btn btn-primary">View Details</a>
  </div>
</div>
<br>
<?php endforeach;?>