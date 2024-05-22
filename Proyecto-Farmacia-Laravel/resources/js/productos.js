document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('buscar').addEventListener('click', function() {
        buscar();
    });
});

function cargarContenido(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('menu').innerHTML = data;
        });
}

function buscar() {
    var elemento_buscar = document.getElementById('nombre_producto').value;
    window.location.href = `/productos?buscar=${elemento_buscar}`;
}

function update(id) {
    window.location.href = `/productos/${id}/edit`;
}

function deleteProducto(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        fetch(`/productos/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            } else {
                alert('Error al eliminar el producto');
            }
        });
    }
}


