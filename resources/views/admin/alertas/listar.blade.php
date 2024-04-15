@extends('admin.template')

@section('titulo', 'Lista de Alertas para possível suicídio')


@push('css')
    <style>
        .form-busca {
            padding: 20px;
            flex-direction: row;
            display: flex;  
            height: 75px;
        }
        .input-group {
            max-width: 400px;
        }
    </style>
@endpush

@section('conteudo')

<div class="card">
    <div class="card-header">
        <h5>Alertas realizados</h5>
    </div>


    <form action="{{route('admin.alertas.listar')}}">
        <div style="padding: 10px">
            <!-- BUSCAR -->
            <div style="">
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="-1" name="visualizado" id="visualizado-todos" @if ($filtro== -1)checked @endif>
                    <label class="form-check-label" for="visualizado-todos">Todos </label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" value="1" name="visualizado" id="visualizado-atendidos" @if ($filtro== 1)checked @endif>
                    <label class="form-check-label" for="visualizado-atendidos">Atendidos </label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" value="0" name="visualizado" id="visualizado-nao-atendidos" @if ($filtro== 0)checked @endif>
                    <label class="form-check-label" for="visualizado-nao-atendidos">Não atendidos </label>
                </div>

                
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-search"></i>Buscar
                </button>
            </div>
        </div>
    </form>

    <div class="card-block table-border-style">
        <div class="table-responsive">
                @if(session('sucesso'))
                <div class="alert alert-success" role="alert" style="margin:0px 10px">
                    {{session('sucesso')}}
                </div>
                @endif
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td style="width:50%">Nome</td>
                        <td>Data</td>
                        <td>Atendido</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alertas as $alerta)
                    <tr>
                        <!-- ID -->
                        <td><h6>{{$alerta->id}}</h6></td>
                        <!-- NOME -->
                        <td>
                            <div class="table-data__info">
                                <h6>{{$alerta->usuario->nome}}</h6>
                                <span>
                                    <a href="#">{{$alerta->usuario->email}}</a> |
                                    <a href="#">{{$alerta->usuario->extras->telefone}}</a>
                                </span>
                            </div>
                        </td>
                        <!-- DATA -->
                        <td><h6>{{$alerta->data_ocorrencia}}</h6></td>
                        <!-- ATENDIDO -->
                        <td><h6>
                            @if ($alerta->visualizado)
                                <p class="alert alert-success text-center">SIM</p>
                            @else 
                                <p class="alert alert-danger text-center">NÃO</p>
                                
                            @endif
                        </h6></td>
                        <!-- OPÇÕES -->   
                        <td>
                            <a href="{{route('admin.alertas.atendimento', ['id' => $alerta->id, 'atendido' => (int)!$alerta->visualizado])}}" title="Visualizado" class="btn btn-sm btn-success">
                               <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('admin.usuarios.download', ['id' => $alerta->usuario->id])}}" target="_blank" title="Download" class="btn btn-sm btn-info">
                                <i class="fa fa-download"></i>
                             </a>
                            <span class="btn btn-sm btn-danger remover-modal" title="Excluir" data-toggle="modal" data-target="#smallmodal" data-id="{{$alerta->id}}"><i class="fa fa-trash"></i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Paginação -->
            <div style="padding:10px">{{$alertas->links()}}</div>
    
        </div>
    </div>
    
</div>


    @push('javascript')
  <!-- modal small -->
  <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Remover Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                       Deseja Realmente excluir esse conteúdo?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-deletar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal small -->

    <script>
        let conteudoID;
        $('.remover-modal').click(function() {
            conteudoID = $(this).data('id');
        })

        $('.btn-deletar').click(() => window.location.href="{{route('admin.alertas.excluir')}}/"+conteudoID);
    </script>
@endpush
@endsection