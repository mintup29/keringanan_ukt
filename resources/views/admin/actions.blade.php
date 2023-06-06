<div>
    @if ($item->status == 'Accepted')
        <button class="btn btn-info col-md-3" data-toggle="modal" data-target="#detailModal">
            <i class="fa fa-eye"></i>
        </button>
    @elseif ($item->status == 'Rejected')
        <button class="btn btn-info col-md-3" data-toggle="modal" data-target="#detailModal">
            <i class="fa fa-eye"></i>
        </button>
    @elseif ($item->status == 'Need Action')
        <button onclick="updateAction('{{ $item->id }}', 'Accepted')" class="btn btn-success col-md-3"><i class="fa fa-check"></i></button>
        <button onclick="updateAction('{{ $item->id }}', 'Rejected')" class="btn btn-danger col-md-3"><i class="fa fa-close"></i></button>
        <button class="btn btn-info col-md-3" data-toggle="modal" data-target="#detailModal">
            <i class="fa fa-eye"></i>
        </button>
    @endif
</div>

<script>        
    function updateAction(modelId, newValue) {
        $.ajax({
            url: "{{ url('dashboard-admin') }}" + '/' + modelId + "/update-action",
            type: 'PUT',
            data: {
                _token: "{{ csrf_token() }}",
                status: newValue
            },
            success: function (response) {
                // Handle success response
                console.log(response.message);
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error(error);
            }
        });
    }
</script>
