@extends("layout.base_client")

@section("content1")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$book->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">{{$book->created_at}}</div>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{asset("storage/$book->imageLink")}}" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">
                        {{$book->description}}
                    </p>

                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <h2>Chapitres</h2>
            <ul class="list-group">
                @foreach($chapters as $chapter)
                    <li class="list-group-item"><a href="{{route("chapters.show", ["id" => $chapter->id])}}">{{$chapter->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
