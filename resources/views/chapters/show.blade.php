@extends("layout.base")

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$chapter->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{$chapter->created_at}}</div>
                    </header>
                    <section class="mb-5">
                        <p class="fs-5 mb-4">
                            {{$chapter->description}}
                        </p>

                    </section>
                </article>
            </div>
            <!-- Side widgets-->
        </div>
    </div>
@endsection
