
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
