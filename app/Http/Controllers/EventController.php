<?php

namespace App\Http\Controllers;


use App\Models\Pasien;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $pasien = Pasien::all();

        return view('event.index', compact('pasien'));
    }

    public function data()
    {
        $event = Event::orderBy('id', 'desc')->get();

        return datatables()
            ->of($event)
            ->addIndexColumn()
            ->addColumn('pasien_id', function ($event) {
                return $event->pasien->nm_hewan;
            })
            ->addColumn('no_hp', function ($event) {
                return $event->pasien->phone;
            })
            
            ->addColumn('aksi', function ($event) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('events.update', $event->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('events.destroy', $event->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    <a  href="https://api.whatsapp.com/send?phone=+62'.$event->pasien->phone.'&text=Hallo,%20Pet%20Lovers.%20Kami%20Dari%20Lampung%20Pet%20Clinic.%20Menginformasikan%20saudara/i%20'.$event->pasien->nm_pemilik.'%20dengan%20hewan%20bernama%20'.$event->pasien->nm_hewan.'%20untuk%20melakukan%20'.$event->desc.'%20pada%20tanggal%20'.$event->tgl_periksa.'"class="btn btn-xs btn-success btn-flat" aria-hidden="true"target="_blank" ><i class="fa fa-whatsapp"></i></a>
                    
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
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
        $event = Event::create($request->all());
        if ($event) {
            // return redirect()
            //     ->route('kelas_products.index')
            //     ->with([
            //         'success' => 'New post has been created successfully'
            //     ]);
            return response()->json(array("success" => 'New post has been created successfully'));
        } else {
            // return redirect()
            //     ->back()
            //     ->withInput()
            //     ->with([
            //         'error' => 'Some problem occurred, please try again'
            //     ]);
            return response()->json(array("error" => 'Some problem occurred, please try again'));
        }
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
        $event = Event::find($id);

        return response()->json($event);
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
        $event = Event::find($id)->update($request->all());
        return response()->json('Data berhasil disimpan', 200);
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
        $event = Event::find($id)->delete();

        return response(null, 204);
    }
}
