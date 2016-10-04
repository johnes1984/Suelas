var repeat = 0;
$(function() {
    /*$('.date').datepicker();
    $('.date').live('click',function (datepicker){
       $(this).datepicker();
    });*/
    
    $('#addScnt').attr('href', '#');
    
    var tbody = $('#cards');
    var i = $('.table-conditions tbody > tr').size();
    var newTr = '';
    
    $('#addScnt').on('click', function() {
        newTr = $('.clone').clone();
        newTr.removeClass('clone').addClass('remove');
        newTr.attr('id', i);
        
        newTr.find('input, select').each(function(){
            name = $(this).attr('data-name');
            $(this).attr('name', 'data[CardDetail]['+ i +']['+ name +']');
            $(this).attr('id', name + '_' + i);
            $(this).attr('rel', i);
            if (name != 'medicament_id' && name != 'date' && name != 'destroy_unit' && name != 'total_dosis_unit') {
                $(this).val('');
            }
        });

        $('#destroy_unit_' + i).val($("#unit_id_" + (i-1) + " option:eq(0)").text());
        $('#total_dosis_unit_' + i).val($("#unit_id_" + (i-1) + " option:eq(0)").text());

        newTr.find('i.true-icon').each(function(){
            $(this).attr('id', 'diagnosis_' + i + '_true').hide();
        });

        newTr.find('i.false-icon').each(function(){
            $(this).attr('id', 'diagnosis_' + i + '_false').hide();
        });

        newTr.find('i.search-diagnosis').each(function(){
            $(this).attr('data-parent', 'diagnosis_' + i);
        });
        
        newTr.find('td.td-delete > a').each(function(){
            $(this).show();
            $(this).attr('rel', i);
        });
        
        newTr.appendTo(tbody);
        i++;
        
        return true;
    });

     $(".exist_patient").live('change', function(event) {
        rel = $(this).attr('rel');
        if ($('#exist_patient_' + rel).val() == '1') {
            $("#card_file_" + rel).removeAttr('data-required');
            $("#card_file_" + rel).val('');
            $("#card_file_" + rel).hide();
        } else {
            $("#card_file_" + rel).attr('data-required', '1');
            $("#card_file_" + rel).show();
        }
    });
    
    $('#delete').live('click',function (){
        parent = $(this).attr('rel');
        $("#" + parent).remove();
        i--;
    });

     $('.gender_id').live('change', function() {
        rel = $(this).attr('rel');
        if ($(this).val() == 1) {
            $('#gender_code_' + rel).val('M');
        } else if ($(this).val() == 2){
            $('#gender_code_' + rel).val('F');
        } else {
            $('#gender_code_' + rel).val('');
        }
    });
    
    $('form').on('submit', function(e) {
        
        $('.div_general_error').remove();
        if (!validateData()) {
            $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'Los campos marcados con <i class="icon-asterisk"></i> Son obligatorios.' +
                            '</div>');
            return false;
        }
        
        quantity = calculateTotalQuantity();
        if (!validateQuantityMedicament(quantity, $('#medicament_id_0').val(), $('#lot_0').val(), $('#expiration_date_0').val(), $('#invima_code_0').val())) {
            $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'No posee la cantidad suficiente en el inventario.' +
                            '</div>');
            return false;
        }

        if (!validateDestroy()) {
            $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'La cantidad a destruir no puede ser negativa por favor valide la informacion para realizar correctamente el calculo.' +
                            '</div>');
            return false;
        }

        $('#save-button')
            .attr('disabled', 'disabled')
            .val('Enviando, por favor espere');
        
        $(this).ajaxSubmit({
            target: '#result',
            success: function() {
            }
        })
        return false;
    });
    
    $('.quantity').live('keypress', function(){
        $(this).validCampoFranz('.0123456789');
    });

    $('.quantity').live('change', function() {
        if ($(this).val()) {
            rel = $(this).attr('rel');
            quantity   = $('#quantity_' + rel).val();
            medicament = $('#medicament_id_' + rel).val();
            if (!validateQuantityMedicament(quantity, medicament, $('#lot_0').val(), $('#expiration_date_0').val(), $('#invima_code_0').val())) {
                $("#result").html('<div class="alert alert-error">No posee la cantidad suficiente en el inventario.</div>');
            }

            concentration = $("#unit_id_" + rel + " :selected").val();
            dosis         = $('#total_dosis_' + rel).val();
            $('#dosis_' + rel).val(concentration * quantity).change();
            calculateTotalDestroy(quantity, concentration, dosis, rel);
        }
    });

    $('.frequency').live('keypress', function(){
        $(this).validCampoFranz('.0123456789');
    });

    $('.frequency').live('change', function() {
        if ($(this).val()) {
            rel       = $(this).attr('rel');
            frecuency = $('#frequency_' + rel).val();
            dosis  = $('#dosis_' + rel).val();
            concentration = $("#unit_id_" + rel + " :selected").val();
            calculateTotalDosis(frecuency, dosis, concentration, rel);
        }
    });

    $('.dosis').live('keypress', function(){
        $(this).validCampoFranz('.0123456789');
    });

    $('.dosis').live('change', function() {
        if ($(this).val()) {
            rel       = $(this).attr('rel');
            val = 0;
            dosis  = $('#dosis_' + rel).val();
            concentration = $("#unit_id_" + rel + " :selected").val();
            var cpquantity = $('#quantity_' + rel).val();
            if (!cpquantity) {
                cpquantity = 1;
            }
            if (parseFloat($(this).val()) > parseFloat(concentration * cpquantity)) {
                val = 1;
                $('#result').html('<div class="alert alert-danger fade in div_error_concentration">' +
                    '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                    'La dosis no puede ser mayor a la del concentracion del medicamento.' +
                '</div>');
                $('#dosis_' + rel).val(concentration)
                return false;
            }

            if (!val) {
                $('.div_error_concentration').remove()
            }

            frecuency = $('#frequency_' + rel).val();
            dosis  = $('#dosis_' + rel).val();
            calculateTotalDosis(frecuency, dosis, concentration, rel);
        }
    });

    $('.total_dosis').live('change', function() {
        if ($(this).val()) {
            rel           = $(this).attr('rel');
            concentration = $("#unit_id_" + rel + " :selected").val();
            quantity      = $('#quantity_' + rel).val();
            dosis         = $('#total_dosis_' + rel).val();
            calculateTotalDestroy(quantity, concentration, dosis, rel);
        }
    });
    
    if ($('.unit_id').val()) {
        rel = $('.unit_id').attr('rel');
        $('#destroy_unit_' + rel).val($("#unit_id_" + rel + " :selected").text());
        $('#total_dosis_unit_' + rel).val($("#unit_id_" + rel + " :selected").text());
    }

    $('.unit_id').live('change', function() {
        if ($(this).val()) {
            rel           = $(this).attr('rel');

            $('#destroy_unit_' + rel).val($("#unit_id_" + rel + " :selected").text());
            $('#total_dosis_unit_' + rel).val($("#unit_id_" + rel + " :selected").text());
            
            concentration = $("#unit_id_" + rel + " :selected").val();
            quantity      = $('#quantity_' + rel).val();
            dosis         = $('#total_dosis_' + rel).val();
            calculateTotalDestroy(quantity, concentration, dosis, rel);
        }
    });
    
    $('.document').live('blur', function () {
        if ($(this).val()) {
            rel = $(this).attr('rel');

            if ($('#type_document_id_' + rel).val()) {
                typeDocument = $('#type_document_id_' + rel).val();
            } else {
                typeDocument = 0;
            }
            
            $('div#bar-progress').show();
            $.post(appUrl + 'CardHeads/getPatient/'  + $(this).val() + '/' + typeDocument + '/' + rel, function(data) {
                if (data.length > 1) {
                    $('#age_' + rel).val('');
                    $('#age_unit_' + rel).val('');
                    $('#gender_id_' + rel).val('');
                    $('#gender_code_' + rel).val('');
                    $('#phone_' + rel).val('');
                    //$('#names_' + rel).attr('readonly', 'true');
                    $('.result').html(data);
                    $("#exist_patient_" + rel).val(1).change();
                } else {
                    $("#exist_patient_" + rel).val(0).change();
                    $('#names_' + rel).val('').removeAttr('readonly');
                    $('#age_' + rel).val('');
                    $('#age_unit_' + rel).val('');
                    $('#gender_id_' + rel).val('');
                    $('#gender_code_' + rel).val('');
                    $('#phone_' + rel).val('');
                    $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'El paciente no existe.' +
                            '</div>');
                }
            }).always(function() {
                $('div#bar-progress').hide();
            });
        }
    });
    
    $('.doctor_document').live('blur', function () {
        if ($(this).val()) {
            rel = $(this).attr('rel');
            
            $('div#bar-progress').show();
            $.post(appUrl + 'CardHeads/getDoctor/'  + $(this).val() + '/' + rel, function(data) {
                if (data) {
                    $('.result').html(data);
                } else {
                    $('#doctor_name_' + rel).val('');
                    $('#medical_register_' + rel).val('');
                    $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'El medico no existe.' +
                            '</div>');
                }
            }).always(function() {
                $('div#bar-progress').hide();
            });
        }
    });
    
    $('.dispatches_document').live('blur', function () {
        if ($(this).val()) {
            rel = $(this).attr('rel');
            
            $('div#bar-progress').show();
            $.post(appUrl + 'CardHeads/getPatient/'  + $(this).val() + '/0' + '/' + rel + '/1', function(data) {
                if (data) {
                    $('.result').html(data);
                } else {
                    $('#dispatches_' + rel).val('');
                    $('#result').html('<div class="alert alert-danger fade in div_general_error">' +
                                '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
                                'El dispensador no existe.' +
                            '</div>');
                }
            }).always(function() {
                $('div#bar-progress').hide();
            });
        }
    });

    // Get dx info
    $(".getDx").live('blur', function() {
        rel = $(this).attr('rel');
        if ($(this).val()) {
            getDxJson($(this).val(), this.id, rel);
        } else {
            $("#diagnosis_" + rel + "_true").hide();
            $("#diagnosis_" + rel + "_false").hide();
        }
    });

});

function validateData() {
    var validate = 0;
    
    $('.table-conditions tbody > tr').find(':input').each(function() {
        if (this.type != 'hidden') {
            if ($(this).attr('data-required')) {
                if ($(this).attr('data-name') == 'destroy') {
                    if (!$(this).val()) {
                        validate++;
                    }
                } else {
                    if (!$(this).val() || $(this).val() == 0) {
                        validate++;
                    }
                }
            }
        }
    });
    
    if (validate > 0) {
        return false;
    }
    
    return true;
}

function validateDestroy() {
    var validate = 0;
    
    $('.table-conditions tbody > tr').find('.destroy').each(function() {
        if ($(this).val() < 0) {
            validate++;
        }
    });
    
    if (validate > 0) {
        return false;
    }
    
    return true;
}

function calculateTotalQuantity() {
    var quantity = 0;
    
    $('.table-conditions tbody > tr').find('.quantity').each(function() {
        if ($(this).val() && $(this).val() != 0) {
            quantity += parseInt($(this).val());
        }
    });
    
    return quantity
}

function validateQuantityMedicament(quantity, medicament, lot, date, invima) {
    var http = new XMLHttpRequest();
    var url = appUrl + 'Inventories/validateQuantity/';
    var params = "medicament_id=" + medicament + "&quantity=" + quantity + "&lot=" + lot + "&expiration_date=" + date + "&invima_code=" + invima;
    http.open("POST", url, false);
    
    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-length", params.length);
    http.setRequestHeader("Connection", "close");
    http.send(params);
    
    return http.responseText
}

function calculateTotalDosis(frecuency, dosis, concentration, rel) {
    if (!frecuency || frecuency == 'undefined' || frecuency == 0) {
        frecuency = 1;
        $("#frecuency_" + rel).val(frecuency);
    }

    if (!dosis || dosis == 'undefined' || dosis == 0) {
        dosis = concentration;
        $("#dosis_" + rel).val(dosis).change();
    }

    dosis = parseFloat(24 / parseFloat(frecuency)) * parseFloat(dosis);
    $("#total_dosis_" + rel).val(dosis).change();
}

function calculateTotalDestroy(quantity, concentration, dosis, rel) {
    if (!quantity || quantity == 'undefined' || quantity == 0) {
        quantity = 1;
        $("#quantity_" + rel).val(quantity);
    }

    if (!concentration || concentration == 'undefined' || concentration == 0) {
        concentration = 0;
    }

    if (!dosis || dosis == 'undefined' || dosis == 0) {
        dosis = 0;
    }

    destroy = ((parseFloat(quantity) * parseFloat(concentration)) - dosis);
    if (destroy < 0) {
        $('#result').html('<div class="alert alert-danger fade in div_error_concentration">' +
            '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' +
            'La cantidad a destruir no puede ser negativa por favor valide la informacion para realizar correctamente el calculo.' +
        '</div>');
    }
    $("#destroy_" + rel).val(destroy);
}

function getDxJson(dx, id, rel) {
    $.post(appUrl + 'cies/getDxJson/' + dx,
        function(data) {
            if (data) {
                $("#diagnosis_" + rel + "_true").show();
                $("#diagnosis_" + rel + "_false").hide();
                validateDxSex(id);
            } else {
                $("#diagnosis_" + rel + "_true").hide();
                $("#diagnosis_" + rel + "_false").show().attr('title', 'El diagnostico no existe');
            }
        }
    );
}

function validateDxSex(element) {
    if ($('#'+element).val()) {
        $.post(appUrl + 'Cies/validateDxSex/' + $('#'+element).val() + '/' + $('#gender_code_' + rel).val(),
            function(data) {
                if (!data) {
                    $("#diagnosis_" + rel + "_true").hide();
                    $("#diagnosis_" + rel + "_false").show().attr('title', 'El diagnostico no corresponde al sexo.');
                } else {
                    $("#diagnosis_" + rel + "_true").show();
                    $("#diagnosis_" + rel + "_false").hide();
                    validateDxAge(element);
                }
            } 
        );
    }
}

function validateDxAge(element) {
    if ($('#'+element).val()) {
        $.post(appUrl + 'Cies/validateDxAge/' + $('#'+element).val() + '/' + $('#age_' + rel).val() + '/' + $('#age_unit_' + rel).val(),
            function(data) {
                if (!data) {
                    $("#diagnosis_" + rel + "_true").hide();
                    $("#diagnosis_" + rel + "_false").show().attr('title', 'El diagnostico no corresponde a la edad.');
                } else {
                    $("#diagnosis_" + rel + "_true").show();
                    $("#diagnosis_" + rel + "_false").hide();
                }
            } 
        );
    }
}

function createValueCie(parent, id, code, description) {
    $("#" + parent).val(code).blur();
}
