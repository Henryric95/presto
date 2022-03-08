<x-layout>
    <x-navbar></x-navbar>

    
    <section class="container matop">
      <div class="row justify-content-center">
          <h1 class="text-center trdcol fw-bold me-5 mb-3">Registrati</h1>
            <div class="col-8">
                <form method="POST" action="{{route('register')}}" class="register-form d-flex flex-column justify-content-around ">
                    @csrf
                    <div class="mb-3 mt-3 d-flex flex-column align-items-center">
                        <label for="exampleInputEmail1" class="form-label  fw-bold maincol">Nome Utente</label>
                        <input type="text" class="form-control register-input" id="exampleInputEmail1" name="name">
                       
                      </div>
                    <div class="mb-3 d-flex flex-column align-items-center">
                      <label for="exampleInputEmail1" class="form-label  fw-bold maincol">Email </label>
                      <input type="email" class="form-control register-input" id="exampleInputEmail1" name="email" >
                     
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center">
                      <label for="exampleInputPassword1" class="form-label maincol fw-bold">Password</label>
                      <input type="password" class="form-control  fw-bold register-input" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3 d-flex flex-column align-items-center">
                        <label for="exampleInputPassword1" class="form-label  fw-bold maincol">Conferma Password</label>
                        <input type="password" class="form-control register-input" id="exampleInputPassword1" name="password_confirmation">
                      </div>
                    
                    <button type="submit" class="btn btn-register mx-auto d-block mb-4 mt-3 text-white fw-bold">Submit</button>
                  </form>
            </div>
        </div>
    </section>
</x-layout>