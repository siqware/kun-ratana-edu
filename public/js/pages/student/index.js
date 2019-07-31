// Setup module
// ------------------------------

var DatatableBasic = function() {
    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatable = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [ 5 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
        // Alternative pagination
        $('.datatable-pagination').DataTable({
            pagingType: "simple",
            language: {
                paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
            }
        });

        // Scrollable datatable
        var table = $('.datatable-scroll-y').DataTable({
            autoWidth: true,
            scrollX: true,
            scrollY: 400,
            processing: true,
            serverSide: true,
            ajax: {
                url: route('show.higher.student').template,
                method:'post'
            },
            columns: [
                { data: 'students.id', name: 'students.id' },
                { data: 'students.profile', name: 'students.profile',searchable:false,orderable:false },
                { data: 'students.khmer', name: 'students.khmer' },
                { data: 'students.latin', name: 'students.latin' },
                { data: 'students.gender', name: 'students.gender' },
                { data: 'students.dob', name: 'students.dob' },
                { data: 'students.created_at', name: 'students.created_at' },
                { data: 'action', name: 'action',searchable:false,orderable:false },
                /*hidden*/
                { data: 'students.show_pob.village', name: 'students.show_pob.village' },
                { data: 'students.show_pob.commune', name: 'students.show_pob.commune' },
                { data: 'students.show_pob.district', name: 'students.show_pob.district' },
                { data: 'students.show_pob.province', name: 'students.show_pob.province' },

                { data: 'students.show_curr_addr.village', name: 'students.show_curr_addr.village' },
                { data: 'students.show_curr_addr.commune', name: 'students.show_curr_addr.commune' },
                { data: 'students.show_curr_addr.district', name: 'students.show_curr_addr.district' },
                { data: 'students.show_curr_addr.province', name: 'students.show_curr_addr.province' },

                { data: 'students.show_parents.0.name', name: 'students.show_parents.0.name' },
                { data: 'students.show_parents.0.job', name: 'students.show_parents.0.job' },
                { data: 'students.show_parents.0.tel', name: 'students.show_parents.0.tel' },

                { data: 'students.show_parents.1.name', name: 'students.show_parents.1.name' },
                { data: 'students.show_parents.1.job', name: 'students.show_parents.1.job' },
                { data: 'students.show_parents.1.tel', name: 'students.show_parents.1.tel' },

                { data: 'students.show_contact.tel', name: 'students.show_contact.tel' },
                { data: 'students.show_contact.fb', name: 'students.show_contact.fb' },
                { data: 'students.show_contact.email', name: 'students.show_contact.email' },
                { data: 'students.show_contact.line', name: 'students.show_contact.line' },

                { data: 'students.show_former_study.grade', name: 'students.show_former_study.grade' },
                { data: 'students.show_former_study.school', name: 'students.show_former_study.school' },
                { data: 'students.show_former_study.card_id', name: 'students.show_former_study.card_id' },

                { data: 'students.show_shift.time', name: 'students.show_shift.time' },
                { data: 'students.show_shift.grade', name: 'students.show_shift.grade' },
                { data: 'students.show_shift.study_type', name: 'students.show_shift.study_type' },
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 0,7 ] },
                {"targets": [ 8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31 ], "visible": false, "searchable": true},
            ]
        });

        // Resize scrollable table when sidebar width changes
        $('.sidebar-control').on('click', function() {
            table.columns.adjust().draw();
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatable();
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});
