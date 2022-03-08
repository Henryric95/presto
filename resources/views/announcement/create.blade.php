<x-layout>
    <x-navbar2></x-navbar2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>
    @endif
    <h1 class="maincol text-center fw-bold matop">{{__('ui.crea')}}</h1>
    <div class="container mt-4 bgcustom">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{route('announcement.store')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                    <div class="mb-3 mt-3">
                        <label for="exampleInputName" class="form-label text-white">{{__('ui.nome')}}</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label text-white">{{__('ui.prezzo')}}</label>
                        <input type="number" class="form-control" id="exampleInputPrice" name="price">
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label class="text-white" for="description2">{{__('ui.descri')}}</label> <br>
                            <textarea name="description" id="description2" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="" name="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="images" class="col-md-12 col-form-label text-md-right text-white">{{__('ui.image')}}</label>
                        <div class="col-md-12">
                            <div class="dropzone" id="drophere"></div>
                                @error('images') 
                                     <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror 
                        </div>
                    </div>
                        
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Crea</button>

                    </div>
                </form>
            </div>
        </div>
    </div>



</x-layout>