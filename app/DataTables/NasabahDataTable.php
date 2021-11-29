<?php

namespace App\DataTables;

use App\Models\Nasabah;
use App\Models\Data_user;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\QueryDataTable;

class NasabahDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'nasabah.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Nasabah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        return Data_user::
        select('data_user.id_user','data_user.nama_user','data_user.no_hp','data_user.alamat','b.status')
        ->leftJoin('user as b', 'data_user.id_user','=','b.id_user')
        ->leftJoin('role as c', 'c.id_role', '=', 'b.id_role')
        ->where('data_user.id_relasi_user', auth()->user()->id_user)
        ->where('data_user.id_user', '!=', auth()->user()->id_user);

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('nasabah-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false,
                        'buttons' => ['export'],
                    ]);
                    // ->buttons(
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     // Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('id_user'),
            Column::make('nama_user'),
            Column::make('no_hp'),
            Column::make('alamat'),
            Column::make('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Nasabah_' . date('YmdHis');
    }
}
