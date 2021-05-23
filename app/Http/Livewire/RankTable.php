<?php

namespace App\Http\Livewire;

use App\Support\Collection;
use App\User;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class RankTable extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'livewire.custom-paginate';
    }

    public function render()
    {
        $rankResults = (new Collection(User::rankResults()))->paginate(10);

        return view('livewire.rank-table', ['rankResults' => $rankResults]);
    }
}
