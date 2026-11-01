function destroy(e){
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Estás seguro?',
        text: 'El producto sera eliminado.',
        showCancelButton: true,
        cancelbuttonText: 'Cancelar',
        confirmButtonText: 'Si'}
    )
    .then((res) => {
        if(res.isConfirmed){
            const request = new XMLHttpRequest();
            request.open('DELETE', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);
            request.onload = () => {
                if(request.status === 200){
                    e.closest('tr').remove();
                    Swal.fire({
                        icon: 'success',
                        title: 'Producto eliminado',
                        text: 'El producto ha sido eliminado correctamente.'
                    });
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al eliminar el producto.'
                    });
                }
            };
            request.send();
        }
    });
}