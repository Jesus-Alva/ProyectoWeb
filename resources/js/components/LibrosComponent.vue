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
                                        <!--<th scope="col" class="sort" data-sort="satatus">Autor</th>-->
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
                                    <!--<td class="budget">
                                        {{ libro.id_autor }} interpolacion 
                                    </td>-->

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <button class="dropdown-item">
                                                    <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                                                    <span class="btn-inner--text">Editar</span>
                                                </button>
                                                <button class="dropdown-iten">
                                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                    <span class="btn-inner--text">Eliminar</span>
                                                </button>
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
                                    <div class="form-group">
                                        <label>ISBN del  Libro</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.isbn" placeholder="Codigo del Libro"/>
                                        <br>
                                        <label>Año de publicación</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.anio" placeholder="Año"/>
                                        <br>
                                        <label>Categoria</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.categoria" placeholder="Ej. Terror, Novela..."/>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre del  Libro</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.nombre" placeholder="Nombre del Libro"/>
                                        <br>
                                        <label>No. de Paginas</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.paginas" placeholder="Paginas"/>
                                        <br>
                                        <label>Autor del libro</label>
                                        <input type="text" class="form-control" v-model="nuevoLibro.autor" placeholder="Autor"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripcion del libro</label>
                                        <textarea type="text" class="form-control" v-model="nuevoLibro.desc" placeholder="Descripcion"/>
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
    </div>
</template>

<script>
export default {
    setup() {},
    data(){
        return{
            nuevoLibro: {},
            errores: '',
            lista_libros: {}
        }
    },
    methods: {
        fnNuevoLibro() {
            $("#modalNuevoLibro").modal("toggle");
        },

        async listar_libros(){

            await axios.get("api/libros")
                .then((respuesta) => {
                    
                    this.lista_libros = respuesta.data;
                    console.log(this.lista_libros)
                })
                .catch((error) => {
                    
                    console.log(error.response.data.errors)

                })
        },

        async guardar(){
            await axios.post("api/guardar_libro", this.nuevoLibro)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalNuevoLibro').modal('toggle');//se esconde el formulario

                    this.nuevoLibro = {};//se limpia el formulario

                    this.errores = " ";
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                    if(error.response.data != null){
                        var llaves= Object.keys(error.response.data.errors)

                        this.errores = error.response.data.errors[llaves[0]][0]
                    }else{
                        this.errores = error.response.message
                    }

                })
        }
    }
};
</script>
