@foreach ($todos as $todo)
    <!-- Modal -->
    <div class="modal fade" id="deleteModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>apakah anda yakin ingin menghapus data "<b>{{ $todo->name }}</b>"</p>

                    <div class="text-end">
                        <form action="{{ url($todo->id . '/todos') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
