@extends("panel.app")
@section("content")
    <div class="modal fade bd-example-modal-lg" style="overflow: scroll" id="update_categories_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E5E8E8;">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Rol
                        Güncelle</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F8F9F9; padding: 30px;">
                    <form id="update_category_post" method="post">

                        <div class="form-group mb-4 col-12">
                            <input type="hidden" id="updateId">
                            <label class="mb-1" for="role_id" style="text-decoration: underline;">Role ve ID</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->id }}</option>
                                @endforeach
                            </select>

                        </div>

                    </form>
                </div>
                <div class="modal-footer" style="background-color: #E5E8E8;">
                    <button type="button" class="btn btn-primary" onclick="updateCategoryPost()">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" style="overflow: scroll" id="add-category-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E5E8E8;">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 25px !important; ">Role Güncelle
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #F8F9F9;">
                    <form id="create_category">

                        <div class="row mt-3 mb-4">
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="category_name" style="text-decoration: underline;">Role id </label>
                                <input type="text" name="category_name" id="category_name" class="form-control">

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color: #E5E8E8;">
                    <button type="button" onclick="createCategory()" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>

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
                    <table id="categoryTable" class="display nowrap dataTable cell-border" style="width:100%">
                        <thead>
                        <tr>
                            <th> ID</th>
                            <th>Kullanıcı Adı</th>
                            <th>Kullanıcı Status</th>
                            <th>Kullanıcı Email</th>
                            <th>Kullanıcı Rol</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th> ID</th>
                            <th>Kullanıcı Adı</th>
                            <th>Kullanıcı Status</th>
                            <th>Kullanıcı Email</th>
                            <th>Kullanıcı Rol</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer clearfix">

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        function createModelOpen() {
            $('#add-category-modal').modal("toggle");
        }

        function createCategory() {
            var formData = new FormData(document.getElementById('create_category'));

            $.ajax({
                type: 'POST',
                url: '{{route('create')}}',
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Kategori Oluşturuldu!'
                    });

                    var elements = document.getElementById("create_category").elements;

                    for (var i = 0, element; element = elements[i++];) {
                        element.value = "";
                    }
                    $('#add-category-modal').modal("toggle");
                    dataTable.ajax.reload();

                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });


        }

        function updateCategoryPost() {

            var formData = new FormData(document.getElementById('update_category_post'));
            formData.append('updateId',$('#updateId').val())
            $.ajax({
                type: 'POST',
                url: '{{route('update')}}',
                dataType: "json",
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Güncelleme Başarılı!'
                    });

                    var elements = document.getElementById("update_category_post").elements;

                    for (var i = 0, element; element = elements[i++];) {
                        element.value = "";
                    }

                    $('#update_categories_modal').modal("toggle");

                    dataTable.ajax.reload(null, false);
                    dataTable.fnStandingRedraw();
                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });
        }


        function updateCategory(id) {

            var category_name = $('#nameUpdate');

            $.ajax({
                type: 'GET',
                url: '{{route('get')}}',
                data: {id: id},
                success: function (data) {

                    category_name.val(data.category_name[0]);
                    $('#role_id').val(data.category_name[0])
                    $('#updateId').val(id);

                    $('#update_categories_modal').modal("toggle");

                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                    });
                }
            });
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });
        });

        var dataTable = null;

        dataTable = $('#categoryTable').DataTable({
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
            ajax: '{!! route('fetch') !!}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'user_status'},
                {data: 'email'},
                {data: 'role_name'},
                {data: 'update'},
                {data: 'delete'},
            ]
        });

        function deleteCategory(id) {
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
                        url: '{!! route('delete') !!}',
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
                            dataTable.ajax.reload();
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $.each(data.responseJSON.errors, function (key, value) {
                                $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
                            });
                        }
                    });
                }
            });
        }

    </script>
@endsection

@section('scripts')
    <script type="text/javascript">
        setTimeout(()=>{
            $("#sidebar-menu-one").addClass("show")
        },1000)
    </script>
@endsection
