$(function(){
    $("i[data-toggle=window]").live('click', function() {
        
        var alias = '';
        var type = '';
        var url = 'Environments/findWindow/';
        var conditions = '';
       
        model = $(this).attr('data-model');
        parent = $(this).attr('data-parent');
        
        if ($(this).attr('data-url')) {
            url = $(this).attr('data-url');
        }
        if ($(this).attr('data-alias')) {
            alias = $(this).attr('data-alias');
        }
        if ($(this).attr('data-type')) {
            type = $(this).attr('data-type');
        }
        
        if ($(this).attr('data-conditions')) {
            conditions = $(this).attr('data-conditions');
        }
        
        window.open(appUrl + url +
                    'model:' + model  + '/' +
                    'parent:' + parent + '/' +
                    'type:' + type + '/' +
                    'conditionsModel:' + conditions + '/' +
                    'alias:' + alias ,
                    'Buscar', 'width=650, height=550, toolbar=no, statusbar=no, scrollbars'
                    );
    });
});

// Select medicament value
function selectValue (parent, valueId) {
    $('#' + parent + " option[value='"+valueId+"']").attr("selected","selected");
    $('#' + parent + " option[value='"+valueId+"']").change();
}

// Select medicament value
function createSelectValue (parent, valueId, name, type) {
    if (!$('#' + parent + " option[value='"+valueId+"']").val()) {
        var $option = $("<option></option>");
        $option.text(name);
        $option.attr("selected", true);
        $option.attr("value", valueId);
        if (type == '1') {
            $("#"+parent).append($option).change();
        } else {
            $("#"+parent).html($option).change();
        }
    }
}
