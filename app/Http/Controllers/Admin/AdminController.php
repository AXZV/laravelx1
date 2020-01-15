<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/admin/admin_dasboard');
    }

    public function slider()
    {

        $slider = Slider::all();     
        return view('/admin/image_slider', ['slider' => $slider]);
    }

    public function updateslidercaption(Request $request)
    {
        DB::table('slider_img')->where('id',$request->id)->update([
            'caption' => $request->caption,
        ]);
        return redirect()->back()->with('successupdatecaption', true);
    }

    public function updatesliderimage(Request $request)
    {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();        
                  // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/slider_img';
            $namefile = 'a_'.$request->id.'.'.$ext;
            $file->move($tujuan_upload,$namefile);

            DB::table('slider_img')->where('id',$request->id)->update([
                'img' => $namefile
            ]);
            
            return redirect()->back()->with('successuploadimg', true);
   
    }

    


}
