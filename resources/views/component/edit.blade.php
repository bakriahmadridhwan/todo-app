@foreach ($todos as $todo)
    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{ url($todo->id . '/todos') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="masukkan nama tugas" value="{{ $todo->name }}">
                            </div>

                            {{-- <div class="mb-3">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="deskripsi"></textarea>
                        </div> --}}

                            <div class="text-end">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
