<div class="p-6 text-gray-900">
    <h1 class="text-xl font-bold mb-4">Lista de Campanhas</h1>

    @foreach ($campanhas as $campanha)
        <div class="border rounded-lg p-4 mb-4 shadow-sm bg-white">
            <h2 class="text-lg font-semibold">{{ $campanha->name }}</h2>
            <p class="text-gray-700">{{ $campanha->description ?? 'Sem descrição disponível.' }}</p>
            <p class="text-sm text-gray-500">
                Criado por: {{ $campanha->owner->name ?? 'Desconhecido' }}
            </p>
            <p class="text-sm text-gray-500">
                Status: 
                <span class="{{ $campanha->active ? 'text-green-600' : 'text-red-600' }}">
                    {{ $campanha->active ? 'Ativo' : 'Inativo' }}
                </span>
            </p>
            <p class="text-sm text-gray-500">
                Termina em: 
                <strong>
                    Termina em: 
                    {{ 
                        now()->diffInDays($campanha->end_date, false) > 0 
                            ? floor(now()->diffInDays($campanha->end_date)) . ' dias' 
                            : 'Finalizada' 
                    }}
                </strong>
            </p>

            @if ($campanha->link_whatsapp_group)
                <div class="flex items-center mt-2">
                    <button 
                        onclick="navigator.clipboard.writeText('{{ $campanha->link_whatsapp_group }}')"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Copiar Link de Compartilhamento
                    </button>
                </div>
            @else
                <p class="text-sm text-gray-500 mt-2">Nenhum link de compartilhamento disponível.</p>
            @endif
        </div>
    @endforeach
</div>

<script>
    window.addEventListener('copy-to-clipboard', event => {
        navigator.clipboard.writeText(event.detail.link);
        alert('Link copiado para a área de transferência!');
    });
</script>
