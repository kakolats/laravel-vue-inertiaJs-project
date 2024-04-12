@extends("layout.base")

@section("content")

    <a href="{{route("books.create")}}" class="btn btn-primary mb-3">Ajouter un nouveau livre</a>
    <a href="#" class="btn btn-primary mb-3">Corbeille</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Publication</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td>{{$book->description}}</td>
                <td>
                    @if($book->published == 1)
                        @php
                            $color = "bg-primary";
                            $text = "Publié";
                        @endphp

                    @else
                        @php
                            $color = "bg-secondary";
                            $text = "Non publié";
                        @endphp
                    @endif
                    <span class="badge {{$color}}">{{$text}}</span>
                </td>
                <td>
                    <a href="{{route("chapters.bookChapters", ["id" => $book->id])}}" class="btn btn-primary">Details</a>
                    <a href="{{route("books.edit", ["id" => $book->id])}}" class="btn btn-warning">Modifier</a>
                    <a href="{{route("books.delete", ["id" => $book->id])}}" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

