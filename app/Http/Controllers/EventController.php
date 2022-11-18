<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;

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
        foreach (Event::all() as $event) {
           echo $event->name;
        }

        //return view('Models.Event', ['posts' => BlogPost::all()]);



        //return $event;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug = Str::of('Laravel Framework')->slug('-');
        $uuid = (string) Str::uuid();

        $event = Event::create([
        'id'    => $uuid  ,
        'name'  => 'testing',
        'slug'  => $slug ,

        ]);
 
        $event->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $event = Event::where('id', $id)
               ->orderBy('name')
               ->take(10)
               ->get();
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $event = Event::where('id', '=', $id)->first();
        if ($event === null) {
            $slug = Str::of('Laravel Framework')->slug('-');
            $uuid = (string) Str::uuid();

            $event = Event::create([
                'id'    => $uuid  ,
                'name'  => 'testing',
                'slug'  => $slug ,

            ]);
 
            $event->save();
        }else{

            $event = Event::where('id', $id)->first();
            $freshEvent = $event->fresh();
        }

        return freshEvent;
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
        return 'destroy';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activeEvents()
    {
      
        return 'active-events';
    }


}
