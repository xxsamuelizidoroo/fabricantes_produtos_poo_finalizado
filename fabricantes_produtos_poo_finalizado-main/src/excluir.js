// Obtém todos os elementos com a classe 'excluir' e armazena em uma variável 'links'
let links = document.querySelectorAll('.excluir');

// Percorre sobre cada link obtido
for(let i = 0; i < links.length; i++ ){
    // Adiciona um evento de clique a cada link
    links[i].addEventListener("click", function(event){
        
        // Impede o comportamento padrão do clique, que geralmente é seguir o link
        event.preventDefault();

        // Exibe um prompt de confirmação ao usuário
        let resposta = confirm("Deseja realmente excluir?");

        // Se o usuário confirmar, redireciona para o link de destino
        if(resposta){
            location.href = links[i].getAttribute('href');
        };
    });
}

