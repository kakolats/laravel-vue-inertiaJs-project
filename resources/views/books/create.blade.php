@extends("layout.base")

@section("content")
    <form class="row col-sm-6 m-auto" method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center">Ajout de livre</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="title" />
            <label class="form-label" for="form2Example1">Titre</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <textarea  id="form2Example2" class="form-control" name="description">
            </textarea>
            <label class="form-label" for="form2Example2">Description</label>
        </div>

        <div class="form-outline mb-4">
            <input type="file" id="form2Example1" class="form-control" name="file" required/>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published">
            <label class="form-check-label" for="exampleCheck1">Publié</label>
        </div>

        <!-- 2 column grid layout for inline styling -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Ajouter</button>

    </form>
@endsection
