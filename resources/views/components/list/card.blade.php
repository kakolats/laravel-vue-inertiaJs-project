{{--<div class="col">
    <div class="card">
        <img  height="250px" width="250px" src="{{asset("storage/$book->imageLink")}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            --}}{{--<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}{{--
            <a href="{{route("books.show", ["id" => $book->id])}}" class="btn btn-primary">Details</a>
        </div>
    </div>
</div>--}}

<div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
    <div class="events_item">
        <div class="thumb">
            <a href="#"><img height="300px" width="350px" src="{{asset("storage/$book->imageLink")}}" alt=""></a>
            <span class="category">Webdesign</span>
        </div>
        <div class="down-content">
            <span class="author">Stella Blair</span>
            <h4>{{$book->title}}</h4>
        </div>
    </div>
</div>
