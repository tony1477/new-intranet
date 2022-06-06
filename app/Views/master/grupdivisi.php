<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>
    <?= $this->include('partials/sweetalert-css') ?>
    
</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Group Divisi</h4>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 divisiGroup">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Kode Divisi</th>
                                            <th>Nama Divisi</th>
                                            <th>User Created</th>
                                            <th>User Modified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($divisi as $list):?>
                                            <tr>
                                                <td>
                                                    <a class="btn btn-soft-secondary waves-effect waves-light btn-sm editDivisiGroup" title="Edit" data-bs-toggle="modal" data-bs-target="#editGroup"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                                    <a class="btn btn-soft-danger waves-effect waves-light btn-sm deleteDivisiGroup" title="Hapus" ><i class="fas fa-trash-alt" title="Hapus"></i></a>
                                                </td>
                                                <td><?=$list->gdiv_kode?></td>
                                                <td><?=$list->gdiv_nama?></td>
                                                <td><?=$list->user_c?></td>
                                                <td><?=$list->user_m?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="editGroup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Grup Divisi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form novalidate method="post">
                                                    <input type="hidden" />
                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Kode Divisi</label>
                                                            <!-- <select name="kode" id="kode" class="form-select">
                                                                <option value="">-</option>
                                                                <?php foreach($divisi as $opt):?>
                                                                    <option value="<?=$opt->gdiv_kode?>"><?=$opt->gdiv_kode?></option>
                                                                <?php endforeach;?>
                                                            <div class="pristine-error text-help">Kode Divisi Harus Diisi</div> 
                                                        </select> -->
                                                        <input type="text" name="kode" id="kode" class="form-control" required value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Nama Divisi</label>
                                                            <input type="text" required data-pristine-required-message="Isikan Nama Divisi" class="form-control" value="" id="namadivisi" />
                                                        <!-- <div class="pristine-error text-help">Nama Divisi Harus Diisi</div> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- SweetAlert -->
<?= $this->include('partials/sweetalert') ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>
<script>
    
    async function deleteData(url='',data={}) {
        const response = await fetch(url, {
            method:'post',
            mode:'cors',
            cache:'no-cache',
            creadentials:'same-origin',
            headers: {
                'Content-Type':'application/json',
            },
            body: JSON.stringify(data)
        })
        return response.json()
    }

    const editButton = document.querySelectorAll(".editDivisiGroup");
    const deleteButton = document.querySelectorAll('.deleteDivisiGroup')
    const selected = document.querySelectorAll("input#kode");

    for (let i = 0; i < editButton.length; i++) {
        editButton[i].addEventListener("click", function() {
            let optionvalue = document.querySelector('table.divisiGroup').rows.item(i+1).cells.item(1).innerHTML
            let nama = document.querySelector('table.divisiGroup').rows.item(i+1).cells.item(2).innerHTML
            // selected.value = "EST"
            // selected.forEach(val => {
            //     console.log(val)
            // })
            // console.log(selected.selectedIndex=1)
            document.getElementById("kode").value = optionvalue;
            document.getElementById("namadivisi").value = nama;
        });
    }

    for(let i=0; i<deleteButton.length; i++) {
        deleteButton[i].addEventListener("click", function() {
        Swal.fire({
            title: "Apakah Anda Yakin Menghapus Data ?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ab57d",
            cancelButtonColor: "#fd625e",
            confirmButtonText: "Ya, Hapus Data!"
        }).then(function (result) {
            if (result.value) {
                deleteData('<?=base_url()?>/group-divisi/delete', {'kode':'TES'}).then(res => {
                    console.log(res)
                })
                //Swal.fire("Deleted!", "Data sudah terhapus.", "success");
            }
        });
        });
    }

    // Warning Message
    //const deleteButton = document.querySelector('.deleteDivisiGroup')
</script>
</body>

</html>