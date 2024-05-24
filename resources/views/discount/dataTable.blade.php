<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-md">
            <tr style="text-align:center;">
                <th style="width: 8%">No</th>
                <th>Name</th>
                <th>Discount</th>
                <th style="width: 20%">Action</th>
            </tr>
            @forelse ($discounts as $key => $data)
                @if ($data->name != 'NO DISCOUNT')
                    <tr>
                        <td>{{ $discounts->firstItem() + $key }}</td>
                        <td>{{ $data->name }}</td>
                        <td style="text-align:center;">
                            @if($data->type == 'rupiah')
                                {{ number_format($data->discount) }}
                            @else
                                {{ $data->discount.'%' }}
                            @endif
                        </td>
                        <td style="text-align:center;">
                            <a href="#" class="btn btn-warning" onclick="edit({{ $data->id }});">
                            <i class="fas fa-edit"></i>Edit</a>&nbsp;
                            <a href="#" class="btn btn-danger" onclick="readDeleteModal({{ $data->id }});">
                            <i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4">
                        No Data Found
                    </td>
                </tr>
            @endforelse
        </table>
        <form>
            <input type="hidden" value="{{ $page }}" id="page" name="page">
        </form>
    </div>
</div>
<div class="card-footer text-right">
    <nav class="d-inline-block">
        <ul class="pagination mb-0">
            {{ $discounts->withQueryString()->links() }}
        </ul>
    </nav>
</div>
