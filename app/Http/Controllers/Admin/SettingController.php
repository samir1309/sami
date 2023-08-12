<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Logs;
use app\Library\UploadImg;
use App\Models\Product;
use App\Models\Setting;
use App\Models\InventoryReceipt;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{



    public function getEditSetting()
    {
        $data = Setting::first();
        return View('admin.setting.form')
            ->with('data', $data);
    }
    public function postEditSetting($id, Request $request)
    {
        $input = $request->all();
        $setting = Setting::find($id);
        $input['disable'] = $request->has('disable');
        $input['black_friday'] = $request->has('black_friday');
        if ($input['black_friday'] != $setting->black_friday){
            $setting->update([
                'fixing_price'=>1
            ]);
        }
        if ($request->hasFile('logo')) {
            File::delete('assets/uploads/content/set/' . $setting->logo);
            $pathMain = "assets/uploads/content/set";
            $extension = $request->file('logo')->getClientOriginalName();
           if (true) {
             $fileName = mt_rand(100, 999)."$extension";
                $request->file('logo')->move($pathMain, $fileName);
                $input['logo'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['logo'] = $setting->logo;
        }
        if ($request->hasFile('banner')) {
            File::delete('assets/uploads/content/set/' . $setting->banner);
            $pathMain = "assets/uploads/content/set";
            $extension = $request->file('banner')->getClientOriginalName();
            if (true) {
                $fileName = mt_rand(100, 999)."$extension";
                $request->file('banner')->move($pathMain, $fileName);
                $input['banner'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['banner'] = $setting->banner;
        }
        if ($request->hasFile('banner2')) {
            File::delete('assets/uploads/content/set/' . $setting->banner2);
            $pathMain = "assets/uploads/content/set";
            $extension = $request->file('banner2')->getClientOriginalName();
            if (true) {
                $fileName = mt_rand(100, 999)."$extension";
                $request->file('banner2')->move($pathMain, $fileName);
                $input['banner2'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['banner2'] = $setting->banner2;
        }
         if ($request->hasFile('sale_background')) {
            File::delete('assets/uploads/content/set/' . $setting->sale_background);
            $pathMain = "assets/uploads/content/set/";
            $extensionf = $request->file('sale_background')->getClientOriginalName();
            $extension = $request->file('sale_background')->getClientOriginalExtension();
            $w = str_replace($extension, "webp", $extensionf);
            if (true) {


                $fileName = md5(microtime()). "$w";
                $request->file('sale_background')->move($pathMain, $fileName);
                $input['sale_background'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['sale_background'] = $setting->sale_background;
        }


        if ($request->hasFile('sale_background_mobile')) {
            File::delete('assets/uploads/content/set/' . $setting->sale_background_mobile);
            $pathMain = "assets/uploads/content/set/";
            $extensionf = $request->file('sale_background_mobile')->getClientOriginalName();
            $extension = $request->file('sale_background_mobile')->getClientOriginalExtension();
            $w = str_replace($extension, "webp", $extensionf);
            if (true) {


                $fileName = md5(microtime()). "$w";
                $request->file('sale_background_mobile')->move($pathMain, $fileName);
                $input['sale_background_mobile'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['sale_background_mobile'] = $setting->sale_background_mobile;
        }

        if ($request->hasFile('aboutimg')) {
            $path = "assets/uploads/content/set/";
            File::delete($path . '/big/' . $setting->aboutimg);
            File::delete($path . '/medium/' . $setting->aboutimg);
            File::delete($path . '/small/' . $setting->aboutimg);
            $uploader = new UploadImg();
            $fileName = $uploader->uploadPic($request->file('aboutimg'), $path);
            if($fileName){
                $input['aboutimg'] = $fileName;
            }else{
                return Redirect::back()->with('error' , 'عکس ارسالی صحیح نیست.');
            }
        }
        else {
            $input['aboutimg'] = $setting->aboutimg;
        }
        if ($request->hasFile('favicon')) {
            File::delete('assets/uploads/content/set/' . $setting->favicon);
            $pathMain = "assets/uploads/content/set";
            $extension = $request->file('favicon')->getClientOriginalName();
            if (true) {
                $fileName = mt_rand(100, 999)."$extension";
                $request->file('favicon')->move($pathMain, $fileName);
                $input['favicon'] = $fileName;
            } else {
                return Redirect::back()->with('error', 'فایل ارسالی صحیح نیست.');
            }
        } else {
            $input['favicon'] = $setting->favicon;
        }
        $setting->update($input);
        $array = array($setting);
        $serialized_array = serialize($array);
        $log = Logs::log(url()->current(),$serialized_array,Auth::id(),$setting->id);

        return Redirect::action('Admin\SettingController@getEditSetting')->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');    }


    public static function fixingPrice(){
        $settnig = Setting::first();
        $id = $settnig->last_fixed_price_id;
        $products = Product::orderby('id','asc')->where('id','>',$settnig->last_fixed_price_id)->take(100)->get();
        set_time_limit(20000);
        if (count($products) > 0){
            $p_count = Product::count();
            foreach ($products as $pro){
                $pro->update([
                    'price'=>@$pro->price_third['price'],
                    'old_price'=>@$pro->price_third['old'],
                ]);
            $id = $pro->id;
            }
            $settnig->update([
                'last_fixed_price_id'=>@$id,
                'fixed_price_count'=>@$settnig->fixed_price_count + 100,
            ]);
            if ($p_count <= $settnig->fixed_price_count ){
                $settnig->update([
                    'last_fixed_price_id'=>0,
                    'fixed_price_count'=>0,
                    'fixing_price'=>0,
                ]);
            }

        }else{
            $settnig->update([
                'last_fixed_price_id'=>0,
                'fixed_price_count'=>0,
                'fixing_price'=>0,
            ]);
        }
  }
   public static function fixingStock(){
        $settnig = Setting::first();
        $id = $settnig->last_fixed_stock_id;
        $products = Product::orderby('id','asc')->where('id','>',$settnig->last_fixed_stock_id)->take(200)->get();
        set_time_limit(20000);
        if (count($products) > 0){
            $p_count = Product::count();
            foreach ($products as $pro){
                $pro->update([
                    'stocks'=>@$pro->stock_count,
                ]);
                $id = $pro->id;
            }
            $settnig->update([
                'last_fixed_stock_id'=>@$id,
                'fixed_stock_count'=>@$settnig->fixed_stock_count + 200,
            ]);
            if ($p_count <= $settnig->fixed_stock_count ){
                $settnig->update([
                    'last_fixed_stock_id'=>0,
                    'fixed_stock_count'=>0,
                    'fixing_stock'=>0,
                ]);
            }

        }else{
            $settnig->update([
                'last_fixed_stock_id'=>0,
                'fixed_stock_count'=>0,
                'fixing_stock'=>0,
            ]);
        }
    }
     public static function fixingInv(){
       $invs = InventoryReceipt::whereNull('inventory_id')->whereNull('inventory_type_id')->get();
       foreach ($invs as $inv){
           InventoryReceipt::destroy($inv->id);
       }
    }
        public  function dd(){
        $settnig = Setting::first();
        $id = $settnig->last_fixed_price_id;
        $pro= Product::orderby('id','asc')->where('id','2478')->first();
        dd($pro->price_third['price']);

  }

}
