<template>
    <div>
        <!-- Header -->
        <div class="header bg-gradient-primary pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header pb-3">
                    <div class="container-fluid">
                        <div class="header-body">
                            <div class="row align-items-center py-4">
                                <div class="col-lg-6 col-7">
                                    <h6
                                        class="h2 text-white d-inline-block mb-0">
                                        Libros
                                    </h6>
                                    <nav
                                        aria-label="breadcrumb"
                                        class="d-none d-md-inline-block ml-md-4"
                                    >
                                        <ol
                                            class="breadcrumb breadcrumb-links breadcrumb-dark"
                                        >
                                            <li class="breadcrumb-item">
                                                <a href="#"
                                                    ><i class="fas fa-home"></i
                                                ></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Inicio</a>
                                            </li>
                                            <li
                                                class="breadcrumb-item active"
                                                aria-current="page"
                                            >
                                                Libros
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-lg-6 col-5 text-right">
                                    <a
                                        href="#"
                                        class="btn btn-sm btn-neutral"
                                        @click="fnNuevoLibro()"
                                        id="btnNuevoLibro"
                                        >Nuevo</a
                                    >
                                    <a href="#" class="btn btn-sm btn-neutral"
                                        >Recargar</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header-->

        <!-- Modal -->
        <div class="modal fade" id="modalNuevoLibro" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Libro
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{nuevoLibro.codigoLibro}}<br>
                        {{nuevoLibro.nombreLibro}}<br>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="nuevoLibro.codigoLibro" placeholder="Codigo del Libro"/>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="nuevoLibro.nombreLibro" placeholder="Nombre del Libro"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">
                            Save changes
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
            nuevoLibro: [],
        }
    },
    methods: {
        fnNuevoLibro() {
            $("#modalNuevoLibro").modal("toggle");
        }
    }
};
</script>
