function deleteRs(itemId) {
    if (confirm('Anda yakin ingin menghapus item ini?')) {
        fetch(`/rumah-sakit/delete/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.code == 204) {
                Swal.fire({
                    title: 'Sukses',
                    text: data.message,
                    icon: 'success'
                });

                // Item berhasil dihapus
                const itemElement = document.querySelector(`#delete-pasien[data-id="${itemId}"]`);
                itemElement.closest('tr').remove();
            } else if (data.code == 400) {
                // Item tidak ditemukan
                Swal.fire({
                    title: 'Kesalahan',
                    text: data.message,
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Kesalahan',
                text: data.error,
                icon: 'error'
            });
        });
    }
}

function deletePasien(itemId) {
    if (confirm('Anda yakin ingin menghapus item ini?')) {
        fetch(`/pasien/delete/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.code == 204) {
                Swal.fire({
                    title: 'Sukses',
                    text: data.message,
                    icon: 'success'
                });

                // Item berhasil dihapus
                const itemElement = document.querySelector(`#delete-pasien[data-id="${itemId}"]`);
                itemElement.closest('tr').remove();
            } else if (data.code == 400) {
                // Item tidak ditemukan
                Swal.fire({
                    title: 'Kesalahan',
                    text: data.message,
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Kesalahan',
                text: data.error,
                icon: 'error'
            });
        });
    }
}
