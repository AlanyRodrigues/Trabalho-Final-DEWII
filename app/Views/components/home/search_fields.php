<div class="mb-3">
    <label for="origem" class="form-label">Origem</label>
    <select class="form-select" id="origem" name="origem" required>
        <option value="">Selecione a origem</option>
        <?php if(isset($origens)): ?>
            <?php foreach($origens as $origem): ?>
                <option value="<?= esc($origem['origem'] ?? $origem) ?>">
                    <?= esc($origem['origem'] ?? $origem) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>

<div class="mb-3">
    <label for="destino" class="form-label">Destino</label>
    <select class="form-select" id="destino" name="destino" required>
        <option value="">Selecione o destino</option>
    </select>
</div>

<div class="mb-3">
    <label for="data_partida" class="form-label">Data da Viagem</label>
    <input type="date" id="data_partida" name="data_partida" class="form-control" required>
</div>

<div class="mb-4">
    <label for="passageiros" class="form-label">Quantidade de Passageiros</label>
    <input type="number" class="form-control" id="passageiros" name="passageiros" value="1" min="1" max="8" required>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const origemSelect = document.getElementById('origem');
    const destinoSelect = document.getElementById('destino');
    // Agora o JS acha o formBuscaVoos que colocamos no outro arquivo!
    const formBusca = document.getElementById('formBuscaVoos'); 

    // MOTOR DE DESTINOS
    origemSelect.addEventListener('change', function() {
        const origemSelecionada = this.value;

        if (!origemSelecionada) {
            destinoSelect.innerHTML = '<option value="">Selecione o destino</option>';
            return;
        }

        destinoSelect.innerHTML = '<option value="">Carregando destinos...</option>';

        fetch(`/ajax/destinos-por-origem?origem=${encodeURIComponent(origemSelecionada)}`, {
            method: 'GET',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => {
            if (!response.ok) throw new Error('Erro na rede');
            return response.json();
        })
        .then(destinos => {
            destinoSelect.innerHTML = '<option value="">Selecione o destino</option>';
            
            if (destinos.length === 0) {
                destinoSelect.innerHTML = '<option value="">Nenhum voo saindo daqui</option>';
                return;
            }

            destinos.forEach(destino => {
                const option = document.createElement('option');
                const valorDestino = destino.destino ? destino.destino : destino; 
                option.value = valorDestino;
                option.textContent = valorDestino;
                destinoSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erro no Ajax:', error);
            destinoSelect.innerHTML = '<option value="">Erro ao carregar</option>';
        });
    });

    // MOTOR DE BUSCA DE VOOS
    if (formBusca) {
        formBusca.addEventListener('submit', function(event) {
            // Isso aqui é o que impede a página de recarregar e dar o erro 404!
            event.preventDefault(); 

            const origem = origemSelect.value;
            const destino = destinoSelect.value;
            const dataPartida = document.getElementById('data_partida').value;

            const urlBusca = `/ajax/buscar-voos?origem=${encodeURIComponent(origem)}&destino=${encodeURIComponent(destino)}&data_partida=${encodeURIComponent(dataPartida)}`;

            fetch(urlBusca, {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => {
                if (!response.ok) throw new Error('Erro ao buscar os voos');
                return response.json();
            })
            .then(voosEncontrados => {
                alert(`Busca concluída com sucesso! ${voosEncontrados.length} voo(s) encontrado(s).`);
                console.log("VOOS:", voosEncontrados);
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao realizar a busca.');
            });
        });
    }
});
</script>
