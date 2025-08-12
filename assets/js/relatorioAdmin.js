const btnGenerate = document.querySelector("#generate-pdf");

if (btnGenerate) {
    btnGenerate.addEventListener("click", () => {
        const content = document.querySelector("#listaUsuarios");

        const options = {
            margin: [10, 10, 10, 10],
            filename: "relatorio_usuarios.pdf",
            html2canvas: { scale: 2 },
            jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
        };

        html2pdf().set(options).from(content).save();
    });
}
