<?php

namespace App\Http\Livewire\Multimedia;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Multimedia;
use App\Models\Comparsa;

class DataTable extends DataTableComponent
{
    protected $model = Multimedia::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['multimedia.slug as slug'])
            ->setEmptyMessage('No se han encontrado resultados')
            ->setFilterLayout('slide-down');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            ImageColumn::make('Imagen')
                ->location(function($row) {

                    $pi = Multimedia::find($row->id)->publicImage();

                    return asset('storage/'.$pi);
                })
                ->attributes(function($row) {
                    return [
                        'class' => 'rounded-circle',
                    ];
                }),
            Column::make('Comparsa', 'comparsa.name')
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => Str::limit($value, 40, ' ...')
                ),
            Column::make("Nombre", "title")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => Str::limit($value, 40, ' ...')
                ),
            Column::make("Fecha", "date")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => is_null($value)? null : $value->format('d-m-Y')
                ),
            Column::make("Formato", "format")
                ->sortable(),
            BooleanColumn::make("Publicado", "publish")
                ->sortable(),
            BooleanColumn::make("Galería", "gallery")
                ->sortable(),
            BooleanColumn::make("CH", "gallery_history_ch")
                ->sortable(),
            BooleanColumn::make("VS", "gallery_history_vs")
                ->sortable(),
            Column::make("Actualizado", "updated_at")
                ->sortable(),
            ButtonGroupColumn::make('Acciones')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View')
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('multimedia.show',['slug' => $row->slug]))
                        ->attributes(function($row) {
                            return [
                                'class' => 'mr-2',
                                'style' => 'text-decoration: underline;',
                                'target' => '_blank'
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('admin.multimedia.edit',['id' => $row->id]))
                        ->attributes(function($row) {
                            return [
                                'target' => '',
                                'style' => 'text-decoration: underline;',
                                'class' => 'mr-2',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn($row) => 'Eliminar')
                        ->location(fn($row) => route('admin.multimedia.delete',['id' => $row->id]))
                        ->attributes(function($row) {
                            return [
                                'target' => '',
                                'style' => 'text-decoration: underline;',
                                'class' => '',
                            ];
                        }),
                ]),
        ];
    }

    public function filters(): array
    {
        $com[''] = 'Todas';
        foreach (Comparsa::orderBy('name','asc')->get() as $c) {
            $com[$c->id] = $c->name;
        }

        $format[''] = 'Todos';
        foreach (config('multimedia.formats') as $f) {
            $format[$f] = $f;
        }

        return [
            SelectFilter::make('Comparsas')
                ->options($com)->filter(function(Builder $builder, string $value) {
                    $builder->where('comparsa_id', $value);
                }),
            SelectFilter::make('Formato')
                ->options($format)->filter(function(Builder $builder, string $value) {
                    $builder->where('format', $value);
                })
        ];
    }
}
