const container = document.getElementById('container'); //toma el valor del elemento contenedor
const registerBtn = document.getElementById('register'); //toma el valor del elemento regieter
const loginBtn = document.getElementById('login'); //toma el valor del elemento login
const forgotBtn = document.getElementById('forgot-password'); //boton de olvidar contraseña

//funcion flecha que escucha el evento click en container
//estas funciones sirven para cambiar entre login y register
registerBtn.addEventListener('click', () => {
    container.classList.add("active"); //agregaa al elemento la clase active
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active"); //remueve del contenedor la clase active 
});

forgotBtn.addEventListener('click', () => {
    // Ocultar otros paneles activos (login/register)
    container.classList.remove("active");

    // Mostrar el panel de recuperación de contraseña
    forgotPanel.style.display = "block";
    container.classList.add("active");
});