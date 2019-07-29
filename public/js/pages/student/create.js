var FormLayouts = function() {
    //
    // Setup module components
    //

    // Select2
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Basic example
        $('.form-control-select2').select2();
        // Province
        $('.form-control-select2.province').select2({
            ajax:{
                url: function () {
                    return route('province.json').template
                },
            }
        });


        //
        // Select with icons
        //

        // Format icon
        function iconFormat(icon) {
            var originalOption = icon.element;
            if (!icon.id) { return icon.text; }
            var $icon = "<i class='icon-" + $(icon.element).data('icon') + "'></i>" + icon.text;

            return $icon;
        }

        // Initialize with options
        $('.form-control-select2-icons').select2({
            templateResult: iconFormat,
            minimumResultsForSearch: Infinity,
            templateSelection: iconFormat,
            escapeMarkup: function(m) { return m; }
        });
    };

    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-pink-400'
        });
        $('.form-check-input-styled').uniform();

        $('.form-control-uniform').uniform();
    };
    // filePicker
    var _componentFilePicker = function() {
        $('#lfm').filemanager('file');
    };
    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentSelect2();
            _componentUniform();
            _componentFilePicker();
        }
    }
}();

// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    var _shiftClone = function () {
        $('#clone-btn').on('click',function () {
            $('#get-clone-shift').append('<div id="removable" class="row mb-2">\n' +
                '                                        <div class="col-md-4">\n' +
                '                                            <select class="form-control form-control-uniform" data-fouc name="shift">\n' +
                '                                                <option value="morning">Select shift</option>\n' +
                '                                                <option value="morning">Morning</option>\n' +
                '                                                <option value="afternoon">Afternoon</option>\n' +
                '                                            </select>\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        <div class="col-md-4">\n' +
                '                                            <select data-placeholder="Select grade" class="form-control-uniform" data-fouc name="role">\n' +
                '                                                <option value="grade-7">Kindergarten</option>\n' +
                '                                                <option value="grade-8">Grade 1</option>\n' +
                '                                                <option value="grade-9">Grade 2</option>\n' +
                '                                                <option value="grade-10">Grade 3</option>\n' +
                '                                                <option value="grade-11">Grade 4</option>\n' +
                '                                                <option value="grade-12">Grade 5</option>\n' +
                '                                                <option value="grade-12">Grade 6</option>\n' +
                '                                            </select>\n' +
                '                                        </div>\n' +
                '\n' +
                '                                        <div class="col-md-4">\n' +
                '                                            <select data-placeholder="Select teacher" class="form-control form-control-select2" data-fouc name="role">\n' +
                '                                                <option></option>\n' +
                '                                                <option value="grade-7">Grade 7</option>\n' +
                '                                                <option value="grade-8">Grade 8</option>\n' +
                '                                                <option value="grade-9">Grade 9</option>\n' +
                '                                                <option value="grade-10">Grade 10</option>\n' +
                '                                                <option value="grade-11">Grade 11</option>\n' +
                '                                                <option value="grade-12">Grade 12</option>\n' +
                '                                            </select>\n' +
                '                                        </div>\n' +
                '                                    </div>');
            $('#clone-btn-minus').prop('disabled',false);
            $('#clone-btn').prop('disabled',true);
            FormLayouts.init();
        });
        $('#clone-btn-minus').on('click',function () {
            $('#removable').remove();
            $('#clone-btn').prop('disabled',false);
            $('#clone-btn-minus').prop('disabled',true);
        })
    };
    FormLayouts.init();
    _shiftClone();
    $('.form-check-input-styled').on('click',function () {
        var _domNode = $(this)[0].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        if ($(this).is(':checked')){
            $(_domNode).find('select').prop('disabled',false);
            $(_domNode).find('input[type=number],input[type=text]').prop('disabled',false);
        }else {
            $(_domNode).find('select').prop('disabled',true);
            $(_domNode).find('input[type=number],input[type=text]').prop('disabled',true);
        }
    })
});
