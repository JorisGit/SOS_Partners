$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#calendrierAnnonces span').html('Du ' + start.format('D MMMM YYYY') + ' au ' + end.format('D MMMM YYYY'));
    }

    $('#calendrierAnnonces').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Aujourd\'hui': [moment(), moment()],
            'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
            'Ce mois': [moment().startOf('month'), moment().endOf('month')],
            'Le dernier mois': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});