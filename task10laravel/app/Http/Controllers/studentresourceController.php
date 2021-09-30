<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class studentresourceController extends Controller
{
    
    function __construct()
    {
        
        // $this->middleware('checkStudent', ['except' => ['login', 'dologin', 'create']]);

    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $data = student::select('students.*','tasks.title')->join('tasks','tasks.user_id','=','students.id')->orderby('id','desc')->paginate(10);     

        //
        // $data = student::orderby('id','desc')->paginate(10);     
         //->get()->take(1);
          
        return view('student.display',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request, [
            'name'     => 'required | min:4 | regex:/^[a-zA-Z\s]*$/',
            'email'    => 'required | email',
            'password' => 'required | min:6',
            'image'    => 'required | mimes:jpg,png,jpeg,svg',
        ]);
        $data['password'] = bcrypt($data['password']);
        $finalName = rand().time().'.'.$data['image']->extension();

        $data['image']->move(public_path('images'), $finalName);

        $op = student::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
            'image'    => $finalName,
            ]);
        if (!$op){
            $message =  'error in op';
        }
        session()->Flash('message', $message);

        return redirect(url('/student'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    //     $data = student::where('id', $id)->orderby('id','desc')->paginate(10);     
    //     //->get()->take(1);
         
    //    return view('student.display',['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = student::findorfail($id);
        return view('student.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request, [
            'name'     => 'required | min:4 | regex:/^[a-zA-Z\s]*$/',
            'email'    => 'required | email',
            'image'    => 'mimes:jpg,png,jpeg,svg',
        ]);
        if (isset($data['image'])){
            $finalName = rand().time().'.'.$data['image']->extension();
            if (File::exists('images/'.$finalName)){

                File::delete('images/'.$finalName);
            }
            $data['image']->move(public_path('images'), $finalName);    
        }else{
            $image = student::where('id', $id)->value('image');
            $splitImage = str_replace(['}',']','[','{','"'], '', $image);
            $imagName = explode(':', $splitImage);
            $finalName = $imagName[0];
        }
        // dd($request->email);
        $op = student::where('id', $id)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'image'    => $finalName,
            ]);
        if($op){  
            $message = 'Data Updated';
        }else{
            $message = 'error, try again!';
        }
        session()->flash('message', $message);
        return redirect(url('/student'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $image = student::where('id', $id)->value('image');
        $splitImage = str_replace(['}',']','[','{','"'], '', $image);
        $imagName = explode(':', $splitImage);
        $finalName = $imagName[0];

        unlink('images/'.$finalName);

        $op = student::where('id', $id)->delete();
        if($op){  
            $message = 'Data deleted';
        }else{
            $message = 'error, try again!';
        }
        session()->flash('message', $message);
        return redirect(url('/student'));
    
    }

    public function login(){

        return view('student.login');
      }
    
    
    public function dologin(Request $request){
          // logic ... 
          $data =    $this->validate($request,[
            "password"     => "required|min:6",
            "email"        => "required|email"
            ]);
    
    
        $status = false;
        
        if($request->R_me){
            $status = true;
        }
            
    
        if(Auth::attempt($data,$status)){
           
             return redirect(url('/student/display'));
    
        }else{
            session()->flash('message','Error In Your Credintials');
            return redirect(url('student/login'));
        }
    
        }

    
    
      public function logOut(){
          
        auth()->logout();
        
        return redirect(url('student/login'));
      }
}
