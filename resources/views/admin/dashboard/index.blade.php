@extends('admin.template')


@section('titulo', 'Dashboard')
@section('subtitulo', 'Conteúdos Cadastrados')

@section('conteudo')

                <div class="row">

                    {{-- DASHBOARD --}}
                    <div class="col-xl-4 col-md-12">
                        <h6>Geral</h6>
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    {{-- USUARIOS --}}
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-user text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>{{$usuarios}}</h5>
                                                <p class="text-muted m-b-0">Usuários</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- NOTICIAS --}}
                                    <div class="col-sm-6 p-b-20 p-t-20 r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-comments text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>{{$ajudaNaoAtendidos}}</h5>
                                                <p class="text-muted m-b-0">Pedidos ajuda não atendidos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    {{-- FALE CONOSCO --}}
                                    <div class="col-sm-12 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-comments text-c-yellow f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>{{$ajudaTotal}}</h5>
                                                <p class="text-muted m-b-0">Pedidos de Ajuda total</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection