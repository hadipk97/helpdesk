<script>
    $(document).ready(function() {

        const actionButtons = `
<div class="d-flex flex-row gap-2">
    <!-- Edit Button -->
    <button type="button" data-target="#edit-modal" data-toggle="modal"
        class="btn btn-md btn-warning text-white px-2 rounded-4 d-flex flex-row justify-content-center custom-tooltip">
        <i class="fas fa-pen"></i>
        <span class="tooltip-text">Modify Ticket</span>
    </button>

    <!-- Assign Button -->
    <a href="#" class="btn btn-md btn-success px-2 rounded-4 custom-tooltip">
        <i class="fa fa-tasks"></i>
        <span class="tooltip-text text-capitalize">Ticket Status</span>
    </a>

    <!-- Delete Button -->
    <button type="button" class="btn btn-md btn-danger px-2 rounded-4 custom-tooltip">
        <i class="fa fa-trash"></i>
        <span class="tooltip-text">Delete</span>
    </button>
</div>
`;

        $('#knowledge_base_table').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: false, // disable server-side to use dummy data
            data: [{
                    no: 1,
                    title: 'How to reset password',
                    category: 'Account',
                    description: 'Step-by-step guide to reset user password.',
                    created_by: 'Admin',
                    created_at: '2025-05-22',
                    action: actionButtons
                },
                {
                    no: 2,
                    title: 'Submit IT support ticket',
                    category: 'Support',
                    description: 'Instructions to submit a ticket.',
                    created_by: 'User1',
                    created_at: '2025-05-20',
                    action: actionButtons
                },
                {
                    no: 3,
                    title: 'Install Office 365',
                    category: 'Software',
                    description: 'Guide to install and activate Office 365.',
                    created_by: 'IT Helpdesk',
                    created_at: '2025-05-18',
                    action: actionButtons
                }
            ],
            columns: [{
                    data: 'no'
                },
                {
                    data: 'title'
                },
                {
                    data: 'category'
                },
                {
                    data: 'description'
                },
                {
                    data: 'created_by'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

    });
</script>