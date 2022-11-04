@extends("layouts.app")

@section("content")
    @extends("layouts.sidebar")
            <div class="col text-lg-start text-center" style="background-color: rgb(19, 19, 19);">
                <div class="row mt-2 mb-2 mx-auto ms-3 ms-lg-0">
                @foreach ($amvs as $amv)
                <div class="col-lg-4 col">
                    <a href="{{url("amvtube/watch/$amv->id")}}" class="text-decoration-none">
                        <div class="card mb-3 border-0 rounded-0" style="width: 18rem;">
                            <img src="{{asset('/image/'.$amv->thumb)}}" alt="thumbnail" width="288px" height="161px">
                            <div class="card-body" style="background-color: rgb(19, 19, 19);">
                                <h5 class="card-title text-light">{{Str::limit($amv->title, 40, '...')}}</h5>
                                <span class="card-text text-light">{{$amv->user->name}} / Genre: {{$amv->category->name}}</span> <br>
                                <span class="text-muted">
                                    {{$amv->view}} View {{$amv->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            {{$amvs->links()}}
            </div>
        </div>
    </div>
@endsection
