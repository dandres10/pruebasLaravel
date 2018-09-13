{!! csrf_field() !!}
@if ( $showFields)
<label for="nombre">
    Nombre
    <input class="form-control" name="nombre" type="text" value="{{  $message->nombre or    old('nombre')}}">
        {!!$errors->first('nombre','
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
            <input class="form-control" name="email" type="text" value="{{  $message->email or  old('email')}}">
                {!!$errors->first('email','
                <span class="error">
                    :message
                </span>
                ')!!}
            </input>
        </label>
        <br>
            <br>
                @endif
                <label for="mensaje">
                    Mensaje
                    <textarea class="form-control" name="mensaje">
                            {{ $message->mensaje or    old('mensaje')}}
                    </textarea>
                    {!!$errors->first('mensaje','
                    <span class="error">
                        :message
                    </span>
                    ')!!}
                </label>
                <br>
                    <br>
                        

                        <input class="btn btn-primary" type="submit" value="{{  $btnText or 'Guardar' }}">
                        <br>
                            <br>
                            </br>
                        </br>
                    </br>
                </br>
            </br>
        </br>
    </br>
</br>