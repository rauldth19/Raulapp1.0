//Cambia el class del html a "dark".
let boton = document.querySelector('#botonOscuro');
let tema = document.getElementById("tema"); 

//Al hacer click cambiará el class a "dark" osea (oscuro).
boton.addEventListener('click', () => {
  tema.classList.toggle('dark');
  boton.classList.toggle('active');

  //Guarda en localstorage un elemento llamado "dark-mode" con el valor "true".
  if(tema.classList.contains('dark')){
    localStorage.setItem('dark-mode', 'true');
  }
  else{
    localStorage.setItem('dark-mode', 'false');
  }
});


// Obtiene el modo actual en el que nos encontramos.
if(localStorage.getItem('dark-mode') === 'true'){

  //En caso de ser "true" mantiene el tema en "dark" y el botón checkeado.
  tema.classList.add('dark');
  boton.checked = true;
}

else{
  tema.classList.remove('dark');
  boton.checked = false;
}



//Función que muestra la contraseña cambiando el tipo de "password" a "text".
function mostrarContrasena(){

  let tipo = document.getElementById("password");

    if(tipo.type == "password"){
        tipo.type = "text";
    }
    else{
        tipo.type = "password";
    }
}



