@extends("layout.base")

@section("content")
    <form class="row col-sm-6 m-auto" method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center">Mise à jour de livre</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="title" value="{{$book->title}}"/>
            <label class="form-label" for="form2Example1">Titre</label>
        </div>

        <div class="form-outline mb-4">
            <textarea  id="form2Example2" class="form-control" name="description">
                {{$book->description}}
            </textarea>
            <label class="form-label" for="form2Example2">Description</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published" @if($book->published == 1) checked @endif">
            <label class="form-check-label" for="exampleCheck1">Publié</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Mettre à jour</button>

    </form>
@endsection
