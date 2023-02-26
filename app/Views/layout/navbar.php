<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('hlavni'); ?>">
      <img src="<?= base_url('assets/casino/logo1.png'); ?>" width="50" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Promotions</a>
        </li>
      </ul>
    </div>
<div class="navbar-nav ml-auto gap-1">
<div class="dropdown mt-3" id="dropdown">
  <button class="btn btn-rounded-pill btn-dark btn-rounded-pill btn-transparent" data-bs-toggle="dropdown" type="button" style="font-size:larger " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-dollar-sign"></i> <?php echo($hodnota[0]->celkem-$sazka[0]->celkem+$vyplaceni[0]->celkem) //$data[0]->sazka+$data[0]->vyplaceni?>
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="<?= base_url('deposit'); ?>">Deposit</a></li>
    <li><a class="dropdown-item" href="<?= base_url('withdraw'); ?>">Withdraw</a></li>
  </ul>
</div>
<div class="dropdown dropstart mt-1">
  <button class="btn btn-rounded-pill btn-dark btn-rounded-pill btn-transparent dropdown-toggle" data-bs-toggle="dropdown" type="button" style="font-size:larger" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="<?= base_url('assets/photo/1.png'); ?>" width="50" alt="player" class="img-thumbnail rounded-circle">
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="<?= base_url(); ?><?php echo("/".$data[0]->id) ?>"><?php echo($data[0]->jmeno)." ".($data[0]->prijmeni) ?></a></li>
    <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Log Out</a></li>
  </ul>
</div>
</div>
</div>  
</nav>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
