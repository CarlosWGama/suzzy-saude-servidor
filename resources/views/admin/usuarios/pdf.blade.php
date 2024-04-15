<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contato - {{$usuario->id}}</title>
    <style>
        .secao {
            text-align: center;
            font-size: 20px
        }
        .principal {
            text-align: center;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <h1 class="principal">Usuário (Cod. {{$usuario->id}})</h1>
    
    <h2 class="secao">Dados do usuário</h2>
    
    <p><b>Nome:</b> {{$usuario->nome}}</p>
    <p><b>E-mail:</b> {{$usuario->email}}</p>
    @if($usuario->extras)
        <p><b>Telefone:</b> {{$usuario->extras->telefone}}</p>
        <p><b>CPF:</b> {{$usuario->extras->cpf}}</p>
        <p><b>Data de Nascimento:</b> {{$usuario->extras->data_nascimento}}</p>
        <p><b>Gênero:</b> {{$usuario->extras->genero_descricao}}</p>
        <p><b>Escolaridade:</b> {{$usuario->extras->escolaridade}}</p>
        <p><b>Zona Residêncial:</b> {{$usuario->extras->zona_residencial_descricao}}</p>
        <p><b>Estado Cívil:</b> {{$usuario->extras->estado_civil_descricao}}</p>
        <p><b>Orientação Sexual:</b> {{$usuario->extras->orientacao_sexual_descricao}}</p>
        <p><b>Possui problema mental?</b> 
            @if($usuario->problema_mental) Sim ({{$usuario->problema_mental_quais}})
            @else Não @endif
        </p>
        <p><b>Usa medicamento?</b> 
            @if($usuario->uso_medicamento) Sim ({{$usuario->uso_medicamento_quais}})
            @else Não @endif
        </p>
    @endif
    

    <!-- DADOS DOS CONTATOS -->
    @if(count($usuario->contatos))
        <h2 class="secao">Contatos de Confiança</h2>

        <ul>
            @foreach($usuario->contatos as $contato)
            <li><b>{{$contato->nome}} ({{$contato->relacionamento_descricao}})</b> {{$contato->telefone}}</li>
            @endforeach
        </ul>
    @endif

     <!-- ALERTAS -->
     @if(count($usuario->alertas))
     <h2 class="secao">Alertas para possíveis tentativas</h2>

     <ul>
        <li><b>Dia da ocorrência:</b></li>
         @foreach($usuario->alertas as $alerta)
         <li>{{$alerta->data_ocorrencia}}</li>
         @endforeach
        </ul>
    @endif

      <!-- ALERTAS -->
      @if(count($usuario->alertas))
      <h2 class="secao">Alertas para possíveis tentativas</h2>
 
      <ul>
         <li><b>Dia da ocorrência:</b></li>
          @foreach($usuario->alertas as $alerta)
          <li>{{$alerta->data_ocorrencia}}</li>
          @endforeach
      </ul>
      @endif
      
    <!-- QUESTIONARIO DIARIO -->
    @if(count($usuario->questionarios))
    <h2 class="secao">Questionario Diário</h2>
    
    <Table border='1'>
        <thead>
            <th>Dia</th>
            <th>Tristeza</th>
            <th>Choro</th>
            <th>Medo</th>
            <th>Desconcentração</th>
            <th>Naúseas</th>
            <th>Insônia</th>
            <th>Higiene</th>
            <th>Isolamento</th>
        </thead>

        @foreach($usuario->questionarios as $questionario)
        <tr>
            <td>{{date('d/m/Y', strtotime($questionario->dia))}}</td>
            <td>{{$questionario->tristeza_descricao}}</td>
            <td>{{$questionario->choro_descricao}}</td>
            <td>{{$questionario->medo_descricao}}</td>
            <td>{{$questionario->desconcentracao_descricao}}</td>
            <td>{{$questionario->nauseas_descricao}}</td>
            <td>{{$questionario->insonia_descricao}}</td>
            <td>{{$questionario->higiene_descricao}}</td>
            <td>{{$questionario->isolamento_descricao}}</td>
        </tr>
        @endforeach
          
    </Table>
    @endif


</body>
</html>