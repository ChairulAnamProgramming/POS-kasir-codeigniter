<?php
class Data_model extends CI_model
{

    public function getGoods()
    {
      return $this->db->get('table_goods')->result_array();
       
    }

    public function getGoodsById($id)
    {
      return $this->db->get_where('table_goods',['id'=>$id])->row_array();
       
    }

    public function getAutoNumberGoods()
    {
    	$query = "SELECT * FROM table_goods ORDER BY id DESC LIMIT 1";
    	$rest = $this->db->query($query)->row_array();
    	$kode = $rest['kode_barang'];
    	$substr = substr($kode, 1,2);
    	$int = (int)$substr +1;

		if (strlen($int) == 1) 
		  {
		    $nomor = "A"."0".$int;
		  }elseif (strlen($int) == 2) {
		     $nomor = "A".$int;
		  }
    	return $nomor;
    }


    public function getAutoNumberPembeli()
    {
        $query = "SELECT * FROM table_pembeli ORDER BY id_pembeli DESC LIMIT 1";
        $rest = $this->db->query($query)->row_array();
        $kode = $rest['kode_pembeli'];
        $substr = substr($kode, 1,2);
        $int = (int)$substr +1;

        if (strlen($int) == 1) 
          {
            $nomor = "P"."0".$int;
          }elseif (strlen($int) == 2) {
             $nomor = "P".$int;
          }
        return $nomor;
    }



    public function getCatagory()
    {
        return $this->db->get('table_catagory')->result_array();
    }


    public function getMerek()
    {
        return $this->db->get('table_merek')->result_array();
    }




    public function autoNumberNoPenjualan()
    {
        $query = "SELECT * FROM table_penjualan ORDER BY id_penjualab DESC LIMIT 1";
        $rest = $this->db->query($query)->row_array();
        $kode = $rest['no_penjualan'];
        $substr = substr($kode, 9,3);
        if ($rest['status'] == 0) {
           $int = (int)$substr +0;
        }elseif($rest['status'] == 1){
           $int = (int)$substr +1;

        }
        $year = date('y');
        $mount = date('m');
        $day = date('d');
        if (strlen($int) == 1) 
          {
            $nomor = "NP-".$year.$mount.$day."00".$int;
          }elseif (strlen($int) == 2) {
             $nomor = "NP-".$year.$mount."0".$day.$int;
          }elseif (strlen($int) == 3)
          {
            $nomor = "NP-".$year.$mount.$day.$int;
          }
        return $nomor;
    }

    public function getOutlet()
    {
        return $this->db->get('outlet')->row_array();
    }


  }