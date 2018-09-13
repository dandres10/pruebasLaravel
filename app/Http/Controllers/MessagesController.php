<?php

namespace App\Http\Controllers;

use App\Message;
use App\Note;
use Carbon\Carbon;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Events\MessageWasReceived;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $messages = DB::table('messages')->get();
        // $messages = Message::all();
        $messages = Message::with(['user','note','tags'])->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $carbon = new \Carbon\Carbon();
        /* DB::table('messages')->insert([
        "nombre" => $request->input('nombre'),
        "email" => $request->input('email'),
        "mensaje" => $request->input('mensaje'),
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now()
        ]);*/

        //$message = Message::create();

        if (auth()->check()) {

            //auth()->user()->messages()->save($message);

            DB::table('messages')->insert([
                "nombre" => auth()->user()->name,
                "email" => auth()->user()->email,
                "mensaje" => $request->input('mensaje'),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "user_id" => auth()->user()->id,

            ]);

        } else {

            $messages = Message::create($request->all());
            $messages->save();

            event(new MessageWasReceived($messages));
          

        }

       

        return redirect()->route('messages.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
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
        /*DB::table('messages')->where('id',$id)->update([
        "nombre" => $request->input('nombre'),
        "email" => $request->input('email'),
        "mensaje" => $request->input('mensaje'),
        "updated_at" => Carbon::now()
        ]);*/

        $message = Message::findOrFail($id)->update($request->all());

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('messages')->where('id',$id)->delete();
        Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');
    }
}
