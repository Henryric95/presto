<x-layout>
    <x-navbar2 />
    <article class="container matop">
        <h1 class="maincol text-center mb-4 fw-bold">{{__('ui.tuoiannunci')}}</h1>
        <div class="row justify-content-center bgcustom">
            @foreach($announcements as $announcement)
            <div class="col-4">
                <div class="card mt-5">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($announcement->announcementImages as $image)
                            <div class="carousel-item active">
                                <img src="{{$image->getUrl(300,150)}}" class="d-block w-100 brdradius" alt="...">
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
                        <h5 class="card-title">{{$announcement->name}}</h5>
                        <h5 class="card-title">Prezzo: {{$announcement->price}} $</h5>

                        <a class="fw-bold" href="{{route("category-rotta" , [$announcement->category->name,$announcement->category->id])}}">{{$announcement->category->name}}</a>



                        <p class="">{{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</p>

                    </div>
                </div>
            </div>
            @endforeach
            <div class="row justify-content-center mt-3 w-100">
                <div class="col-5 mlcustom d-flex justify-content-center">
                    {{$announcements->links()}}
                </div>
            </div>

        </div>
    </article>



</x-layout>