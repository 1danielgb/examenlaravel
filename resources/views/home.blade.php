@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                
                    <table>
                        <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th> RFC </th>
                                </tr>
                        </thead>    
                            <tbody @v-for="show in show ">
                                      <tr name="dato" for="testshow@{{$index}}">
                                        <td for="test@{{$index}}"> @{{show.name}}</td>
                                        <td>@{{ $data.show.address }}</td>
                                        <td>@{{ $data.show.rfc }}</td>
                                        <td><button v-on:click.prevent="removeZona(zona)" class="fa fa-trash"></button></td>
                                      </tr>
                            </tbody>       
                    </table> 
                </div>
            </div>

            <pre>
                @{{ $data | json }}
            </pre>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        //VUE JS
       //Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
        new Vue({
            
            el: '#app', //ambiente de trabajo de Vue...aquí podemos definir, clases..Este es un atributo
            data:{
                nombre:'Juan',
                dato:'',
                show: []
            },
            //métodos
            ready: function(){
                //alert("Hola Mundo");
                //this.mostrar();

            },
            methods: {
                
                mostrar: function(){
                    //alert('Buenas tardes'+ this.nombre);
                    this.$http.get('/admin/datos/show').then(function(response){
                    this.$set('show', response.data);
                    
                    });
                    
                    //console.log(_evt);
                },
            },
        }); //creamos un objeto para utilizar todo lo de vue
    </script>
@stop   