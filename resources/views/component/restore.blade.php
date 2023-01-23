@foreach ($todos as $todo)
    <!-- Modal -->
    <div class="modal fade" id="restoreModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Progres Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>apakah yakin tugas "<b>{{ $todo->name }}</b>" akan dikembalikan lagi?</p>

                    <div class="text-end">
                        <form action="{{ url($todo->id . '/restore') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-warning btn-sm">Kembalikan Tugas</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
