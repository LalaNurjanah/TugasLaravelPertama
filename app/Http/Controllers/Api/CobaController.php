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
        $friends = Friends::with('groups')->whereHas('groups')->get();

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
            'groups_id'=> $request->groups_id,
            
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
        $friend = Friends::with('groups')-> where('id',$id)->get();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Teman ',
            'data'       => $friend
        ], 200); 
    }
    public function edit ($id)
    {
        $friend = Friends::with('groups')-> where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data Teman ',
            'data'       => $friend
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            
    
            $f = Friends:: find($id)->update([
                'nama' => $request->nama,
                'no_tlp' => $request->no_tlp,
                'alamat'=> $request->alamat,
                'groups_id'=> $request->groups_id,
                
            ]);
                    return response()->json([
                        'success' => true,
                        'message'    => 'post update',
                        'data'       => $f ,
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
