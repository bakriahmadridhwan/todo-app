@foreach ($todos as $todo)
    <!-- Modal -->
    <div class="modal fade" id="checkModal{{ $todo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Progres Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>apakah tugas "<b>{{ $todo->name }}</b>" benar sudah selesai?</p>

                    <div class="text-end">
                        <form action="{{ url($todo->id . '/check') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-success btn-sm">Selesai</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
