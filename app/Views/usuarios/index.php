<?php
$clientes = $clientes ?? [];
$estados = $estados ?? [];
$isEdit = isset($cliente) && !empty($cliente);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        const appConfig = {
            baseUrl: "<?= base_url() ?>",
            oldCidadeId: "<?= old('cidade_id', $cliente['cidade_id'] ?? '') ?>"
        };
    </script>
</head>

<body class="bg-light pb-5">

<div class="container mt-5">
    
    <?php if(session()->has('sucesso')): ?>
        <div class="alert alert-success">
            <?= session('sucesso') ?>
        </div>
    <?php endif; ?>
    
    <?php if(session()->has('erros')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
            <?php foreach(session('erros') as $erro): ?><li><?= esc($erro) ?></li><?php endforeach ?>
            </ul>
        </div>
    <?php endif;?>

    <div class="card shadow-sm mb-5">
        <div class="card-header <?= $isEdit ? 'bg-warning text-dark' : 'bg-primary text-white' ?>">
            <h4 class="mb-0"><?= $isEdit ? 'Alteração de Cliente' : 'Cadastro de Cliente' ?></h4>
        </div>
        <div class="card-body">
            
            <form action="<?= $isEdit ? base_url('/clientes/update/'.$cliente['codigo']) : base_url('/clientes/cadastro') ?>" method="post" id="formCliente" novalidate>                
                <?= csrf_field() ?> 
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= old('nome', $cliente['nome'] ?? '') ?>" required>
                    <div class="invalid-feedback">O nome é obrigatório (mín. 3 caracteres).</div>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= old('cpf', $cliente['cpf'] ?? '') ?>" required placeholder="Apenas números">
                    <div class="invalid-feedback">O CPF é obrigatório (mín. 11 dígitos).</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado_id" required>
                            <option value="">Selecione um estado.</option>
                            <?php foreach($estados as $estado): ?>
                                <option value="<?= $estado['id'] ?>" <?= old('estado_id', $cliente['estado_id'] ?? '') == $estado['id'] ? 'selected' : '' ?>>
                                    <?= $estado['nome'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="municipio" class="form-label">Cidade</label>
                        <select class="form-select" id="municipio" name="cidade_id" required disabled>
                            <option value="">Selecione primeiro o estado</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn <?= $isEdit ? 'btn-warning text-dark fw-bold' : 'btn-success' ?> mt-3">
                    <?= $isEdit ? 'Salvar Alterações' : 'Salvar' ?>
                </button>

                <?php if($isEdit): ?>
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Opções do Sistema (Consulta / Alteração / Exclusão)</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Código</th>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>Localização</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($clientes)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Nenhum cliente listado no sistema.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($clientes as $c): ?>
                                <tr>
                                    <td><?= esc($c['codigo']) ?></td>
                                    <td class="fw-bold"><?= esc($c['nome']) ?></td>
                                    <td><?= esc($c['cpf']) ?></td>
                                    <td><?= esc($c['cidade_nome'] ?? 'Não informada') ?> / <?= esc($c['estado_nome'] ?? '') ?></td>
                                    <td class="text-center">
                                       <a href="<?= site_url('clientes/edit/' . $c['codigo']) ?>" class="btn btn-primary btn-sm me-1">Editar</a>
                                        
                                        <form action="<?= base_url('/clientes/delete/' . $c['codigo']) ?>" method="post" class="d-inline" onsubmit="return confirm('Tem certeza que deseja remover o cliente <?= esc($c['nome']) ?>?');">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

    <!-- implementação de carregamento -->
<div class="modal fade" id="loadingModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center py-5">

                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Carregando...</span>
                </div>

                <h5>Carregando municípios...</h5>

                <p class="text-muted mb-0">
                    Aguarde enquanto buscamos as cidades do estado selecionado.
                </p>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const loadingModal = new bootstrap.Modal(
    document.getElementById('loadingModal')
    );
document.getElementById('estado').addEventListener('change', function() {
    const idEstado = this.value;
    const selectMunicipio = document.getElementById('municipio');

    if (!idEstado) {
        selectMunicipio.innerHTML = '<option value="">Selecione primeiro o estado</option>';
        selectMunicipio.disabled = true;
        return;
    }

    // carregamento
    loadingModal.show();

    document.getElementById('estado').disabled = true;
    document.getElementById('municipio').disabled = true;
    document.getElementById('nome').disabled = true;
    document.getElementById('cpf').disabled = true;

    fetch(`${appConfig.baseUrl}/municipios/estado/${idEstado}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Erro na resposta do servidor');
        return response.json();
    })
    .then(resultado => {
        selectMunicipio.innerHTML = '<option value="">Selecione uma Cidade</option>';
        
        let cidades = [];
        if (resultado && Array.isArray(resultado)) {
            cidades = resultado;
        } else if (resultado && resultado.data && Array.isArray(resultado.data)) {
            cidades = resultado.data;
        } else if (resultado && resultado.estados && Array.isArray(resultado.estados)) {
            cidades = resultado.estados;
        }

        if (cidades.length === 0) {
            throw new Error('Nenhuma cidade encontrada.');
        }

        cidades.forEach(cidade => {
            const option = document.createElement('option');
            option.value = city_id = cidade.id;
            option.text = cidade.nome;
            selectMunicipio.appendChild(option);
        });

        selectMunicipio.disabled = false;

        // liberar tela
        document.getElementById('estado').disabled = false;
        document.getElementById('nome').disabled = false;
        document.getElementById('cpf').disabled = false;

        loadingModal.hide();
    })
    .catch(error => {
        console.error('Erro detalhado no AJAX:', error);

        document.getElementById('estado').disabled = false;
        document.getElementById('nome').disabled = false;
        document.getElementById('cpf').disabled = false;

        loadingModal.hide();

        selectMunicipio.disabled = true;
        selectMunicipio.innerHTML = '<option value="">Erro ao carregar cidades</option>';
    });
});

(() => {
  'use strict'

  const form = document.getElementById('formCliente');
  const nomeInput = document.getElementById('nome');
  const cpfInput = document.getElementById('cpf');

  form.addEventListener('submit', event => {
    let formularioValido = true;

    if (nomeInput.value.trim().length < 3) {
        nomeInput.classList.add('is-invalid');
        nomeInput.classList.remove('is-valid');
        formularioValido = false;
    } else {
        nomeInput.classList.remove('is-invalid');
        nomeInput.classList.add('is-valid');
    }

    const cpfLimpo = cpfInput.value.replace(/\D/g, ''); 
    if (cpfLimpo.length < 11) {
        cpfInput.classList.add('is-invalid');
        cpfInput.classList.remove('is-valid');
        formularioValido = false;
    } else {
        cpfInput.classList.remove('is-invalid');
        cpfInput.classList.add('is-valid');
    }

    if (!formularioValido) {
      event.preventDefault();
      event.stopPropagation();
    }
  }, false);

  nomeInput.addEventListener('input', function() {
      if (this.value.trim().length >= 3) {
          this.classList.remove('is-invalid');
          this.classList.add('is-valid');
      }
  });
  
  cpfInput.addEventListener('input', function() {
      const limpo = this.value.replace(/\D/g, '');
      if (limpo.length >= 11) {
          this.classList.remove('is-invalid');
          this.classList.add('is-valid');
      }
  });
})();

// força a atualização do campo cidade ao carregar se houver estado selecionado
if (document.getElementById('estado').value !== "") {
    document.getElementById('estado').dispatchEvent(new Event('change'));
    
    setTimeout(() => {
        if(appConfig.oldCidadeId) {
            document.getElementById('municipio').value = appConfig.oldCidadeId;
        }
    }, 400);
}
</script>

</body>
</html>