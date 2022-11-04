@extends("layouts.app")

@section("content")
<div class="container-fluid vh-100 d-flex flex-column" style="background-color: rgb(19, 19, 19);">
    <div class="container">
        <form method="post" class="w-lg-50 w-100 mt-5" action="{{url("amvtube/modify/$amv->id")}}" enctype="multipart/form-data">
            @csrf
            <label for="title" class="text-light">Edit your amv title (Required)</label>
            <input type="text" value="{{$amv->title}}" name="title" class="form-control bg-dark text-light mb-2" required>
            <label for="desc" class="text-light">Edit your amv description (Required)</label>
            <input type="text" value="{{$amv->desc}}" name="desc" class="form-control bg-dark text-light mb-2" required>
            <label for="category" class="text-light">Edit your amv genre (Required)</label>
            <select name="category_id" id="category" class="bg-dark text-light form-control mb-2">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" class="bg-dark text-light"
                        @if ($amv->category_id == $category->id)
                            selected
                        @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">
                Post
            </button>
        </form>
    </div>
</div>
@endsection
