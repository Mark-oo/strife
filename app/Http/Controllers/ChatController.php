<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Chat;
use App\User;
use Session;

class ChatController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChat($key){

      $chat=DB::table('chats')->where('key','=',$key)->get();
      $users=User::all();

       return view('chats.single')->with('chat',$chat)->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('chats.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name'=>'required|min:3|max:255',
          'type'=>'required',
          'description'=>'required|min:3|max:255',
          'rules'=>'required|min:3|max:255',
          'key'=>'required|min:4|max:20',
        ]);

        $chat=new Chat;
        $chat->name=$request->name;
        $chat->type=$request->type;
        $chat->description=$request->description;
        $chat->rules=$request->rules;
        $chat->key=$request->key;
        $chat->user_count=count($request->users);

        $chat->save();
        $chat->users()->sync($request->users,false);

        Session::flash('success','Juhuuuuu');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $chat=Chat::find($id);
      // echo($chat->users);
      // $users=User::all();
      foreach($chat->users as $user){
        if($user->id == Auth::id()){
          return view('chats.show')->with('chat',$chat);#->with('users',$users);
        }else{
          abort(404);
        }
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
        $chat=Chat::find($id);
        $users=User::all();
        $users2=[];
        foreach($users as $user){
          $users2[$user->id]=$user->name;
        }
         // dd($users2);
        return view('chats.edit')->with('chat',$chat)->with('users',$users2);
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
        // dd($request)
        $this->validate($request,[
          'name'=>'required|min:3|max:255',
          'type'=>'required',
          'key'=>'required|min:4|max:20',
          'description'=>'required|min:3|max:255',
          'rules'=>'required|min:3|max:255',
        ]);
        $chat=Chat::find($id);
        $chat->name=$request->name;
        $chat->type=$request->type;
        $chat->description=$request->description;
        $chat->rules=$request->rules;
        $chat->key=$request->key;
        $chat->user_count=count($request->users);

        $chat->save();
        $chat->users()->sync($request->users);

        Session::flash('success','Wuhuuuuu');
        return redirect()->route('chats.show',$chat->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat=Chat::find($id);
        $chat->users()->detach();
        $chat->delete();

        Session::flash('success','Nooooooo');
        return redirect()->route('pages.index');
    }

    public function findChat(Request $request){
      $result=Chat::where('type','public')->where('name',$request->search)->first();
      // if(empty($result)){
      //   $result="govno";
      //   return response()->json($result);
      // }
      return response()->json($result);
    }
}
