
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>

<!-- script de tradução -->
<script src='fullcalendar/lang/pt-br.js'></script>

<script>
    var dataSelecionada = "<?php print $data; ?>";
    $(document).ready(function() {

        //CARREGA CALENDÁRIO E EVENTOS DO BANCO
        $('#calendario').fullCalendar({
            header: {
                left: '',
                center: 'title',
                right: ''
            },
            defaultDate: dataSelecionada,
            editable: false,
            eventLimit: false,
            events: 'buscaAgendamentoBanco.php',
            eventColor: '#00bfff'
        });
    });
</script>
<style>
    #calendario {
        position: relative;
        width: 100%;
        margin: 0px auto;
    }
</style>
<script src="jquery-3.6.3.min.js"></script>
