<x-layout>
    <x-navbar2></x-navbar2>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if($announcements)

    <h1 class="text-center trdcol fw-bold matop">Ecco i tuoi annunci</h1>
    <article class="container mt-4 bgcustom">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card roundpill mt-4">
                    @foreach($announcements->announcementImages as $image)
                    <div class="col-12 col-md-6 ms-4">
                        <img src="{{$image->getUrl(300,150)}}" class="rounded" alt="...">
                    </div>
                    @endforeach
                    <div class="col-12 col-md-6 ms-4">
                        @foreach($announcements->announcementImages as $image)
                        adult: {{$image->adult}} <br>
                        spoof: {{$image->spoof}} <br>
                        medical: {{$image->medical}} <br>
                        violence: {{$image->violence}} <br>
                        racy: {{$image->racy}} <br>
                   
                        <b>Labels</b> <br>
                        <ul>
                            @if ($image->labels)
                         @foreach ($image->labels as $label)
                               <li>{{$label}}</li> 
                            @endforeach
                            @endif
                        </ul>
                        @endforeach
                      
                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$announcements->name}}</h5>
                        <h5 class="card-title">Prezzo:{{$announcements->price}}</h5>
                        <a class="" href="">{{$announcements->category->name}}</a>
                        <p class="">{{$announcements->updated_at}}/{{$announcements->user->name}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <form class="mb-2 ms-2" action="{{route('revisor.accept',$announcements->id)}}" method="POST">
                            @csrf
                            <button class="btn-success brdradius" type="submit">Accetta</button>
                        </form>
                        <form class="mb-2 me-2" action="{{route('revisor.reject',$announcements->id)}}" method="POST">
                            @csrf
                            <button class="btn-danger brdradius" type="submit">Rifiuta</button>
                        </form>
                    </div>
                    
                </div>
            </div>
           

        </div>
        <div class="row mt-3 ">
            <div class="col-6">

            </div>
            <div class="col-6">

            </div>
        </div>
    </article>
    @else
    <h1 class="matop text-center maincol">Non ci sono più annunci da revisionare</h1>
    @endif
</x-layout>