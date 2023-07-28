<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rmodel;
use DB;
use Illuminate\Support\Facades\Validator;
class r extends Controller
{
	

    public function index(){
  $userData = rmodel::getdata();

    	return view('welcome')->with("userData",$userData);
    }
     

    public function simpandata(Request $request){
    	$id=$request->input('id');
    	$nama=$request->input('nama');
    	$jabatan=$request->input('jabatan');
    	$jenis_kelamin=$request->input('jenis_kelamin');
    	$alamat=$request->input('alamat');
    	$ubah=array("nama"=>$nama,"jabatan"=>$jabatan,"jenis_kelamin"=>$jenis_kelamin,"alamat"=>$alamat);
    	DB::table('mytable')->where('id',$id)->update($ubah);
    	$userData = rmodel::getdata();

    	return view('welcome')->with("userData",$userData);
    }
    public function hapusdata(Request $request){
    	$id=$request->input('id');
    	DB::table('mytable')->where('id',$id)->delete();
    	$userData = rmodel::getdata();

    	return view('welcome')->with("userData",$userData);
    }
    public function simpanurl(Request $request){

    $url = $request->input('url');
$response = file_get_contents($url);
$obj = json_decode($response,true);

foreach($obj as $row) {
  
                // Database query to insert data 
                // into database Make Multiple 
                // Insert Query 
            $simpan=array("id"=>$row['id'],"nama"=>$row['nama'],"jabatan"=>$row['jabatan'],"jenis_kelamin"=>$row['jenis_kelamin'],"alamat"=>$row['alamat']);   
               
               // Data for display on Web page
    DB::table('mytable')->insert($simpan);        
            }

     $userData = rmodel::getdata();

    	return view('welcome')->with("userData",$userData);
    }
}
