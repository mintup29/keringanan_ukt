<div>
    @if ($item->status == 'Accepted')
        <a href="items/{{ $item->id }}" target="_blank">
            <button class="btn btn-info col-md-3"><i class="fa fa-eye"></i></button>
        </a>
    @elseif ($item->status == 'Rejected')
        <a href="items/{{ $item->id }}" target="_blank">
            <button class="btn btn-info col-md-3"><i class="fa fa-eye"></i></button>
        </a>
    @elseif ($item->status == 'Need Action')
        <button onclick="updateAction('{{ $item->id }}', 'Accepted')" class="btn btn-success col-md-3"><i class="fa fa-check"></i></button>
        <button onclick="updateAction('{{ $item->id }}', 'Rejected')" class="btn btn-danger col-md-3"><i class="fa fa-close"></i></button>
        <a href="items/{{ $item->id }}" target="_blank">
            <button class="btn btn-info col-md-3"><i class="fa fa-eye"></i></button>
        </a>
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
