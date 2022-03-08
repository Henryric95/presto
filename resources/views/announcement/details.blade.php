<x-layout>
    <x-navbar2></x-navbar2>
    <div class="container matop">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card cardcustom">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($announcement->announcementImages as $image)
                            <div class="carousel-item active">
                                <img class="brdradius" src="{{$image->getUrl(300,150)}}" class="d-block w-100" alt="...">
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold display-6">{{$announcement->name}}</h5>
                        <h5 class="card-title fw-bold">Prezzo: {{$announcement->price}} $</h5>

                        <a class="fw-bold" href="{{route("category-rotta" , [$announcement->category->name,$announcement->category->id])}}">{{$announcement->category->name}}</a>

                        <p class="mt-2 fw-bold">{{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Acquista ora</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 ms-5">
                <h1 class="text-center maincol">Descrizione</h1>
                <h3 class="fw-bold mt-3">{{$announcement->description}}</h3>
            </div>
        </div>
    </div>
</x-layout>