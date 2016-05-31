$(document).ready(function() {
    // add form for categories to admin panel
    $("#fg_categories").detach().insertAfter($('#fg_available'));

    // add id to submit
    $('#fg_categories').parent().find($('input[type="submit"]')).attr('id', 'saveStationToCategories')

    // save station to categories data
    $('#saveStationToCategories').click(function() {
        var selectedArr = [];
        $('#div_categories input:checkbox:checked').each(function() {
            selectedArr.push(parseInt($(this).attr('id')));
        });
        var stationId = $("#fg_id #id").val();
        var matches = /modify=([^&#=]*)/.exec(window.location.search);
        var oldStationId = 0;
        if (matches != null) {
            oldStationId = matches[1];
        }

        var formData = {
            categories : JSON.stringify(selectedArr),
            stationId : stationId,
            oldStationId : oldStationId
        };

        $.ajax({
            type: 'POST',
            url: '/saveStToCat',
            data: formData,
            success: function(){}
        });
    });
});