// Função para alternar entre o modo dia e o modo noturno
function alternarModo() {
    var checkbox = document.getElementById("flexSwitchCheckChecked");
    var navbar = document.querySelector(".navbar");

    if (checkbox.checked) {
      // Se o checkbox está marcado, aplicar o modo noturno
      navbar.classList.add("modo-noturno");
      document.body.classList.add("modo-noturno");
    } else {
      // Se o checkbox não está marcado, remover o modo noturno
      navbar.classList.remove("modo-noturno");
      document.body.classList.remove("modo-noturno");
    }
  }

  // Adicionar um ouvinte de eventos para detectar mudanças no estado do checkbox
  document.getElementById("flexSwitchCheckChecked").addEventListener("change", alternarModo);