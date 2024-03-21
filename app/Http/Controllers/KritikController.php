<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KritikdansaranModel;

class KritikController extends Controller
{
    public function kirimkritik(Request $request){
        $credentials=$request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'kritik' => 'required',
            'saran' => 'required',

        ]);

        $kritik = KritikdansaranModel::create($credentials);
        if ($kritik) {
            return redirect()->back()->with('success','berhasil mengirim kritik dan saran');
        }

        return redirect()->back()->with('error','gagal mengirim kritik dan saran');
    }
    public function deletekritik(Request $request){
        $kritikid=$request->kritik_id;
        $delete= KritikdansaranModel::where('id',$kritikid)->delete();
        if ($delete) {
            return redirect()->back()->with('success','berhasil menghapus kritik dan saran');
        }

        return redirect()->back()->with('error','gagal menghapus kritik dan saran');
    }
    public function editkritik(Request $request){
        $credentials=[
            'kritik' =>  $request->kritik,
            'saran' =>  $request->saran,
        ];
        $edit = KritikdansaranModel::where('id',$request->kritik_id)->update($credentials);
         if ($edit) {
            return redirect()->back()->with('success','berhasil mengedit kritik dan saran');
        }

        return redirect()->back()->with('error','gagal mengedit kritik dan saran');
    }
}
