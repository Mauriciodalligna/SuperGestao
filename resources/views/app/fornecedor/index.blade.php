<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>
<body>
    <h3>Fornecedores</h3>
    
    @isset($fornecedores) 

            @forelse($fornecedores as $indice => $fornecedor) 

            @dd($loop)
                iteração atual:{{ $loop-> iteration }}
                <br>
                <p><strong>Fornecedor:</strong> {{ $fornecedor['nome'] }}</p>

                <p><strong>Status:</strong> {{ $fornecedor ['status'] }}</p>
                
                
                CNPJ:({{ $fornecedor['cnpj']?? 'Dado não foi preenchido' }})

                <br>

                Telefone:({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ??'' }}
                <hr>
                @if($loop -> first)
                primeira iteração do loop
                @endif
                @if($loop->last)
                ultima interação do loop
                <br>
                Total de registros; {{ $loop->count }}
                @endif
                @empty
                não existem fornecedores
                
            @endforelse

    @endisset
         

        
</body>
</html>