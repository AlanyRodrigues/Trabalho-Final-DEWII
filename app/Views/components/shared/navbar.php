<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
            ✈ PrimeVoo
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('/') ?>">
                        Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#destinos">
                        Destinos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#buscar">
                        Buscar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Sobre
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contato
                    </a>
                </li>

                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">

                    <a href="<?= base_url('/login') ?>"
                       class="btn btn-light text-primary fw-semibold">

                        Entrar

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
