<x-layout>
    <x-navbar/>
    <header>
        <div class="container vh-100">
            <div class="row h-100">
                <div class="col-12 d-flex h-100 flex-column justify-content-center ">
                    <h3 class="text-center display-1 text-white fw-bold">{{__('ui.Cresci')}}</h3>
                    <h2 class="text-center text-white mt-5 fw-bold"><span id="input"></span></h2>
                    <form class="text-center text-white pt-3 mt-3 fw-bold" action="{{route('search')}}" method="GET">
                        @csrf
                        <input class="header-input" type="text" name="q">
                        <button class=" btn-welcome" type="submit">{{__('ui.cerca')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    
    
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif





    <h1 class="text-center fw-bold display-1 mt-5">{{__('ui.lastads')}}</h1>




    
    
    
    
    <article class="container-fluid matop">
        <div class="row justify-content-around ms-5">
                @foreach($announcements as $announcement)
                <div class="col-12 col-md-4 my-5">
                  
                        <div class="card ">
                            <div class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach($announcement->announcementImages as $image)
                                    <!-- Slides -->
                                  <div class="swiper-slide"><img src="{{$image->getUrl(300,300)}}" alt=""></div>
                                     @endforeach
                                  
                                  ...
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                              
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                              
                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                              </div>
                            
                                    
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->name}}</h5>
                                <h5 class="card-title">Prezzo: {{$announcement->price}} $</h5>
                                <a class="fw-bold" href="{{route("category-rotta" , [$announcement->category->name,$announcement->category->id])}}">{{$announcement->category->name}}</a>
                                <p class="mt-2">{{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</p>
                                <div class="text-center">
                                    <a href="{{route('details', compact('announcement'))}}" class="btn btn-primary">{{__('ui.details')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </article>
                                                
                                            
                                            
                                            

                                        
                                        
                                     


                            

                    
                
                
                            
                            
                            
                
                       







</x-layout>