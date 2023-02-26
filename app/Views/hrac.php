<?=$this->extend("layout/master")?>

<?=$this->section("content")?>    

<div class="container p-5 h-100">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card bg-dark text-white border-0 shadow">
                <img src="<?= base_url('assets/photo/'.$hrac[0]->id.".png"); ?>">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0"><?= $hrac[0]->jmeno." ".$hrac[0]->prijmeni ?></h3>
                        <span class="text-primary">Level: </span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!" class="text-white"><i class="far fa-envelope display-25 me-3 text-secondary"></i><?= $hrac[0]->jmeno.".".$hrac[0]->prijmeni ?>@gmail.com</a></li>
                        <li class="mb-3"><a href="#!" class="text-white"><i class="fas fa-wallet display-25 me-3 text-secondary"></i>+012 (345) 6789</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="row mt-n4">
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center bg-dark border-0 rounded-3 text-white">
                                <div class="card-body">
                                    <a class="icon-box large rounded-3 mb-4" id="ElementId">$<?= $sazka[0]->celkem?></a>
                                    <h3 class="h5 mb-3">Wagered</h3>
                                    <p class="mb-0">Total wagered by this user</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                        <div class="card text-center bg-dark border-0 rounded-3 text-white">
                                <div class="card-body">
                                <a class="icon-box large rounded-3 mb-4" id="ElementId">$<?= $vyplaceni[0]->celkem-$sazka[0]->celkem?></a>
                                    <h3 class="h5 mb-3">Profit</h3>
                                    <p class="mb-0">Total profit</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                        <div class="card text-center bg-dark border-0 rounded-3 text-white">
                                <div class="card-body">
                                <a class="icon-box large rounded-3 mb-4" id="ElementId">$<?= $hodnota[0]->celkem?></a>
                                    <h3 class="h5 mb-3">Deposited</h3>
                                    <p class="mb-0">Total deposited</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wow fadeIn">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

    const elements = document.querySelectorAll('#ElementId');

// Loop through each element
for (let i = 0; i < elements.length; i++) {
  const element = elements[i];

  // Check if the text content contains a hyphen
  if (element.textContent.includes('-')) {
    // If the text contains a hyphen, change the color
    element.style.color = '#fc304f';
  }
  else{console.log('nice');
    element.style.color = '#73c72e';}
}
</script>

<style>
body{margin-top:0px;}
.icon-box.medium {
    font-size: 20px;
    width: 50px;
    height: 50px;
    line-height: 50px;
}
.icon-box {
    font-size: 20px;
    margin-bottom: 33px;
    display: inline-block;
    color: white;
    height: 65px;
    width: 65px;
    line-height: 65px;
    background-color: #626361;
    text-align: center;
    border-radius: 0.3rem;
}
.social-icon-style2 li a {
    display: inline-block;
    font-size: 14px;
    text-align: center;
    color: #ffffff;
    background: #59b73f;
    height: 41px;
    line-height: 41px;
    width: 41px;
}
.rounded-3 {
    border-radius: 0.3rem !important;
}

.social-icon-style2 {
    margin-bottom: 0;
    display: inline-block;
    padding-left: 10px;
    list-style: none;
}

.social-icon-style2 li {
    vertical-align: middle;
    display: inline-block;
    margin-right: 5px;
}

a, a:active, a:focus {
    color: #616161;
    text-decoration: none;
    transition-timing-function: ease-in-out;
    -ms-transition-timing-function: ease-in-out;
    -moz-transition-timing-function: ease-in-out;
    -webkit-transition-timing-function: ease-in-out;
    -o-transition-timing-function: ease-in-out;
    transition-duration: .2s;
    -ms-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -webkit-transition-duration: .2s;
    -o-transition-duration: .2s;
}

.text-secondary, .text-secondary-hover:hover {
    color: #59b73f !important;
}
.display-25 {
    font-size: 1.4rem;
}

.text-primary, .text-primary-hover:hover {
    color: #ff712a !important;
}

p {
    margin: 0 0 20px;
}

.mb-1-6, .my-1-6 {
    margin-bottom: 1.6rem;
}
</style>
<?=$this->endSection()?>