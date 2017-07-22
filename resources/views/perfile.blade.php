@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar datos</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/datosC">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control" name="address" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rfc" class="col-md-4 control-label">RFC</label>

                            <div class="col-md-6">
                                <input id="rfc" type="rfc" class="form-control" name="rfc" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" v-on:click="mostrar({{ Auth::user()->id }})">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="app" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Datos  </div>
                <div class="panel-body">
                    <table>
                                     <thead>
                                          <tr>
                                              <th>Name</th>
                                              <th>Address</th>
                                              <th> RFC </th>
                                          </tr>
                                    </thead>    
                                    <tbody v-for="dato in show ">
                                      <tr name="dato" for="testdatp@{{$index}}">
                                        <td>@{{ dato.name }}</td>
                                        <td>@{{ dato.address }}</td>
                                        <td>@{{ dato.rfc }}</td>
                                        <td><button v-on:click.prevent="removeZona(zona)" class="fa fa-trash"></button></td>
                                      </tr>
                                    </tbody>
                                </table>   
                </div>
            </div>    
        </div>
    </div>
</div>        
</div>
@endsection
@section('scripts')
    <script>
        //VUE JS
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        new Vue({
            el: "body", //ambiente de trabajo de Vue...aquí podemos definir, clases..Este es un atributo
            data:{
                show:[];
            },
            //métodos
            ready: function(){
                //alert("Hola Mundo");
                this.mostrar();

            },
            methods: {
                
                mostrar: function(id){
                    this.$http.get('/custumers/datos/show', {id:user_id}).then(function(response){
                        this.$set('show', response.data);
                    });
                },
            },
        }); //creamos un objeto para utilizar todo lo de vue
    </script>
@endsection    