@foreach ($todos as $todo)
    <!-- Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="masukkan nama tugas">
                    </div>

                    {{-- <div class="mb-3">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="deskripsi"></textarea>
                </div>

                <div class="row">
                    <div class="col-8 text-end">
                        <input type="text" class="form-control" id="name" name="list"
                            placeholder="tambah list tugas">
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-success btn-sm">Tambah List</button>
                    </div>
                </div> --}}

                    <div class="text-end">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary btn-sm">Ubah</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
