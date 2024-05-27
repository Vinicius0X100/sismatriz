document.getElementById('backupBtn').addEventListener('click', function() {
    let spinner = document.querySelector('#backupBtn .spinner-border');
    spinner.classList.remove('d-none');
    document.getElementById('backupBtn').innerText = 'Copiando...';

    fetch('../core/security/system_backup_initialize.php')
    .then(response => response.json())
    .then(data => {
        let status = document.getElementById('status');
        status.innerText = data.mensagem;

        spinner.classList.add('d-none');
        document.getElementById('backupBtn').innerText = 'Fazer Backup de Arquivos';
    })
    .catch(error => {
        console.error('Erro:', error);

        let status = document.getElementById('status');
        status.innerText = 'Ocorreu um erro ao fazer o backup dos arquivos.';

        spinner.classList.add('d-none');
        document.getElementById('backupBtn').innerText = 'Fazer Backup de Arquivos';
    });
});
