<?php

namespace App\Http\Controllers\Api;

use App\Models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::all();

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data teman',
            'data'       => $friends 
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' =>'required|numeric',
            'alamat' => 'required',
        ]);

        $friends = Friends::create([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat'=> $request->alamat,
            
        ]);
            if ($friends) {
                return response()->json([
                    'success' => true,
                    'message'    => 'Teman Berhasil di tambahkan',
                    'data'       => $friends 
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'Teman Gagal Ditambahkan ',
                    'data'       => $friends 
                ], 409); 
            }
    }
    public function show ($id)
    {
        $friend = Friends::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Teman ',
            'data'       => $friend
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $friend = Friends::find($id)->update([
                'nama' => $request->nama,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data telah berhasil di rubah',
                'data'    => $friend
            ], 200);
        }
        public function destroy($id)
        {
            $friend = Friends::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data teman berhasil di hapus',
                'data'    => $friend
            ], 200);
        }
        
    }
