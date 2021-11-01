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
                                    <h6 class="h2 text-white d-inline-block mb-0">
                                        Libros
                                    </h6>
                                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                            <li class="breadcrumb-item">
                                                <a href="#"
                                                    ><i class="fas fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Inicio</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Libros</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-lg-6 col-5 text-right">
                                    <a href="#" class="btn btn-sm btn-neutral" @click="fnNuevoLibro()" id="btnNuevoLibro">Nuevo</a>
                                    <a href="#" class="btn btn-sm btn-neutral" @click="listar_libros()" >Recargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header-->
    <br>
        <!-- Page content -->
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
                                        <th scope="col" class="sort" data-sort="budget">ISBN</th>
                                        <th scope="col" class="sort" data-sort="satatus">Año</th>
                                        <th scope="col" class="sort" data-sort="satatus">Paginas</th>
                                        <th scope="col" class="sort" data-sort="satatus">Nombre</th>
                                        <th scope="col" class="sort" data-sort="satatus">Descripcion</th>
                                        <th scope="col" class="sort" data-sort="satatus">Categoria</th>
                                        <th scope="col" class="sort" data-sort="satatus">Autor</th>
                                    </tr>
                                </thead>

                                <tr v-for="libro in lista_libros" :key="libro.id">
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">

                                                    <td class="budget">
                                                        {{ libro.id }}
                                                    </td>

                                                </span>
                                            </div>
                                        </div>
                                    </th>

                                    
                                    <td class="budget">
                                        {{ libro.isbn }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.anio }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.no_paginas }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.nombre }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.descripcion }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.nombre_cat }}
                                    </td>
                                    <td class="budget">
                                        {{ libro.nombre_autor }} <!-- interpolacion --> 
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                
                                                <button class="dropdown-item" @click="fnEditarLibro(libro)">
                                                    <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                                                    <span class="btn-inner--text" >Detalles</span>
                                                </button>
                                                <button class="dropdown-item" @click="fnEditarLibro(libro)">
                                                    <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                    <span class="btn-inner--text" >Editar</span>
                                                </button>
                                                <button class="dropdown-iten" @click="fnMostrarModalEliminarLibro(libro)" >
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

        <!-- Modal -->
        <div class="modal fade" id="modalNuevoLibro" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Libro
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <img :src="'/storage/' + nuevoLibro.imagen_libro" width="120px">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" @change="obtenerImagen">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN del  Libro</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.isbn" placeholder="Codigo del Libro"/>
                                        <br>
                                        <label>Año de publicación</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.anio" placeholder="Año"/>
                                        <br>
                                        <label>Categoria</label>
                                        <select class="form-control" v-model="nuevoLibro.id_categoria" id="cbxcategorias">
                                            <option class="form-control" v-for="categoria in lista_categorias" :key="categoria.id" v-bind:value="categoria.nombre">
                                                {{ categoria.nombre }}
                                            </option>
                                            <!--<option value="0">Nuevo autor</option>-->
                                        </select>
                                        <input type="text" class="form-control" placeholder="Nombre del autor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre del  Libro</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.nombre" placeholder="Nombre del Libro"/>
                                        <br>
                                        <label>No. de Paginas</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.no_paginas" placeholder="Paginas"/>
                                        <br>

                                        <label>Autor del libro</label>
                                        <select class="form-control" v-model="nuevoLibro.id_autor">
                                            <option class="form-control" v-for="autor in lista_autores" :key="autor.id" v-bind:value="autor.id">
                                                {{ autor.nombre }}
                                            </option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripcion del libro</label>
                                        <textarea type="text" class="form-control" v-model="nuevoLibro.descripcion" placeholder="Descripcion"/>
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
                        <button type="button" class="btn btn-primary" @click="guardar()">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL -->
        <!--Modal Eliminar libro-->
        <div class="col-md-4">
            <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
        	
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Eliminar</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
            
                        <div class="modal-body">
            	
                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <h4 class="heading mt-4">¿Realmente desea eliminar el libro?</h4>
                                <p>Nombre: {{ libro_eliminar.nombre }}</p>
                                <center><img :src="'/storage/' + libro_eliminar.imagen_libro" width="120px"></center>
                                <p>ISBN: {{ libro_eliminar.isbn }}</p> 
                            </div>
                
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-whit" @click="fnEliminarLibro()">Eliminar</button>
                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancelar</button> 
                        </div>
            
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    setup() {},
    mounted(){
        this.listar_libros()
    },
    data(){
        return{
            nuevoLibro: {},
            errores: '',
            lista_libros: {},
            lista_categorias: {},
            lista_autores: {},
            lista_eliminar: {},
            libro_eliminar: {},
            imagen_libro: '',
        }
    },
    methods: {
        obtenerImagen(e){
            this.imagen_libro = e.target.files[0];
        },

        fnNuevoLibro() {
            this.nuevoLibro = {};
            this.imagen_libro = '';
            this.listar_categorias();
            this.listar_autores();
            $("#modalNuevoLibro").modal("toggle");
        },
        async listar_libros(){

            await axios.get("api/libros")
                .then((respuesta) => {
                    
                    this.lista_libros = respuesta.data;
                    console.log(this.lista_libros)
                })
                .catch((error) => {
                    
                    console.log(error.response.data)

                })
        },
        async listar_categorias(){

            await axios.get("api/categorias")
                .then((respuesta) => {
                    console.log(respuesta.data.message)
                    this.lista_categorias = respuesta.data
                })
                .catch((error) => {
                    
                    console.log(error.response.data)

                })
        },
        async listar_autores(){

            await axios.get("api/autores")
                .then((respuesta) => {
                    console.log(respuesta.data.message)
                    this.lista_autores = respuesta.data
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                })
        },

        async guardar(){

            const datos_libro = new FormData

            datos_libro.set('id', this.nuevoLibro.id);
            datos_libro.set('anio', this.nuevoLibro.anio);
            datos_libro.set('isbn', this.nuevoLibro.isbn);
            datos_libro.set('no_paginas', this.nuevoLibro.no_paginas);
            datos_libro.set('nombre', this.nuevoLibro.nombre);
            datos_libro.set('descripcion', this.nuevoLibro.descripcion);
            datos_libro.set('id_categoria', this.nuevoLibro.id_categoria);
            datos_libro.set('imagen_libro', this.imagen_libro);

            await axios.post("api/guardar_libro", datos_libro)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalNuevoLibro').modal('toggle');//se esconde el formulario
                    this.nuevoLibro = {}//se limpia el formulario
                    this.errores = " "
                    this.listar_libros()
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                    if(error.response.data != null){
                        var llaves= Object.keys(error.response.data)

                        this.errores = error.response.data.errors[llaves[0]][0]
                    }else{
                        this.errores = error.response.message
                    }

                })
        },
        fnEditarLibro(libro){
            this.nuevoLibro = libro
            this.listar_categorias()
            $("#modalNuevoLibro").modal("toggle")
        },
        fnMostrarModalEliminarLibro(libro){
            this.libro_eliminar = libro
            $("#modal-eliminar").modal("toggle")
        },
        async fnEliminarLibro(libro){
            await axios.post("api/eliminar_libro", this.libro_eliminar)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modal-eliminar').modal('toggle');//se esconde el formulario
                    this.libro_eliminar = {}//se limpia el formulario
                    this.listar_libros()
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                })
        },

        fnObtenerValor(){
            let cbxcategorias = document.getElementById('cbxcategorias').value;
            console.log(cbxcategorias);
            if(cbxcategorias == 0){
                console.log('Se muestra un nuevo mimput');
            }else{

            }
        }
    }
};
</script>
