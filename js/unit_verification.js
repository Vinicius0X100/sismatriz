document.getElementById('verificarBtn').addEventListener('click', function() {
    // Exibe o spinner
    let spinner = document.querySelector('#verificarBtn .spinner-border');
    spinner.classList.remove('d-none');

    fetch('../core/security/system_unit_verification.php')
    .then(response => response.json())
    .then(data => {
        let tabelaArquivos = document.getElementById('tabelaArquivos');
        tabelaArquivos.innerHTML = ''; // Limpa a tabela antes de preencher com os novos dados

        // Cria a estrutura da tabela com Bootstrap
        let tableHTML = `
        <table class="table">
            <thead>
                <tr>
                    <th>Caminho do Arquivo</th>
                </tr>
            </thead>
            <tbody>
        `;

        // Preenche a tabela com os dados dos arquivos
        data.forEach(arquivo => {
            tableHTML += `
            <tr>
                <td>${arquivo}</td>
            </tr>
            `;
        });

        // Fecha a estrutura da tabela
        tableHTML += `
            </tbody>
        </table>
        `;

        // Adiciona a tabela ao elemento HTML
        tabelaArquivos.innerHTML = tableHTML;

        // Esconde o spinner após a conclusão da verificação
        spinner.classList.add('d-none');
    })
    .catch(error => console.error('Erro ao verificar arquivos:', error));
});