<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Página</th>
            <th scope="col">Actualizada</th>
            <th scope="col">Galería</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
            @foreach($pages as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->title }}</td>
                <td>{{ $p->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    @if($p->gallery == 0)
                        No aplica
                    @elseif($p->gallery == 1)
                        Sí
                    @elseif($p->gallery == 2)
                        No
                    @endif
                </td>
                <td>
                    <a href="{{ route($p->route) }}" target="_blank">
                        Ver
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.pages.edit',['page'=>$p->id]) }}">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
