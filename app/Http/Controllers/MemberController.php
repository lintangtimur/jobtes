<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\Member;
use App\Models\User;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function json()
    {
        $users = User::role('member')->get();
        return response()->json($users);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view member');
        
        // list all members
        if(auth()->user()->roles->pluck('name')[0] == 'admin'){
            $users = User::all();
        }else{
            $users = User::where('id', auth()->user()->id)->get();
        }
        
        return view('member', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create member');
        return view('member.add');
    }


    public function store(EditUserRequest $editUserRequest, MemberService $memberService)
    {
        $foto_path = $editUserRequest->file('foto')->store('public');

        $memberService->store($editUserRequest, $foto_path);
        return redirect()->route('member')->with('message', 'data berhasil ditambahkan');
    }

    public function register_store(EditUserRequest $editUserRequest, MemberService $memberService)
    {
        $foto_path = $editUserRequest->file('foto')->store('public');

        $memberService->register_store($editUserRequest, $foto_path);

        return redirect()->route('register')->with('message', 'data berhasil ditambahkan');
    }

    
    public function show($id)
    {
        $this->authorize('edit member');

        $user = User::where('id',$id)->first();
        
        return view('member.detail', compact('user'));
    }
    
    public function update(EditUserRequest $editUserRequest, MemberService $memberService)
    {
        $foto_path = null;

        if($editUserRequest->hasFile('foto')){
            $foto_path = $editUserRequest->file('foto')->store('public');
        }
        

        
        $memberService->update($editUserRequest, $foto_path);

        return redirect()->route('member')->with('message', 'data berhasil diupdate');
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();

        return redirect()->route('member')->with('message', 'berhasil dihapus');
    }
}
