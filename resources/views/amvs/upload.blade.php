@extends("layouts.app")

@section("content")
<div class="container-fluid vh-100 d-flex flex-column" style="background-color: rgb(19, 19, 19);">
    <div class="container">
        <form method="post" class="w-lg-50 w-100 mt-5" action="{{url("amvtube/postamv")}}" enctype="multipart/form-data">
            @csrf
            <label for="video" class="text-light">Upload Video Here (Required)</label>
            <input type="file" name="video" class="form-control bg-dark text-light mb-2" required>
            <label for="thumb" class="text-light">Upload your thumbnail (Required)</label>
            <input type="file" name="thumb" class="form-control bg-dark text-light mb-2" required>
            <label for="title" class="text-light">Put your amv title (Required)</label>
            <input type="text" name="title" class="form-control bg-dark text-light mb-2" required>
            <label for="desc" class="text-light">Describe your amv (Required)</label>
            <input type="text" name="desc" class="form-control bg-dark text-light mb-2" required>
            <label for="category" class="text-light">Choose a genre (Required)</label>
            <select name="category_id" id="category" class="bg-dark text-light form-control mb-2">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" class="bg-dark text-light">{{$category->name}}</option>
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
