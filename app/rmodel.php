<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class rmodel extends Model
{
   public static  function getdata(){
        $value=DB::table('mytable')->get();
    return $value;

         
    }
    protected $table = 'mytable';
     
    protected $fillable = ['id','nama','jabatan','jenis_kelamin','alamat','`updated_at`','created_at'];

}
