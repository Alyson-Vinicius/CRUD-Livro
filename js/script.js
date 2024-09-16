
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(event) {
        let titulo = form.querySelector('input[name="titulo"]').value.trim();
        let autor = form.querySelector('input[name="autor"]').value.trim();
        let anoPublicacao = form.querySelector('input[name="ano_publicacao"]').value.trim();

        if (!titulo || !autor || !anoPublicacao) {
            event.preventDefault(); 
            alert('Por favor, preencha todos os campos obrigatórios.');
        } else if (isNaN(anoPublicacao) || anoPublicacao < 0 || anoPublicacao.length != 4) {
            event.preventDefault();
            alert('Por favor, insira um ano de publicação válido (4 dígitos).');
        }
    });
});


const inputs = document.querySelectorAll('input');
inputs.forEach(input => { 
    input.addEventListener('focus', function() {
        this.style.backgroundColor = '#e0f7fa'; 
    });

    input.addEventListener('blur', function() {
        this.style.backgroundColor = '';
    });
});


function filtrarLivros() {
    let input = document.getElementById('search').value.toLowerCase();
    let table = document.querySelector('table');
    let tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName('td')[1]; 
        if (td) {
            let txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(input) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


const deleteLinks = document.querySelectorAll('a[href^="delete.php"]');
deleteLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        let confirmDelete = confirm('Você tem certeza que deseja excluir este livro?');
        if (!confirmDelete) {
            event.preventDefault(); 
        }
    });
});


setTimeout(function() {
    let message = document.getElementById('success-message');
    if (message) {
        message.style.display = 'none';
    }
}, 3000); 
