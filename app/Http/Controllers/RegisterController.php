<?php

namespace App\Http\Controllers;

use App\Mail\register as MailRegister;
use App\Models\register;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function dashboard(){
        $completed_profiled_count = register::where('image', '!=', null)->count();
        $uncompleted_profiled_count = register::where('image', '=', null)->count();
        return view('dashboard', ['cpc' => $completed_profiled_count, 'ucp' => $uncompleted_profiled_count ]);
    }
    public function addClient(){
        return view('addnewclient');
    }
    public function registerHandler(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:registers',
            'primary_legal_counsel' => 'required',
            'date_of_birth' => 'required',
            'case_details' => 'required',
        ]);

        //upload the profile image to cloudinary if image exist
        if($request->has('image')){
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        //Profile the user if validated successfully
        try{$newClientProfile = register::create($data);}
        catch(Exception $e){
            return redirect()->back()->with(['status' => $e->getMessage()]);
        }
        if($newClientProfile){
        $mail = Mail::send(new MailRegister($newClientProfile));
        if($mail){
        return redirect()->back()->with(['status' => 'Client Profiled Successfully, Notification Mail Has been Sent to the User']);
        }else{
        return redirect()->back()->with(['status' => 'Client Profiled Successfully, But Mail Has been Sent to the User']);
        }
        }else{
        return redirect()->back()->with(['status' => 'An error occured, Pls try again']);
        }

    }

    public function viewAllClient(){
        $data = register::orderBy('created_at', 'DESC')->get();
        return view('viewallclient', ['data' => $data]);
    }

    public function viewProfile($id){
        $data = Register::where('id', $id)->first();
        return view('viewprofile', ['data' => $data]);
    }

    public function updateClientHandler(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'primary_legal_counsel' => 'required',
            'date_of_birth' => 'required',
            'case_details' => 'required',
        ]);
        if($request->has('image')){
            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }else{
            $existingImageUrl = Register::where('email', $request->email)->first();
            $data['image'] = $existingImageUrl->image;
        }
        try{ $updateData = Register::where('email',  $request->email)->update($data);}
        catch(Exception $e){
            return redirect()->back()->with(['status' => $e->getMessage()]);
        }
        if($updateData){
        return redirect()->back()->with(['status' => 'Client Data Updated Successfully']);
        }else{
        return redirect()->back()->with(['status' => 'An error occured, Pls try again']);
        }
    }

}
