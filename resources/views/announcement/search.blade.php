<x-layout>
    <x-navbar2></x-navbar2>
    <section class="content-section matop" id="portfolio">
        <h1 class="py-4 matop maincol text-center">Risultati ricerca per {{ $q }}</h1>
        <div class="container bgcustom mt-4">
            <div class="content-section-heading text-center">
            </div>
            <div class="row no-gutters">
                @foreach ($announcements as $announcement)
                    <div class="col-4">
                        <div class="card mt-4 mb-4">
                            <img src="{{ Storage::url($announcement->img) }}" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->name }}</h5>
                                <h5 class="card-title">Prezzo: {{ $announcement->price }} $</h5>
                                <a class="fw-bold"
                                    href="{{ route('category-rotta', [$announcement->category->name, $announcement->category->id]) }}">{{ $announcement->category->name }}</a>
                                <p class="">{{ $announcement->created_at->format('d/m/Y') }} -
                                    {{ $announcement->user->name }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
