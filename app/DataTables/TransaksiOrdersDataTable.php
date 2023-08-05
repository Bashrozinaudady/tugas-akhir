<?php

namespace App\DataTables;

use App\Models\TransaksiOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransaksiOrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($dt) {
                $edit = '<a href="" class="btn btn-sm btn-warning">Edit</a>';
                return $edit;
            })
            ->addColumn('nama_pemesan', function ($data) {
                return $data->sales->nama;
            })
            ->addColumn('nama_produk', function ($data) {
                return $data->produk->nama;
            })
            ->addColumn('kategori', function ($data) {
                return $data->produk->kategori_produk->nama;
            })
            ->addColumn('harga', function($data) {
                return number_format($data->produk->harga, 2, ',', '.');
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TransaksiOrder $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('transaksiorders-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false),
            Column::make('kode')->searchable(true),
            Column::make('nama_pemesan')->searchable(true),
            Column::make('nama_produk')->searchable(true),
            Column::make('kategori'),
            Column::make('harga'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TransaksiOrders_' . date('YmdHis');
    }
}
