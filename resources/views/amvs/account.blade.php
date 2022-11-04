@extends("layouts.app")

@section("content")
    @extends("layouts.sidebar")
        <div class="col" style="background-color: rgb(19, 19, 19);">
            <div class="alert alert-info border-0 rounded-0 shadow p-3 bg-dark">
                <h1 class="text-light mt-3" style="display: inline;">
                    {{$user->name}}
                    <span class="fs-6 text-white-50" id="subs">{{$user->sub}} Subscribers</span>
                </h1>
                @auth
                <form id="subscribe" style="display: inline;">
                    <input type="hidden" name="name" value="{{$user->name}}">
                    <input type="hidden" name="subid" value="{{$user->id}}">
                    <input type="hidden" name="user_id" id="userId" value="@if(Auth::check()){{Auth::user()->id}}@endif">
                    <span id="ownerID" class="d-none">{{$user->id}}</span>
                @if (Auth::user()->id == $user->id)
                    <a href="{{route('edit', $user->id)}}" class="btn btn-outline-light float-end rounded-0">
                        Edit Video
                    </a>
                @else
                    <button class="btn rounded-0 btn-outline-light float-end mt-1" id="sub"
                    @auth
                        @foreach (auth()->user()->subs as $sub)
                            @if ($sub->name === $user->name)
                                {{"disabled"}}
                            @endif
                        @endforeach
                    @endauth
                    >Subscribe
                        <span class="d-none" id="subCount">
                            {{$user->sub}}
                        </span>
                    </button>
                @endif
                </form>
                @endauth
            </div>
            <h3 class="text-white mt-5 ms-2 d-inline-block">
                @auth
                    @if ($user->id != auth()->user()->id)
                        Their Videos
                    @else
                        Your Videos
                    @endif
                @endauth
                @if (!Auth::check())
                    Their Videos
                @endif
            </h3>
            <div class="container mt-3">
                <div class="row">
                @foreach ($amvs as $amv)
                <div class="col-lg-3 col" style="background-color: rgb(19, 19, 19);">
                    <a href="{{url("amvtube/watch/$amv->id")}}" class="text-decoration-none">
                        <div class="card mb-2 border-0 rounded-0" style="width: 13.25rem;">
                            <img src="{{asset('/image/'.$amv->thumb)}}" alt="thumbnail" width="212px" height="117px">
                            <div class="card-body" style="background-color: rgb(19, 19, 19);">
                                <h5 class="card-title text-light">{{Str::limit($amv->title, 10, '...')}}</h5>
                                <span class="card-text text-light">{{$amv->user->name}} / Genre: {{$amv->category->name}}</span> <br>
                                <span class="text-muted text-light">
                                    {{$amv->view}} View {{$amv->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                </div>
            </div>
            {{$amvs->links()}}
        </div>
    </div>
</div>
@endsection
