<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Storage;




class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::sortable()->paginate(10);
        return view('members.index', ['members' => $members]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('imgupload')->extension(); 
        $imgname = date('dmyHis').'.'.$extension;
    
        $this->validate($request,[
    		'name' => 'required',
    		'gender' => 'required',
    		'birth_day' => 'required',
    		'birth_place' => 'required',
    		'address' => 'required',
            'phone_number' => 'required',
            'imgupload' => 'required|file|max:5000'
        ]);

        $path = Storage::putFileAs('public/images', $request->file('imgupload'),$imgname);
        $id = IdGenerator::generate(['table' => 'members', 'length' => 8, 'prefix' =>date('ym')]);

        Member::create([
            'id' => $id,
            'name' => $request->name,
            'gender' => $request->gender,
            'birth_day' => $request->birth_day,
            'birth_place' => $request->birth_place,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'phone_number' => $request->phone_number,
            'path' => $imgname
        ]);
        
        return redirect('members')->with('success', ' Berhasil Input Data !');
        
    }

    public function details()
    {
        return view('members.details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        //
        $id = Crypt::decryptString($data);
        $member=Member::find($id);
        return view('members.details', ['member' => $member]);        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        //
        $id = Crypt::decryptString($data);
        $member=Member::find($id);
        return view('members.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
        //

        $id = Crypt::decryptString($data);

        
        if($request->hasFile('imgupload')) {
            
            // dd('imgupload is not empty.');
            $extension = $request->file('imgupload')->extension(); 
            $imgname = date('dmyHis').'.'.$extension;
            
                            
                $member=Member::find($id);
                $path = Storage::putFileAs('public/images', $request->file('imgupload'),$imgname);
                
                $member->name = $request->name;
                $member->gender = $request->gender;
                $member->birth_day = $request->birth_day;
                $member->birth_place = $request->birth_place;
                $member->address = $request->address;
                $member->phone_number = $request->phone_number;
                $member->path = $imgname;
                $member->save();
                
                return redirect('members/')->with('success', ' Berhasil Update Data !');
                
            } else {
            // dd('imgupload is empty.');
            $this->validate($request,[
                'name' => 'required',
                'gender' => 'required',
                'birth_day' => 'required',
                'birth_place' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
            ]);

            $member=Member::find($id);

            $member->name = $request->name;
            $member->gender = $request->gender;
            $member->birth_day = $request->birth_day;
            $member->birth_place = $request->birth_place;
            $member->address = $request->address;
            $member->phone_number = $request->phone_number;
            $member->save();
    
            return redirect('members/')->with('success', ' Berhasil Update Data !');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
        //

        $id = Crypt::decryptString($data);
        $member = Member::find($id);
        $member->delete();
        
        return redirect('/members')->with('success', ' Berhasil Hapus Data !');

    }
}
