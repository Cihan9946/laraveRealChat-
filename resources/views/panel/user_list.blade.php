@extends("panel.app")
@section("content")
    <div class="pdf container">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Kullanıcı Listesi</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card p-5">
                    <table id="userTable" class="display nowrap dataTable cell-border" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Adı</th>
                            <th>Email</th>
                            <th>Birim ID</th>
                            <th>User Status</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Adı</th>
                            <th>Email</th>
                            <th>Birim ID</th>
                            <th>User Status</th>
                            <th>İşlemler</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var userTable = null;

        $(document).ready(function () {
            userTable = $('#userTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
                },
                order: [
                    [0, 'ASC']
                ],
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: true,
                ajax: '{!! route('fetch.users') !!}',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'birim_id'},
                    {data: 'user_status'},
                    {data: 'action'},
                ]
            });
        });

        function deleteUser(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        url: '{!! route('delete.user') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function () {
                            Swal.fire({
                                icon: "success",
                                title: "Başarılı",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            userTable.ajax.reload();
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
