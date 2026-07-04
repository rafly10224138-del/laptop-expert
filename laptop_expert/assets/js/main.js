document.addEventListener("DOMContentLoaded", function () {
    const formKonsultasi = document.querySelector("#formKonsultasi");
    const inputBudget = document.querySelector("#budget");
    const tombolProses = document.querySelector("#btnProses");

    if (inputBudget) {
        inputBudget.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, "");
        });
    }

    if (formKonsultasi) {
        formKonsultasi.addEventListener("submit", function (event) {
            const kebutuhan = document.querySelector("#kebutuhan");
            const budget = inputBudget ? inputBudget.value.trim() : "";

            if (!kebutuhan.value || budget === "") {
                event.preventDefault();

                alert(
                    "Silakan pilih kategori kebutuhan dan isi budget terlebih dahulu."
                );

                return;
            }

            if (Number(budget) < 1000000) {
                event.preventDefault();

                alert(
                    "Budget minimal yang dapat dimasukkan adalah Rp 1.000.000."
                );

                return;
            }

            if (tombolProses) {
                tombolProses.disabled = true;

                tombolProses.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Memproses Rekomendasi...';
            }
        });
    }
});