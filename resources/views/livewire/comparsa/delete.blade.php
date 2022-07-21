<div>
    <form wire:submit.prevent="submit" class="needs-validation">
        <div class="card">
            <div class="card-body">

                <h2 class="mb-5">¿Deseas eliminar la comparsa: {{ $name }}?</h2>

                <a href="{{ $urlPrevious }}" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-danger float-right">Eliminar comparsa</button>

            </div>
        </div>
    </form>
</div>
