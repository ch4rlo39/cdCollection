$(document).ready(function() {
    $('#genre-family-id').change(function() {
        var genreFamilyId = $(this).val();
        if(genreFamilyId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'genre-family-id=' + genreFamilyId,
                success: function (genreSubfamilies) {
                    $select = $('#genre-subfamily-id');
                    $select.find('option').remove();
                    $.each(genreSubfamilies, function (key, value){
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#genre-subfamily-id').html('<option value="">Select Genre Family first</option>');
        }
    }).change();
});

