// Función para iniciar sesión
function iniciarSesion(email, clave) {
    fetch('http://localhost/tu_proyecto/auth/iniciarsesion', {
        method: 'POST',
        body: JSON.stringify({
            email: email,
            clave: clave
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            // Almacenar el token en el almacenamiento local
            localStorage.setItem('token', data.token);
            // Enviar automáticamente una solicitud a la ruta protegida
            accederRutaProtegida();
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function accederRutaProtegida() {
    const token = localStorage.getItem('token');
    
    fetch('http://localhost/tu_proyecto/reuniones', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}
