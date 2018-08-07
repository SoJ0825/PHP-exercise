<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use PharIo\Manifest\ManifestElementException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $members = Member::all();
        $count = Member::count();
        return view('index', compact('members','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->cName = $request['cName'];
        $member->cBirthday = $request['cBirthday'];
        $member->cEmail = $request['cEmail'];
        $member->save();
        return redirect('/');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $member = Member::where('cID', $id)->first();
        $member = Member::find($id);
        $name = $member['cName'];
        $birthday = $member['cBirthday'];
        $email = $member['cEmail'];
        return view ('update', compact('id', 'name', 'birthday', 'email'));
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
        $member = Member::find($id);
        $member['cName'] = $request['cName'];
        $member['cBirthday'] = $request['cBirthday'];
        $member['cEmail'] = $request['cEmail'];
        $member->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect('/');
    }
}
