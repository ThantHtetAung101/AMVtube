@extends("layouts.app")

@section("content")
    @extends("layouts.sidebar")
            <div class="col" style="background-color: rgb(19, 19, 19);">
                <div class="row mt-3 mb-2">
                    <div class="col p-3">
                        <h2 class="text-light">{{$amv->title}}</h2>
                        <span class="d-none" id="idForView">{{$amv->id}}</span>
                        <video width="640px" height="360px" id="video" controls>
                            <source src="{{asset('/video/'.$amv->video)}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="mt-1">
                            <h1 class="mb-2 text-light"></h1>
                            <span class="fw-bold text-light">
                                Posted {{$amv->created_at->diffForHumans()}} || Genre: {{$amv->category->name}} || {{$amv->view}} View
                            </span>
                            @auth
                            <form method="post" id="sendlike" class="d-inline ms-lg-5 ms-2">
                                @csrf
                                <input type="hidden" name="like" id="likeInput">
                                <input type="hidden" value="{{$amv->id}}" id="amvid">
                                <input type="hidden" value="@if(Auth::check()){{auth()->user()->id}}@endif" id="userId">
                                <button class="btn btn-outline-light rounded-0 mt-2 mt-lg-0" id="like"
                                @auth
                                    @foreach (auth()->user()->likes as $like)
                                    @if ($like->amv_id === $amv->id)
                                        {{"disabled"}}
                                    @endif
                                    @endforeach
                                @endauth
                                ><i class="fa-regular fs-4 me-2 fa-thumbs-up" id="likeicon"></i> <span id="likeCount">{{$amv->like}}</span></button>
                            </form>
                            <form method="post" id="sendDisLike" class="d-inline ms-lg-5 ms-2">
                                @csrf
                                <input type="hidden" name="dislike" id="disLikeInput">
                                <input type="hidden" value="{{$amv->id}}" id="amvid">
                                <input type="hidden" value="@if(Auth::check()){{auth()->user()->id}}@endif" id="userId">
                                <button class="btn btn-outline-light rounded-0 mt-2 mt-lg-0" id="disLike"
                                @auth
                                    @foreach (auth()->user()->dislikes as $dislike)
                                    @if ($dislike->amv_id === $amv->id)
                                        {{"disabled"}}
                                    @endif
                                    @endforeach
                                @endauth

                                ><i class="fa-regular me-2 fs-4 fa-thumbs-down" id="dislikeicon"></i> <span id="disLikeCount">{{$amv->dislike}}</span></button>
                            </form>
                            @endauth
                        </div>
                        <div class="mt-3">
                            <fieldset class="border border-success border-2 p-2">
                                <legend class="float-none w-auto px-2 text-light">Description: </legend>
                                @auth
                                <form id="subscribe">
                                    <input type="hidden" name="name" value="{{$amv->user->name}}">
                                    <input type="hidden" name="subid" value="{{$amv->user->id}}">
                                    <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}}@endif}">
                                    <span id="ownerID" class="d-none">{{$amv->user->id}}</span>
                                    <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}}@endif">
                                    @if (Auth::user()->id == $amv->user->id)
                                        <a href="{{route('edit', $amv->id)}}" class="btn btn-outline-light float-end rounded-0">
                                            Edit Video
                                        </a>
                                    @else
                                        <button class="btn rounded-0 btn-outline-light float-end" type="submit" id="sub"
                                        @auth
                                            @foreach (auth()->user()->subs as $sub)
                                                @if ($sub->name === $amv->user->name)
                                                    {{"disabled"}}
                                                @endif
                                            @endforeach
                                        @endauth

                                        >Subscribe
                                            <span class="d-none" id="subCount">
                                                {{$amv->user->sub}}
                                            </span>
                                        </button>
                                    @endif
                                </form>
                                @endauth
                                <p class="ms-2 text-light">Posted By
                                    <a href="{{route('account', $amv->user->id)}}" class="text-light fw-bolder text-decoration-none link-primary">
                                        {{$amv->user->name}}
                                    </a>
                                    <span id="subs" class="text-light">({{$amv->user->sub}})</span>
                                     Subscribers</p>
                                    <p class="ms-2 text-light desc">{{$amv->desc}}</p>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="list-group commentbox mt-5 pt-2">
                            <li class="list-group-item fw-bold fs-5 active">
                                Comments
                            </li>
                            @foreach ($amv->comments as $comment)
                                <li class="list-group-item bg-dark border border-0">
                                    <span class="text-light">
                                        <i class="fa-solid fa-user-astronaut fs-5 me-2"></i>
                                        <a href="{{route('account', $amv->user->id)}}" class="text-light fw-bolder text-decoration-none link-primary">
                                            {{$comment->commenter->name}}
                                        </a>
                                        <span class="text-white-50"> - {{$comment->created_at->diffForHumans()}}</span>
                                        <br>
                                        {{$comment->content}}
                                    </span>

                                </li>
                            @endforeach
                            @auth
                            <li class="list-group-item bg-dark border border-0 position-sticky bottom-0">
                                <form action="{{url("amvtube/comment")}}" method="post" id="comment-form">
                                    @csrf
                                    <input type="hidden" name="amv_id" value="{{$amv->id}}">
                                    <input type="text" name="content" class="bg-dark text-light form-control w-75 d-inline" required>
                                    <button type="submit" class="btn btn-outline-light"><i class="fa-solid fa-paper-plane"></i></button>
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
