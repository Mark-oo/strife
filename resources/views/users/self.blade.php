@extends('main_auth')
@section('title',"| $user->handle")
@section('content')
  <div class="container">
    <div class="row">
      <div  class="col-md-2" >
       {{-- {{public_path('/css/images/big'.$image)}} --}}
       <img  class="profile-image" src="{{$image}}"></img>

          <a v-bind:title="message" href="{{url('profile/'.$user->handle.'/edit')}}"class="button possition" type="button" >
              <svg style="margin-left:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.134 1.535C9.722 2.562 8.16 4.057 6.889 5.312 5.8 6.387 5.041 7.401 4.575 8.294a3.745 3.745 0 00-3.227 1.054c-.43.431-.69 1.066-.86 1.657a11.982 11.982 0 00-.358 1.914A21.263 21.263 0 000 15.203v.054l.75-.007-.007.75h.054a14.404 14.404 0 00.654-.012 21.243 21.243 0 001.63-.118c.62-.07 1.3-.18 1.914-.357.592-.17 1.226-.43 1.657-.861a3.745 3.745 0 001.055-3.217c.908-.461 1.942-1.216 3.04-2.3 1.279-1.262 2.764-2.825 3.775-4.249.501-.706.923-1.428 1.125-2.096.2-.659.235-1.469-.368-2.07-.606-.607-1.42-.55-2.069-.34-.66.213-1.376.646-2.076 1.155zm-3.95 8.48a3.76 3.76 0 00-1.19-1.192 9.758 9.758 0 011.161-1.607l1.658 1.658a9.853 9.853 0 01-1.63 1.142zM.742 16l.007-.75-.75.008A.75.75 0 00.743 16zM12.016 2.749c-1.224.89-2.605 2.189-3.822 3.384l1.718 1.718c1.21-1.205 2.51-2.597 3.387-3.833.47-.662.78-1.227.912-1.662.134-.444.032-.551.009-.575h-.001V1.78c-.014-.014-.112-.113-.548.027-.432.14-.995.462-1.655.942zM1.62 13.089a19.56 19.56 0 00-.104 1.395 19.55 19.55 0 001.396-.104 10.528 10.528 0 001.668-.309c.526-.151.856-.325 1.011-.48a2.25 2.25 0 00-3.182-3.182c-.155.155-.329.485-.48 1.01a10.515 10.515 0 00-.309 1.67z"></path></svg>
          </a>

      </div>
      <div class="col-md-8" style="margin-top:120px;">
        {{$user->bio}}
        {{-- BIO --}}

      </div>
    </div>

      <h3 style="margin-top:10px;">{{$user->name}}</h3>
      <h4>{{$user->handle}}</h4>
      <h4>dicksize</h4>
      <div class="row">
        <div class="col">
          govance
        </div>
        <div class="col">
          prdez
        </div>
      </div>
  </div>

{{-- <div class="container">
  <div class="text-center"><h3>{{$user->name}}</h3></div>
  <div class="row">
    <div class="col">

  </div>
  </div>
  <div class="row">
    <table>
      <thead>
        <tr>
          <th>#</th><th>Chat name</th>
        </tr>
      </thead>
      <tbody>
        @if(!count($user->chat))
          <tr>
            <td>No Chats</td>
          </tr>
        @else
        @foreach($user->chat as $u)
          <tr>

            <td></td><td>{{$u->name}}</td>
          </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div> --}}
@endsection
