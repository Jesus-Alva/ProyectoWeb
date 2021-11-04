<template>
    <div>
        <!-- Header -->
        <div class="header bg-gradient-primary pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header pb-6">
                    <div class="container-fluid">
                        <div class="header-body">
                            <div class="row align-items-center py-4">
                                <div class="col-lg-6 col-7">
                                    <h3 class="h2 text-white d-inline-block mb-0">
                                        Autores
                                    </h3>
                                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                            <li class="breadcrumb-item">
                                                <a href="#"
                                                    ><i class="fas fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Inicio</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Autores</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-lg-6 col-5 text-right">
                                    <a href="#" class="btn btn-sm btn-neutral" @click="fnNuevoAutor()" id="btnNuevoLibro">Nuevo</a>
                                    <a href="#" class="btn btn-sm btn-neutral" @click="listar_libros()" >Recargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header-->

        <!--Listado de categorias -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Ligth table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">ID</th>
                                        <th scope="col" class="sort" data-sort="budget">Nombre</th>
                                        <th scope="col" class="sort" data-sort="satatus">Codigo</th>
                                    </tr>
                                </thead>
                                
                                <tr v-for="autores in lista_autores" :key="autores.id">
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">

                                                    <td class="budget">
                                                        {{ autores.id }}
                                                    </td>

                                                </span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        {{ autores.nombre }}
                                    </td>
                                    <td class="budget">
                                        {{ autores.codigo }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <button class="dropdown-item" @click="fnEditarAutor(autores)" >
                                                    <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                    <span class="btn-inner--text" >Editar</span>
                                                </button>
                                                <button class="dropdown-iten" @click="fnMostrarModalEliminarAutor(autores)" >
                                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                    <span class="btn-inner--text">Eliminar</span>
                                                </button><br>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <!-- Ligth table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page content -->
        <!--MODAL NUEVO AUTOR -->
        <div class="modal fade" id="modalNuevoAutor" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">
                            Autor
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" class="form-control" v-model="nuevo_autor.codigo" placeholder="Codigo del autor"/>
                                        <br>
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" v-model="nuevo_autor.nombre" placeholder="Nombre del autor"/>
                                        <br>
                                    </div>
                                </div>

                                <div class="col-md-12" v-if="errores">
                                    <div class="alert alert-warning" role="alert">
                                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                        <span class="alert-inner--text"><strong>ERROR!</strong> {{ errores }}</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-primary" @click="guardarAutor()">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL NUEVO AUTOR -->
        <!--END MODAL ELIMINAR AUTOR -->
        <div>
            <div class="modal fade" id="modalEliminarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Eliminar</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <h4 class="heading mt-4">¿Realmente desea eliminar el Autor?</h4>
                                <h3>Codigo: {{ eliminar_autor.codigo }} </h3>
                                <h3>Autor: {{ eliminar_autor.nombre }} </h3> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" @click="fnEliminarAutor()">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL ELIMINAR AUTOR -->
    </div>
</template>

<script>
export default {
    setup() {},
    mounted(){
        this.listar_autores();
    },
    data(){
        return{
            lista_autores: {},
            nuevo_autor: {},
            errores: " ",
            eliminar_autor: {},
        }
    },
    methods : {
        fnNuevoAutor(){
            
            this.nuevo_autor = {}
            $('#modalNuevoAutor').modal("toggle")
        },
        async guardarAutor(){
           await axios.post("api/guardarAutor", this.nuevo_autor)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalNuevoAutor').modal('toggle');
                    this.nuevo_autor = {}
                    this.errores = " "
                    this.listar_autores()
                })
                .catch((error) => {
                    
                    console.log(error.response.data)

                    if(error.response.data != null){
                        var llaves= Object.keys(error.response.data)

                        this.errores = error.response.data.errors[llaves[0]][0]
                    }else{
                        this.errores = error.response
                    }

                })
        },
        async listar_autores(){
            await axios.get("api/autores")
            .then((respuesta) => {
                this.lista_autores = respuesta.data
                console.log(this.lista_autores)
            })
            .catch((error) => {
                    
                console.log(error.response.data)

            })
        },
        fnEditarAutor(autores){
            this.nuevo_autor = autores
            this.listar_autores()
            $('#modalNuevoAutor ').modal('toggle');
        },
        fnMostrarModalEliminarAutor(autores){
            this.eliminar_autor = autores
            $('#modalEliminarCat').modal('toggle')
        },
        async fnEliminarAutor(){
            await axios.post("api/eliminarAutor", this.eliminar_autor)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalEliminarCat').modal('toggle');//se esconde el formulario
                    this.eliminar_autor = {}//se limpia el formulario
                    this.listar_autores()
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                })
        },
        
    }
    
}
</script>