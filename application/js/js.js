document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.btn.ion-icon-accion');
    deleteButtons.forEach(function(deleteButton) {
        deleteButton.addEventListener('click', function(event) {
            event.preventDefault();

            var url = this.getAttribute('href');

            fetch(url, {
                method: 'DELETE'
            })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error al eliminar el registro.');
                }
            })
            .then(function(data) {
                console.log('Registro eliminado exitosamente.');
            })
            .catch(function(error) {
                console.error('Error en la solicitud de eliminación:', error);
            });
        });
    });
});
