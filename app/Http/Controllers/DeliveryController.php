<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Province;
use App\Wards;
use App\Fee;
class DeliveryController extends Controller
{
    public function delivery(){
        $city = City::orderby('matp','ASC')->get();
        return view('admin.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=='city'){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();

                foreach($select_province as $key=>$province)
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Fee();
        //lay data tu ajax
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_feeship = $data['fee'];
        $fee_ship->save();
    }
    public function select_feeship(){
        $feeship = Fee::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Phí ship</th>
                    </tr>
                </thread>
                <tbody>
                ';
                foreach($feeship as $key=>$fee){
                $output.=' 
                    <tr>
                        <td>'.$fee->city->name_city.'</td>
                        <td>'.$fee->province->name_quanhuyen.'</td>
                        <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'<td>
                    </tr>';
                }
        $output.='
                </tbody>
            </table>
            </div>
        ';
        echo $output;
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        //lay data tu ajax
        $fee_ship = Fee::find($data['feeship_id']);
        //lay data tu ajax
        //va cat chuoi "20.000" thanh 20
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
}
