<x-layout>
    <x-navbar/>


    
    <section class="container-fluid matop">
      <div class="row justify-content-center">
          <h1 class=" fw-bold mb-4 text-center me-5 trdcol">Accedi</h1>
            <div class="col-8">
                <form method="POST" action="{{route('login')}}" class="login-form shadow d-flex flex-column justify-content-center">
                    @csrf
                    
                    <div class="mb-3 d-flex align-items-center flex-column text-white mt-4">
                      <label for="exampleInputEmail1" class="form-label fw-bold fs-4">Email </label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" >
                    </div>
                     
                    <div class="mb-2 mt-3 d-flex align-items-center flex-column text-white" >
                      <label for="exampleInputPassword1" class="form-label fw-bold fs-4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password"> 
                    </div>
                  
                    
                    <button type="submit" class="btn-login mt-5 d-block mx-auto fw-bold" >Submit</button>
                  </form>
            </div>
        </div>
    </section>
</x-layout>