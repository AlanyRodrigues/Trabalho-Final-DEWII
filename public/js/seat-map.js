document.addEventListener("DOMContentLoaded", function () {
    const seatMap = document.getElementById("seat-map");

    if (!seatMap) return;

    const vooId = seatMap.dataset.voo;
    const inputAssento = document.getElementById("assentoSelecionado");
    const btnContinuar = document.getElementById("btnContinuar");

    fetch("/ajax/assentos/" + vooId, {
        headers: {
            "X-Requested-With": "XMLHttpRequest"
        }
    })
    .then(r => r.json())
    .then(assentos => {
        seatMap.innerHTML = "";

        assentos.forEach(a => {
            const btn = document.createElement("button");
            btn.classList.add("btn", "seat");
            btn.dataset.id = a.id;
            btn.textContent = a.numero;

            if (a.ocupado == 1) {
                btn.classList.add("btn-danger");
                btn.disabled = true;
            } else {
                btn.classList.add("btn-success");
            }

            btn.addEventListener("click", function (e) {
                e.preventDefault(); 

                document.querySelectorAll(".seat").forEach(x => {
                    if (!x.disabled) {
                        x.classList.remove("btn-primary");
                        x.classList.add("btn-success");
                    }
                });

                this.classList.remove("btn-success");
                this.classList.add("btn-primary");

                if (inputAssento) {
                    inputAssento.value = a.id;
                }

                if (btnContinuar) {
                    btnContinuar.disabled = false;
                }
            });

            seatMap.appendChild(btn);
        });
    });
});