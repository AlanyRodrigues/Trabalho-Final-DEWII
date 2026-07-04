<section id="destinos" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">Destinos em destaque</h2>

            <p class="text-muted">
                Confira alguns dos destinos mais procurados
            </p>

        </div>

        <div class="row g-4">

            <?php
            $destinos = [
                ['nome' => 'Rio de Janeiro', 'img' => 'rio-de-janeiro.jpg'],
                ['nome' => 'São Paulo', 'img' => 'sao-paulo.jpg'],
                ['nome' => 'Salvador', 'img' => 'salvador.png'],
                ['nome' => 'Brasília', 'img' => 'brasilia.png'],
            ];
            ?>

            <?php foreach ($destinos as $d): ?>

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm h-100">

                        <img src="<?= base_url('img/' . $d['img']) ?>"

                             alt="<?= esc($d['nome']) ?>"
                             class="card-img-top"
                             style="height:180px; object-fit:cover;">

                        <div class="card-body text-center">

                            <h5 class="fw-bold">
                                <?= $d['nome'] ?>
                            </h5>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>