<?=$this->extend("layout/master")?>

<?=$this->section("content")?>
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/bootstrap/css/css.css'); ?>">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url('assets/casino/banner.png'); ?>" class="d-block w-100 h-40" alt="image 1">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/casino/1SOL1.jpg'); ?>.jpg" class="d-block w-100 h-50" alt="image 2">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>

<section class="events">
  <div class="title">
    <h1>Original Games</h1>
    <div class="line"></div>
  </div>
  <div class="row">
    <div class="col">
      <img src="<?= base_url('assets/casino/coinflip1.png'); ?>" alt="">
      <a href="<?= base_url('coinflip'); ?>" class="ctn">Play Game</a>
    </div>
    <div class="col">
      <img src="<?= base_url('assets/casino/dice1.png'); ?>" alt="" style="width: 500px 150px;">
      <a href="#" class="ctn">Play Game</a>
    </div>
  </div>
</section>

<br>
<h4 class="display-1 font-weight-thin text-center text-white" style="font-family: 'Courier New', Courier, monospace;">Original Games</h4>
<div class="container d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col-6">
    <a href="<?= base_url('coinflip'); ?>">
      <div class="card p-3 bg-dark d-flex align-items-center">
          <img src="<?= base_url('assets/casino/coinflip.png'); ?>" class="card-img-top mx-auto" alt="image1">
        <div class="card-body">
        </div>
      </div>
    </a>
    </div>
    <div class="col-6 disabled">
      <a href="#">
      <div class="card p-3 bg-dark d-flex align-items-center disabled">
          <img src="<?= base_url('assets/casino/dice.png'); ?>" class="card-img-top mx-auto" alt="image2">
        <div class="card-body">
        </div>
      </div>
      </a>
    </div>
  </div>
</div>


<h1>Welcome to About us page</h1>
<p>
    This is a sample page of our website
</p>
<?=$this->endSection()?>