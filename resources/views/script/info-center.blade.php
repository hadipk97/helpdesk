<script>
    $(document).ready(function() {

        $('#knowledge_base_table').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('get_ticket') }}',
            columns: [{
                    data: 'ticket_no',
                    name: 'ticket_no'
                },
                {
                    data: 'requester',
                    name: 'requester'
                },
                {
                    data: 'ticket_subject',
                    name: 'ticket_subject'
                },
                {
                    data: 'service_id',
                    name: 'service_id'
                },
                {
                    data: 'level_id',
                    name: 'level_id'
                },
                {
                    data: 'ticket_status',
                    name: 'ticket_status'
                },
                {
                    data: 'created_date',
                    name: 'created_date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                } // The action buttons
            ]
        });

    });
</script>