<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model;
use App\Models\Data;

class Casino extends BaseController
{


    public function hlavni()
    {
        $model = new Model();
        $data['data'] = $model->getHlavni();
        $data['hodnota'] = $model->getHodnota();
        $data['sazka'] = $model->getSazka();
        $data['vyplaceni'] = $model->getVyplaceni();
        echo view("hlavni", $data);
    }

    public function edit()
    {
        $model = new Model();
        helper('form');
        helper('date');
        $jmeno = $this->request->getPost('jmeno');
        $prijmeni = $this->request->getPost('prijmeni');
        //$hrac_id = 	$this->request->getPost('hrac_id');
        
        $model->updateUser($jmeno, $prijmeni);
        
        return redirect()->to('hlavni');
    }

    public function hraci(){
        $model = new Model();
        $data['data'] = $model->getHlavni();
        $data['deposit'] = $model->getDeposit();
        $data['hodnota'] = $model->getHodnota();
        $data['sazka'] = $model->getSazka();
        $data['vyplaceni'] = $model->getVyplaceni();

        $data['hraci'] = $model->getHraci();

        echo view("hraci", $data);
    }

    public function hrac($mt)
    {
        $model = new Model();
        $data['data'] = $model->getHlavni();
        $data['deposit'] = $model->getDeposit();
        $data['hodnota'] = $model->getHodnota();
        $data['sazka'] = $model->getSazka();
        $data['vyplaceni'] = $model->getVyplaceni();
        
        $data['hrac'] = $model->getHrac($mt);
        $data["tm"] = $mt;
        $data["title"] = "tym".$mt;
        //$data["pes"] = $pes;
        echo view("hrac", $data);
    }

    public function deposit()
    {
        $model = new model();
        $data['deposit'] = $model->getDeposit();
        $data['hodnota'] = $model->getHodnota();
        $data['sazka'] = $model->getSazka();
        $data['vyplaceni'] = $model->getVyplaceni();
        //var_dump($data['deposit']);
        $data['data'] = $model->getHlavni();
        echo view("deposit", $data);

    }

    public function coinflip()
    {
        $model = new Model();
        $data['data'] = $model->getHlavni();
        $data['coinflip'] = $model->getCoinflip();
        $data['hodnota'] = $model->getHodnota();
        $data['sazka'] = $model->getSazka();
        $data['vyplaceni'] = $model->getVyplaceni();
        echo view('coinflip', $data);

    }

    public function game_coinflip()
    {
        helper('form');
        helper('date');
        $model = new Model();

        //$typ = $this->request->getPost('typ');
        $sazka = $this->request->getPost('sazka');
        $datetime = date('Y-m-d H:i:s');
        $vyplaceni = $this->request->getPost('vyplaceni');
        //$hrac_id = 	$this->request->getPost('hrac_id');
        
        $model->insertCoinflip($sazka, $vyplaceni, $datetime);
        
        var_dump($sazka);

        return redirect()->to('/deposit');
    }

    public function check_form(){
        helper('form');
        helper('date');
        $model = new Model();

        //$typ = $this->request->getPost('typ');
        $hodnota = $this->request->getPost('hodnota');
        $datetime = date('Y-m-d H:i:s');
        //$transakce = $this->request->getPost('transakce');
        //$hrac_id = 	$this->request->getPost('hrac_id');
        
        $model->insert($hodnota, $datetime);
        
        return redirect()->to('/deposit');
    }   
}
