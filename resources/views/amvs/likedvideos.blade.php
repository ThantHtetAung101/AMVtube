@extends("layouts.app")

@section("content")
    @extends("layouts.sidebar")
            <div class="col" style="background-color: rgb(19, 19, 19);">
                <div class="row">
                <h1 class="text-white mt-3 mb-3">Liked Videos</h1>
                @if (!$amvs)
                    <div class="alert alert-warning bg-dark text-light">
                        There's no videos you've liked
                    </div>
                @endif
                @foreach ($amvs as $amv)
                @foreach ($amv->amvs as $amvv)
                <div class="col-lg-3 col">
                    <a href="{{url("amvtube/watch/$amvv->id")}}" class="link-light text-decoration-none">
                        <div class="card mb-2 border-0 rounded-0" style="width: 13.25rem;">
                            <img src="{{asset('/image/'.$amvv->thumb)}}" alt="thumbnail" width="212px" height="117px">
                            <div class="card-body" style="background-color: rgb(19, 19, 19);">
                                <h5 class="card-title text-light">{{Str::limit($amvv->title, 10, '...')}}</h5>
                                <span class="card-text text-light">{{$amvv->user->name}} / Genre: {{$amvv->category->name}}</span> <br>
                                <span class="text-muted text-light">
                                    {{$amvv->view}} View {{$amvv->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @endforeach
                </div>
                {{$amvs->links()}}
            </div>
        </div>
    </div>
@endsection
