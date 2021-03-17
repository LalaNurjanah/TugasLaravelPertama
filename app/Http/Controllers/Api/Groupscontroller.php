<?php

namespace App\Http\Controllers\Api;

use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data grup teman',
            'data'       => $groups
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
            'id' => 'required|unique:friends|max:255',
            'name' =>'required|numeric',
            'description' => 'required',
        ]);

        $groups = Groups::create([
            'id' => $request->id,
            'name' => $request->name,
            'description'=> $request->description,
            
        ]);
            if ($groups) {
                return response()->json([
                    'success' => true,
                    'message'    => 'grup Berhasil di tambahkan',
                    'data'       => $groups
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'group Gagal Ditambahkan ',
                    'data'       => $groups
                ], 409); 
            }
    }
    public function show ($id)
    {
        $group = Groups::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data group ',
            'data'       => $group
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $group = Groups::find($id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data grup telah berhasil di rubah',
                'data'    => $group
            ], 200);
        }
        public function destroy($id)
        {
            $group = Groups::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data grup berhasil di hapus',
                'data'    => $group
            ], 200);
        }
        
    }
