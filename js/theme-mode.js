 // Função para alternar o ícone com base no estado do checkbox
 function alternarIcone() {
    var checkbox = document.getElementById("flexSwitchCheckChecked");
    var modoIcone = document.getElementById("modoIcone");

    if (checkbox.checked) {
      // Se o checkbox está marcado, mostrar o ícone do sol
      modoIcone.className = "icone-checkbox mdi mdi-weather-sunny";
    } else {
      // Se o checkbox não está marcado, mostrar o ícone da lua
      modoIcone.className = "icone-checkbox mdi mdi-weather-night";
    }
  }

  // Adicionar um ouvinte de eventos para detectar mudanças no estado do checkbox
  document.getElementById("flexSwitchCheckChecked").addEventListener("change", alternarIcone);