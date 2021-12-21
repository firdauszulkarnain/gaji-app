$(document).ready(function() {  
    var x = $('#mytabel').DataTable({
        "responsive" : true,
        "ordering": false,
        "order": [[ 1, 'asc' ]],
    });
      x.on( 'order.dt search.dt', function () {
        x.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    // Flashdata
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
        title: 'Success',
        text: 'Berhasil ' + flashData,
        icon: 'success'
        });
    }

    // Flashdata Hapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const form = $(this).parents('form');
        Swal.fire({
        title: 'Yakin Hapus Data',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        })
    });

    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }
    function showServerTime(obj, time) {
        var parts   = time.split(":"),
            newTime = new Date();
    
        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));
    
        var timeDifference  = new Date().getTime() - newTime.getTime();
    
        var methods = { 
            displayTime: function () {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },
     
            leadZeros: function (time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }

    $('.uang').mask('000.000.000.000', {
        reverse: true
      });

    $('#tanggal').datepicker({
        autoHide: true,
        format: 'yyyy-mm-dd',
        todayBtn: "linked",
        todayHighlight: true    
    });
});