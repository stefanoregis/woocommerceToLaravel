<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Woocommercewebsite;

use DB;

class WoocommercewbsitesController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('woocommercewbsites.index', []);
  }

  public function create(Request $request)
  {
    return view('woocommercewbsites.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $woocommercewebsite = Woocommercewebsite::findOrFail($id);
    return view('woocommercewbsites.add', [
      'model' => $woocommercewebsite    ]);
  }

  public function show(Request $request, $id)
  {
    $woocommercewebsite = Woocommercewebsite::findOrFail($id);
    return view('woocommercewbsites.show', [
      'model' => $woocommercewebsite    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM woocommerce_websites a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','name','created_at','updated_at','url_api','consumerKey','consumerSecret',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $woocommercewebsite = null;
  if($request->id > 0) { $woocommercewebsite = Woocommercewebsite::findOrFail($request->id); }
  else {
    $woocommercewebsite = new Woocommercewebsite;
  }


  
    $woocommercewebsite->id = $request->id?:0;
    
  
      $woocommercewebsite->name = $request->name;
  
  
      $woocommercewebsite->created_at = $request->created_at;
  
  
      $woocommercewebsite->updated_at = $request->updated_at;
  
  
      $woocommercewebsite->url_api = $request->url_api;
  
  
      $woocommercewebsite->consumerKey = $request->consumerKey;
  
  
      $woocommercewebsite->consumerSecret = $request->consumerSecret;
  
    //$woocommercewebsite->user_id = $request->user()->id;
  $woocommercewebsite->save();

  return redirect('/woocommercewbsites');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $woocommercewebsite = Woocommercewebsite::findOrFail($id);

  $woocommercewebsite->delete();
  return "OK";

}


}
