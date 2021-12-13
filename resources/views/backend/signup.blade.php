
<x-backend>
    <div class="flex justify-center px-4">
        <div class="w-full sm:w-1/4">
          <div>
              <h2>Welcome...</h2>
          </div>
          <form method="post" action="{{route('register')}}">
              {{csrf_field()}}
              <div class="text-red-600">{{session('auth_error')}}</div>

              <div>
                  <x-backend.form.select wire:model.defer="user.role" name="role">
                      <option value="">Select role*</option>
                      @foreach($roles as $role)
                          <option value="{{$role->id}}">{{ucwords($role->name)}}</option>
                      @endforeach
                  </x-backend.form.select>
              </div>

              <div class="mt-3">
                  <x-backend.form.input  name="name" placeholder="Name*" class="w-full"/>
              </div>
              <div class="mt-3">
                  <x-backend.form.input  name="username" placeholder="Username" class="w-full"/>
              </div>
              <div class="mt-3">
                  <x-backend.form.input  name="email" placeholder="Email*" class="w-full"/>
              </div>
              <div>
                  <x-backend.form.input type="password" name="password" class="w-full mt-3" id="password"
                                        placeholder="Password"/>
              </div>
              <div class="my-3">
                  <label>
                      <input type="checkbox" name="remember_me"> Remember Me
                  </label>
              </div>
              <x-backend.form.button>Register</x-backend.form.button>
          </form>
</div>
</div>
</x-backend>
