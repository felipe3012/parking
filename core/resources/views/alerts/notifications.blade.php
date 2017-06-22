<?php 
       
if (Session::has('message-success')) {       
 $script = "<script type='text/javascript'>
 $.toast({
            heading: 'Transacción Exitosa',
            text: '".Session::get('message-success')."',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3000, 
            stack: 6
          });
          </script>
";
        echo $script;}

if (Session::has('message-errors')) {       
 $script = "<script type='text/javascript'>
$.toast({
            heading: 'Transacción Erronea',
            text: '".Session::get('message-errors')."',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3000, 
            stack: 6
          });
          </script>
";
        echo $script;}

        if (Session::has('message-info')) {       
 $script = "<script type='text/javascript'>
$.toast({
            heading: 'Información',
            text: '".Session::get('message-info')."',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3000, 
            stack: 6
          });</script>
";
        echo $script;}

        if (Session::has('message-warning')) {       
 $script = "<script type='text/javascript'>$.toast({
            heading: 'Advertencia',
            text: '".Session::get('message-warning')."',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3000, 
            stack: 6
          });</script>
";
        echo $script;}