@guest
<nav class="navbar navbar-expand-lg navbar-dark bg-nav2 fw-bold w-100">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="{{route('welcome')}}"><span><i class="fa-solid fa-bullhorn"></i></span> Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
          <li class="nav-item">
            <a class="nav-link active mx-2" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mx-2" aria-current="page" href="{{route('announcement.create')}}">{{__('ui.annuncio')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mx-2" href="{{route('login')}}">Accedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mx-2" href="{{route('register')}}">Registrati</a>
          </li>
          <li class="nav-item">
            @include('components.locale', ['lang'=>'it', 'nation'=>'it'])
          </li>
          <li class="nav-item">
            @include('components.locale', ['lang'=>'en', 'nation'=>'gb'])
          </li>
          <li class="nav-item">
            @include('components.locale', ['lang'=>'es', 'nation'=>'es'])
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @endguest

  @auth
  <nav class="navbar navbar-expand-lg navbar-dark bg-nav2 fw-bold w-100" >
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#"><span class="me-2"><i class="fa-solid fa-bullhorn"></i></span>Presto<span class="vinz">.it</span> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
          <li class="nav-item mt-2">
              <span class="text-white fw-bold user mx-2">{{__('ui.welcome')}} {{Auth::user()->name}}</span>
          </li>
          <li class="nav-item">
            <a class="nav-link active mx-2" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mx-2" aria-current="page" href="{{route('announcement.create')}}">{{__('ui.annuncio')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 active" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
            

            <form action="{{route('logout')}}" method="POST" id="logout-form" class="d-none">@csrf
            
            </form>
          </li>
          @if(Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link active mx-2" aria-current="page" href="{{route('revisor-home')}}">{{__('ui.revisore')}} <span class=" badge rounded-pill bg-danger">{{App\Models\Announcement::count()}}</span></a>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.categorie')}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach($categories as $category)
              <li><a class="dropdown-item" href="{{route('category-rotta', [$category->name, $category->id])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </li>
          
          <li class="nav-item">
            @include('components.locale', ['lang'=>'it', 'nation'=>'it'])
          </li>
          <li class="nav-item">
            @include('components.locale', ['lang'=>'en', 'nation'=>'gb'])
          </li>
          <li class="nav-item">
            @include('components.locale', ['lang'=>'es', 'nation'=>'es'])
          </li>
        </ul>
        
      </div>
    </div>
  </nav>   
  @endauth