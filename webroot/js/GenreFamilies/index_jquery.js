
// Update the genreFamilies data list
function getGenreFamilies() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var genreFamilyTable = $('#genreFamilyData');
                    genreFamilyTable.empty();
                    $.each(data.genreFamilies, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalGenreFamilyAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'genreFamilyAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        genreFamilyTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td>' + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function genreFamilyAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var genreFamilyData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalGenreFamilyAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        genreFamilyData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        genreFamilyData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(genreFamilyData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">GenreFamily data has been ' + statusArr[type] + ' successfully.</p>');
                getGenreFamilies();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the genreFamily's data in the edit form
function editGenreFamily(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
        //data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.genreFamily.id);
            $('#name').val(data.genreFamily.name);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalGenreFamilyAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var genreFamilyFunc = "genreFamilyAction('add');";
        $('.modal-title').html('Add new genre family');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowId');
            genreFamilyFunc = "genreFamilyAction('edit', " + rowId + ");";
            $('.modal-title').html('Edit genre family');
            editGenreFamily(rowId);
        }
        $('#genreFamilySubmit').attr("onclick", genreFamilyFunc);
    });

    $('#modalGenreFamilyAddEdit').on('hidden.bs.modal', function () {
        $('#genreFamilySubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});