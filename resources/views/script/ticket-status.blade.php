<script>
    function changeRemarks(e) {
        if (e.value === "Assigned") {
            var x = document.getElementById("ticketStatus").selectedIndex;
            var remarks = document.getElementsByTagName("option")[x].label;
            document.getElementById("remarks").value = remarks;
        } else {
            document.getElementById("remarks").value = '';
        }
    }

    document.getElementById('ticketStatus').addEventListener('change', function() {
        changeRemarks(this);
    });
</script>
<script>
    $(document).ready(function() {
        let ticketNo = @json($ticket->ticket_no);
        let encodedTicketNo = encodeURIComponent(ticketNo);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#history_table').DataTable({
            processing: true,
            ajax: `/ticket_status/${encodedTicketNo}/histories`,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'ticket_status',
                    name: 'ticket_status'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
            ]
        });
    });
</script>