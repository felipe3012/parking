//Emergente Crear - Editar
$(document).on('click', '.iframe', function(event) {
    event.preventDefault();
    var width = 800;
    var heigth = 400;
    var url = window.location;
    var icon = null;
    var sub = '';

    if ($(this).attr('data') != null) {
        width = $(this).attr('data');
    }
    if ($(this).attr('data-height') != null) {
        heigth = $(this).attr('data-height');
    }
    if ($(this).attr('data-icon') != null) {
        icon = $(this).attr('data-icon');
    }
    if ($(this).attr('data-sub') != null) {
        sub = $(this).attr('data-sub');
    }
    $("#modal-iframe").iziModal({
        title: $(this).attr('title'),
        subtitle: sub,
        icon: icon,
        transitionIn: 'bounceIn',
        headerColor: 'rgb(79, 84, 103)',
        overlay: true,
        radius: 5,
        width: width,
        iframeHeight: heigth,
        iframe: true,
        timeoutProgressbar: false,
        onClosed: function() {
            window.location.href = url['pathname'];
        }
    });
    $("#modal-iframe").iziModal('open', event);
});
//Emergente - Eliminar
$(document).on('click', '.msgbox', function(event) {
    event.preventDefault();
    var $this = $(this);
    var txt = $this.attr('data');
    var msg = "¿Está seguro que desea borrar el registro?";
    if ($this.attr('data-msg') != null) {
        msg = $this.attr('data-msg');
    }
    $.msgbox(msg + "<br />" + txt, {
        type: "confirm", //error - confirm - info
        buttons: [{
            type: "submit",
            value: "Aceptar"
        }, {
            type: "cancel",
            value: "Cancelar"
        }]
    }, function(result) {
        if (result === "Aceptar") {
            window.location.href = $this.attr('href');
        }
    });
});
$(document).ready(function() {
    //Activador de validaciones
    $('#frm').validator();
    $('.datatable').dataTable({
        language: {
            url: "theme/plugins/bower_components/datatables-plugins/i18n/Spanish.lang"
        }
    });
    var cnt = 10;
    TabbedNotification = function(options) {
        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title + "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";
        if (!document.getElementById('custom_notifications')) {
            alert('doesnt exists');
        } else {
            $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
            $('#custom_notifications #notif-group').append(message);
            cnt++;
            CustomTabs(options);
        }
    };
    CustomTabs = function(options) {
        $('.tabbed_notifications > div').hide();
        $('.tabbed_notifications > div:first-of-type').show();
        $('#custom_notifications').removeClass('dsp_none');
        $('.notifications a').click(function(e) {
            e.preventDefault();
            var $this = $(this),
                tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
                others = $this.closest('li').siblings().children('a'),
                target = $this.attr('href');
            others.removeClass('active');
            $this.addClass('active');
            $(tabbed_notifications).children('div').hide();
            $(target).show();
        });
    };
    CustomTabs();
    var tabid = idname = '';
    $(document).on('click', '.notification_close', function(e) {
        idname = $(this).parent().parent().attr("id");
        tabid = idname.substr(-2);
        $('#ntf' + tabid).remove();
        $('#ntlink' + tabid).parent().remove();
        $('.notifications a').first().addClass('active');
        $('#notif-group div').first().css('display', 'block');
    });
});


 // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'

    });

    $('.clockpicker').clockpicker({
            donetext: 'Done',

        })
        .find('input').change(function() {
            console.log(this.value);
        });

    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker

     $(".select2").select2();
     $('.selectpicker').selectpicker();

$(document).ready(function(){
    $(".barra").change(function(){
        event.preventDefault();
        var width = 800;
        var title = 'factura';
        var heigth = 400;
        var url = window.location;
        var icon = 'fa fa-file';
        var sub = '';
        var dato = $(this).val();
        var ruta = "http://localhost/parkinglot/facturanew/"+dato;
        $("#modal-iframe").iziModal({
        title: title,
        subtitle: sub,
        icon: icon,
        transitionIn: 'bounceIn',
        headerColor: 'rgb(79, 84, 103)',
        overlay: true,
        radius: 5,
        iframeURL: ruta,
        width: width,
        iframeHeight: heigth,
        iframe: true,
        timeoutProgressbar: false,
        onClosed: function() {
            window.location.href = url['pathname'];
        }
        });
    $("#modal-iframe").iziModal('open', event);
    });
});

  $('.datatable-order').DataTable({
 order: [[3, "asc"],[0, "asc"]]
});

    jQuery('.mydatepicker, #datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        locale: 'es'
    });
