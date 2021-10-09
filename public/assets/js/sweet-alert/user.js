
function deleteuser(id) {
    swal({
        title: "Apakah anda yakin?",
        text: "Data User Akan Di Hapus",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((willDelete) => {
        if (willDelete) {
            swal("Data berhasil dihapus", {
                icon: "success"
            }).then(function () {
                window.location.href = "delete=" + id;
            });
        } else {
            swal("Data gagal dihapus");
        }
    });
}
