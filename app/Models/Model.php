<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use Config\Database;
use CodeIgniter\I18n\Time;

class Model
{
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getHrac($mt)
    {
          $builder = $this->db->table("hrac");
          $builder->select("id, jmeno, prijmeni, fotka");
          $builder->where("id", $mt);
  
          $data = $builder->get()->getResult();
          return $data;
    }
   
    function getHlavni()
   {
        $builder = $this->db->table("hrac");
        $builder->join("zaznamypenize", "zaznamypenize.hrac_id=hrac.id", "inner");
        $builder->join("zaznamyhry", "zaznamyhry.hrac_id=hrac.id", "inner");
        $builder->select("hrac.jmeno as jmeno, hrac.prijmeni as prijmeni, hrac.id as id, zaznamypenize.typ as typ, zaznamyhry.sazka, zaznamyhry.vyplaceni");
        $builder->where("hrac.id", 1);

        $data = $builder->get()->getResult();
        return $data;
   }

   function getHodnota()
   {
        $builder = $this->db->table('zaznamypenize');
        $builder->select("Sum(hodnota) as celkem");
        $builder->where("hrac_id", 1);

        $hodnota = $builder->get()->getResult();
        return $hodnota;
    }

    function getSazka()
   {
        $builder = $this->db->table('zaznamyhry');
        $builder->select("Sum(sazka) as celkem");
        $builder->where("hrac_id", 1);

        $sazka = $builder->get()->getResult();
        return $sazka;
   }

   function getVyplaceni()
   {
        $builder = $this->db->table('zaznamyhry');
        $builder->select("Sum(vyplaceni) as celkem");
        $builder->where("hrac_id", 1);

        $vyplaceni = $builder->get()->getResult();
        return $vyplaceni;
   }
/**
 * nevim co mam napsat
 */
   function getDeposit()
   {
     $builder = $this->db->table('zaznamypenize');
     $builder->select("id, typ, hodnota, datum, transakce, hrac_id");
     $builder->where("hrac_id", 1);
     $builder->orderBy("id","desc");
     $builder->limit(8);

     $deposit = $builder->get()->getResult();
     return $deposit;
   }

   function getCoinflip()
   {
    $builder = $this->db->table('zaznamyhry');
    $builder->select("sazka, vyplaceni, datum, hry_id, id, hrac_id");
    $builder->where("zaznamyhry.hrac_id", 1);
    $builder->orderBy('id', 'desc');
    $builder->limit(8);

    $coinflip = $builder->get()->getResult();
    return $coinflip;

   }

   function insertCoinflip($sazka, $vyplaceni, $datetime)
   {
    $builder = $this->db->table('zaznamyhry');
    $data = [
        'sazka' => $sazka,
        'vyplaceni' => $vyplaceni,
        'datum' => $datetime,
        'hry_id' => "1",
        'hrac_id' => "1"
    ];

    $builder->insert($data);
   }


   function insert($hodnota, $datetime)
    {
        //randchar
        $length = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        //!randchar

        $builder = $this->db->table('zaznamypenize');
        //$query   = $builder->get();
        $data = [
            'typ' => "vklad",
            'hodnota' => $hodnota,
            'datum' => $datetime,
            'transakce' => $randomString,
            'hrac_id' => "1"
        ];
        
        $builder->insert($data);
        
    }
   
   function getTym($tm)
   {
        $builder = $this->db->table("tymy");
        $builder->join("tymy_has_liga_sezona", "tymy_has_liga_sezona.tymy_idtymy=tymy.idtymy", "inner");
        $builder->join("stadion", "stadion.idstadion=tymy.idtymy");
        $builder->join("hraci_v_sezone", "hraci_v_sezone.tymy_idtymy=tymy.idtymy");
        $builder->join("hraci", "hraci.idHraci=hraci_v_sezone.idHrace");
        $builder->join("narodnost", "narodnost.idnarodnost=hraci.narodnost_idnarodnost");
        $builder->select("narodnost.zkratka as narod, hraci_v_sezone.cislo_dresu as dres ,hraci.jmeno as jmeno,hraci.prijmeni as prijmeni, tymy_has_liga_sezona.logo as logo, tymy.nazev as nazev, tymy_has_liga_sezona.sezona_idsezona as idsezony, stadion.nazev_stadionu as nazevStadionu, stadion.adresa as adresaStadionu");
        $builder->where("tymy_has_liga_sezona.sezona_idsezona", 1);
        $builder->where("hraci_v_sezone.idSezony", 1);
        $builder->where("tymy.idtymy", $tm);

        
        $deposit = $builder->get()->getResult();
        return $deposit;
   }

}