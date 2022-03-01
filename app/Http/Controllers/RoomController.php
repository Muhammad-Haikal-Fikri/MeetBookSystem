<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rooms = Room::all();
        return view('dashboard.rooms.index', compact('rooms'));
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
        $request->validate([
            'name' => 'required',
        ]);

        $room = new Room;
        $room->name = $request->name;

        if ($files = $request->file('img')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "1." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img = $fileUpload;
        }
        if ($files = $request->file('img2')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "2." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img2 = $fileUpload;
        }
        if ($files = $request->file('img3')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "3." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img3 = $fileUpload;
        }

        $room->save();

        return redirect('/dashboard/rooms')->with('status', 'Data Ruangan Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {

        return view('dashboard.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('dashboard.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $room = Room::find($request->id);
        $room->name = $request->name;

        if ($files = $request->file('img')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "1." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img = $fileUpload;
        }
        if ($files = $request->file('img2')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "2." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img2 = $fileUpload;
        }
        if ($files = $request->file('img3')) {
            // Define upload path
            $destinationPath = public_path('/storage/img'); // upload path unix
            // $destinationPath = public_path('\storage\img'); // upload path windows
            // Upload Orginal Image
            $fileUpload = date('YmdHis') . "3." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileUpload);
            $room->img3 = $fileUpload;
        }

        $room->save();

        return redirect('/dashboard/rooms')->with('status', 'Data Ruangan Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {

        Room::destroy($room->id);
        return redirect('/dashboard/rooms')->with('status', 'Data Ruangan Dihapus!!');
    }
}
