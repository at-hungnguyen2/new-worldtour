<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Image;

class UserController extends Controller
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate($this->user->ITEMS_PER_PAGE);
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
        	$user = $this->user->findOrFail($id);

        	return view('users.show')->with(['user' => $user]);
        } catch(ModelNotFoundException $e) {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
        	$user = $this->user->findOrFail($id);

        	return view('users.edit')->with(['user' => $user]);
        } catch(ModelNotFoundException $e) {

        }
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $request->user()->name.'.'.$image->getClientOriginalExtension();
            $path = public_path(config('app.avatar_url').$fileName);
            Image::make(file_get_contents($image))->resize(300, 300)->save($path);
            if ($request->user()->image) {
                File::delete(public_path(config('app.avatar_url').$request->user()->image));
            }
            $request->except('image');
        }

        $requestInput = $request->all();
        dd($requestInput);
        if ($fileName) {
            $requestInput['image'] = $fileName;
        }
        $user = $this->user->findOrFail($id)->update($requestInput);

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
    }
}
