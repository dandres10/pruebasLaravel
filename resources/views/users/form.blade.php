{!! csrf_field() !!}
<label for="nombre">
    Nombre
    <input class="form-control" name="name" type="text" value="{{$user->name or old('name')}}">
        {!!$errors->first('name','
        <span class="error">
            :message
        </span>
        ')!!}
    </input>
</label>
<br>
    <br>
        <label for="email">
            Email
            <input class="form-control" name="email" type="text" value="{{$user->email or old('email')}}">
                {!!$errors->first('email','
                <span class="error">
                    :message
                </span>
                ')!!}
            </input>
        </label>
        <br><br>

        @unless($user->id)
        <label for="password">
            Password
            <input class="form-control" name="password" type="password">
                {!!$errors->first('password','
                <span class="error">
                    :message
                </span>
                ')!!}
            </input>
        </label>
        <br><br>
        <label for="password_confirmation">
            Password Confirm
            <input class="form-control" type="password" name="password_confirmation" value={{ old('password') }}>
                {!!$errors->first('password_confirmation','
                <span class="error">
                    :message
                </span>
                ')!!}
            </input>
        </label>
        @endunless
                   
        <br>
            <br>
                <div class="checkbox">
                    @foreach ($roles as $id => $name)
                    <label>
                        <input  name="roles[]" type="checkbox" value="{{ $id }}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
                                {{ $name }}
                        </input>

                    </label>
                    @endforeach
                    {!!$errors->first('roles','
                <span class="error">
                    :message
                </span>
                ')!!}
                <hr>
                </div>
            </br>
        </br>
    </br>
</br>