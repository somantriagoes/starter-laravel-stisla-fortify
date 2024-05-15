<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-md">
            <tr style="text-align:center;">
                <th style="width: 8%">No</th>
                <th>Name</th>
                <th style="width: 20%">Action</th>
            </tr>
            @forelse ($categories as $key => $data)
                <tr>
                    <td>{{ $categories->firstItem() + $key }}</td>
                    <td>{{ $data->name }}</td>
                    <td style="text-align:center;">
                        <a href="#" class="btn btn-warning" onclick="edit({{ $data->id }});"><i
                                class="fas fa-edit"></i>
                            Edit</a>&nbsp;
                        <a href="#" class="btn btn-danger" onclick="destroy({{ $data->id }});"><i
                                class="fas fa-trash"></i>
                            Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        No Data Found
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
<div class="card-footer text-right">
    <nav class="d-inline-block">
        <ul class="pagination mb-0">
            {{ $categories->withQueryString()->links() }}
        </ul>
    </nav>
</div>
