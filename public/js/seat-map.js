document.addEventListener("DOMContentLoaded", function () {

    const seatMap = document.getElementById("seat-map");

    if (!seatMap)
        return;

    const vooId = seatMap.dataset.voo;

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

            btn.classList.add("btn");

            btn.classList.add("seat");

            btn.dataset.id = a.id;

            btn.textContent = a.numero;

            if (a.ocupado) {

                btn.classList.add("btn-danger");

                btn.disabled = true;

            } else {

                btn.classList.add("btn-success");

            }

            btn.addEventListener("click", function () {

                document
                    .querySelectorAll(".seat")
                    .forEach(x => {

                        if (!x.disabled)
                            x.classList.remove("btn-primary");

                    });

                this.classList.remove("btn-success");

                this.classList.add("btn-primary");

            });

            seatMap.appendChild(btn);

        });

    });

});