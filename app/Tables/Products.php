<?php

namespace App\Tables;

use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Products extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */

    // private $paginate=10;
    public function __construct(Request $request)
    {
        // set pagination
        // $this->paginate = $request->query('perPage');

    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Product::query()->paginate(10);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id','name'])
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->column('description', sortable: true)
            ->column('price', sortable: true)
            ->column('stock', sortable: true)
            ->perPageOptions([10])
            ->bulkAction('Delete');
            // ->perPage(5);
            // ->perPageOptions([5,50, 100, 200]);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
