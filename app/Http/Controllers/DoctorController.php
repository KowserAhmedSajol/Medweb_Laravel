<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Doctor;
use Session;

class DoctorController extends Controller
{
    public function list(){
        
        $doctors = Doctor::all();
        return view('admin.doctor.list', compact('doctors'));
    }
    public function show()
    {
        return view('admin.doctor.show');
    }
    public function insert(Request $req)
    {
        $doctordb = new Doctor;
        $doctordb->uuid = Str::uuid();
        $doctordb->name = $req->name;
        $doctordb->specialist = $req->specialist;
        $doctordb->email = $req->email;
        $doctordb->Experiences_Summary = $req->Experiences_Summary;
        $doctordb->Practice_Days = $req->Practice_Days;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = uniqid(). $file->getClientOriginalName();
            $file->move('uploads/images', $filename);
            $doctordb->image = $filename;
        }
        $doctordb->save();
        Session::flash('message', 'Doctor has been added Successfully');
        return redirect('/doctor/list');
    }

    public function delete(Request $req){
        
 
        Doctor::find($req->id)->delete();
        
        $image_path = public_path('uploads/images/'.$req->image);
        if(file_exists($image_path)) {
          unlink($image_path);
        }
        Session::flash('message', 'Data has been deleted Successfully');
        return redirect('/doctor/list');
    }
       
    
}