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
                                        Categorias
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
                                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-lg-6 col-5 text-right">
                                    <a href="#" class="btn btn-sm btn-neutral" @click="nuevaCategoria()" id="btnNuevoLibro">Nuevo</a>
                                    <a href="#" class="btn btn-sm btn-neutral" @click="listar_categorias()" >Recargar</a>
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
                                        <th scope="col" class="sort" data-sort="name"></th>
                                        <th scope="col" class="sort" data-sort="name">ID</th>
                                        <th scope="col" class="sort" data-sort="budget">Codigo</th>
                                        <th scope="col" class="sort" data-sort="satatus">Nombre</th>
                                        <th scope="col" class="sort" data-sort="satatus">Descripción</th>
                                    </tr>
                                </thead>
                                
                                <tr v-for="categoria in lista_categorias" :key="categoria.id">
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                
                                                <button class="dropdown-item" @click="fnEditarCategoria(categoria)" >
                                                    <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                    <span class="btn-inner--text" >Editar</span>
                                                </button>
                                                <button class="dropdown-iten" @click="fnMostrarModalEliminarCat(categoria)" >
                                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                    <span class="btn-inner--text">Eliminar</span>
                                                </button><br>
                                            </div>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">

                                                    <td class="budget">
                                                        {{ categoria.id }}
                                                    </td>

                                                </span>
                                            </div>
                                        </div>
                                    </th>

                                    
                                    <td class="budget">
                                        {{ categoria.codigo }}
                                    </td>
                                    <td class="budget">
                                        {{ categoria.nombre }}
                                    </td>
                                    <td class="budget">
                                        {{ categoria.descripcion }}
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
        <!-- MODAL NUEVA CATEGORIA -->
        <div class="modal fade" id="modalNuevaCat" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">
                            Libro
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
                                        <input type="text" class="form-control" v-model="nueva_categoria.codigo" placeholder="Codigo de la categoria"/>
                                        <br>
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" v-model="nueva_categoria.nombre" placeholder="Genero Literario"/>
                                        <br>
                                        <label>Descripcion del genero literario</label>
                                        <textarea type="text" class="form-control" v-model="nueva_categoria.descripcion" placeholder="Descripcion"/>
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

        <!--MODAL PARA ELIMINAR CAEGORIA -->
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
                            <h4 class="heading mt-4">¿Realmente desea eliminar este genero?</h4>
                            <h3>Codigo: {{ eliminar_categoria.codigo }} </h3>
                            <h3>Genero: {{ eliminar_categoria.nombre }} </h3> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" @click="fnEliminarcategoria()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END MODAL PARA ELIMINAR CAEGORIA -->
</div>
    
</template>

<script>

export default {
    setup() {
        
    },
    mounted(){
        
        this.listar_categorias();
    },
    data(){
        return {
            nueva_categoria : {},
            lista_categorias : {},
            eliminar_categoria : {},
            errores: '',
        }
    },
    methods : {
        async listar_categorias(){
            await axios.get("api/categorias")
                .then((respuesta) => {
                    
                    this.lista_categorias = respuesta.data;
                    console.log(this.lista_categorias)
                })
                .catch((error) => {
                    
                    console.log(error.response.data)

                })
        },
        nuevaCategoria(){
            this.nueva_categoria = {}
            //this.listar_categorias();
            $('#modalNuevaCat').modal("toggle")
        },
        async guardar(){
           await axios.post("api/guardarCategoria", this.nueva_categoria)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalNuevaCat').modal('toggle');
                    this.nueva_categoria = {}
                    this.errores = " "
                    this.listar_categorias()
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
        fnMostrarModalEliminarCat(categoria){
            this.eliminar_categoria = categoria
            $('#modalEliminarCat').modal('toggle')
        },
        async fnEliminarcategoria(){
            await axios.post("api/eliminarCategoria", this.eliminar_categoria)
                .then((respuesta) => {
                    console.log(respuesta)
                    $('#modalEliminarCat').modal('toggle');//se esconde el formulario
                    this.eliminar_categoria = {}//se limpia el formulario
                    this.listar_categorias()
                })
                .catch((error) => {
                    
                    console.log(error.response.data.message)

                })
        },
        fnEditarCategoria(categoria){
            this.nueva_categoria = categoria
            this.listar_categorias()
            $('#modalNuevaCat ').modal('toggle');
        }
    }
}
</script>
