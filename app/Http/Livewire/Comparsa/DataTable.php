<?php

namespace App\Http\Livewire\Comparsa;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Comparsa;

class DataTable extends DataTableComponent
{
    protected $model = Comparsa::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['comparsas.slug as slug'])
            ->setEmptyMessage('No se han encontrado resultados');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Integrantes", "members")
                ->sortable()
                ->searchable(),
            Column::make("Fecha", "date")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $value->format('d-m-Y')
                ),
            BooleanColumn::make("Publicado", "publish")
                ->sortable(),
            Column::make("Fuente", "source_form")
                ->sortable()
                ->view('backend.tables.source-form'),
            Column::make("Actualizado", "updated_at")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $value->format('d-m-Y H:i:s')
                ),
            ButtonGroupColumn::make('Actions')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View')
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('comparsa.show',['slug' => $row->slug]))
                        ->attributes(function($row) {
                            return [
                                'class' => 'mr-2',
                                'style' => 'text-decoration: underline;',
                                'target' => '_blank'
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('admin.comparsa.edit',['id' => $row->id]))
                        ->attributes(function($row) {
                            return [
                                'target' => '',
                                'style' => 'text-decoration: underline;',
                                'class' => 'mr-2',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn($row) => 'Eliminar')
                        ->location(fn($row) => route('admin.comparsa.delete',['id' => $row->id]))
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
        return [
            SelectFilter::make('Fuente')
                ->options([
                    '' => 'Todos',
                    1 => 'Desde formulario web',
                    0 => 'Publicación interna',
                ])->filter(function(Builder $builder, string $value) {
                    if ($value === "1") {
                        $builder->where('source_form', true);
                    } elseif ($value === "0") {
                        $builder->where('source_form', false);
                    }
                })
        ];
    }
}
