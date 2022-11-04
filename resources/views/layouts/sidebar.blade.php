@section('sidebar')
<div class="container-fluid vh-100 d-flex flex-column">
    <div class="row flex-grow-1">
        <div class="col-lg-2 p-0 d-none d-lg-block bg-dark">
            <ul class="list-group">
                <a href="{{url("amvtube")}}" class="list-group-item bg-dark text-light list-group-item-action border-0 rounded-0">
                    <i class="fa-solid fs-5 me-2 ms-2 fa-house"></i> Home
                </a>
                @auth
                    <a href="{{url("amvtube/liked")}}" class="list-group-item text-light bg-dark list-group-item-action border-0 rounded-0">
                        <i class="fa-solid fs-5 me-2 ms-2 fa-thumbs-up"></i> Liked Video
                    </a>
                    <li class="list-group-item list-group-item text-light bg-dark border-0 rounded-0">
                        <span><i class="fa-solid fs-5 me-2 ms-1 fa-crown"></i> Subscriptions</span> <br>
                    </li>
                    @foreach (auth()->user()->subs as $sub)
                        <li class="list-group-item list-group-item-action text-light bg-dark border-0 p-0 rounded-0">
                            <a href="{{url("amvtube/account/$sub->subid")}}" class="link-light ms-5 link-primary text-decoration-none">{{$sub->name}}</a>
                        </li>
                    @endforeach
                @endauth
            </ul>
        </div>
@endsection
