
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold text-primary" href="<?= base_url('/') ?>">
            PrimeVoos
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Início</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Promoções</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="btn btn-primary" href="<?= base_url('/login') ?>">
                        Entrar
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>


<section class="hero">

<div class="container">

<div class="row">

<div class="col-lg-6">

<h1 class="display-4 fw-bold">

Encontre a passagem perfeita

</h1>

<p class="lead">

Pesquise voos nacionais e internacionais em poucos segundos.

</p>

</div>


<div class="col-lg-6">

<div class="card card-busca">

<div class="card-body p-4">

<h3 class="mb-4">

Buscar Passagens

</h3>

<div class="mb-3">

<label>País de origem</label>

<select class="form-select">

<option>Brasil</option>

<option>Estados Unidos</option>

<option>Argentina</option>

</select>

</div>


<section class="container py-5">

<h2 class="mb-4">

Destinos em destaque

</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<img src="..." class="card-img-top">

<div class="card-body">

<h5>Paris</h5>

<p>A partir de R$ 2.890</p>

</div>

</div>

</div>

</div>

</section>


<div class="mb-3">

<label>Cidade de origem</label>

<select class="form-select">

<option>Selecione...</option>

</select>

</div>


<div class="mb-3">

<label>País de destino</label>

<select class="form-select">

<option>Brasil</option>

<option>Canadá</option>

<option>Portugal</option>

</select>

</div>


<div class="mb-3">

<label>Cidade de destino</label>

<select class="form-select">

<option>Selecione...</option>

</select>

</div>


<div class="row">

<div class="col">

<label>Ida</label>

<input type="date" class="form-control">

</div>

<div class="col">

<label>Volta</label>

<input type="date" class="form-control">

</div>

</div>

<div class="mt-3">

<label>Classe</label>

<select class="form-select">

<option>Econômica</option>

<option>Executiva</option>

<option>Primeira Classe</option>

</select>

</div>


<div class="mt-3">

<label>Assento</label>

<select class="form-select">

<option>Janela</option>

<option>Corredor</option>

<option>Centro</option>

</select>

</div>


<div class="mt-3">

<label>Passageiros</label>

<input
type="number"
class="form-control"
value="1"
min="1">


<div class="d-grid mt-4">

<button class="btn btn-primary btn-lg">

Buscar Voos

</button>

</div>


<?= $this->endSection() ?>