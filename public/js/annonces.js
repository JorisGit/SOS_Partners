moment.locale('fr', {
    months: 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'.split('_'),
    monthsShort: 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'.split('_'),
    monthsParseExact: true,
    weekdays: 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
    weekdaysShort: 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
    weekdaysMin: 'Di_Lu_Ma_Me_Je_Ve_Sa'.split('_'),
    weekdaysParseExact: true,
    longDateFormat: {
        LT: 'HH:mm',
        LTS: 'HH:mm:ss',
        L: 'DD/MM/YYYY',
        LL: 'D MMMM YYYY',
        LLL: 'D MMMM YYYY HH:mm',
        LLLL: 'dddd D MMMM YYYY HH:mm'
    },
    calendar: {
        sameDay: '[Aujourd’hui à] LT',
        nextDay: '[Demain à] LT',
        nextWeek: 'dddd [à] LT',
        lastDay: '[Hier à] LT',
        lastWeek: 'dddd [dernier à] LT',
        sameElse: 'L'
    },
    relativeTime: {
        future: 'dans %s',
        past: 'il y a %s',
        s: 'quelques secondes',
        m: 'une minute',
        mm: '%d minutes',
        h: 'une heure',
        hh: '%d heures',
        d: 'un jour',
        dd: '%d jours',
        M: 'un mois',
        MM: '%d mois',
        y: 'un an',
        yy: '%d ans'
    },
    dayOfMonthOrdinalParse: /\d{1,2}(er|e)/,
    ordinal: function(number) {
        return number + (number === 1 ? 'er' : 'e');
    },
    meridiemParse: /PD|MD/,
    isPM: function(input) {
        return input.charAt(0) === 'M';
    },
    meridiem: function(hours, minutes, isLower) {
        return hours < 12 ? 'PD' : 'MD';
    },
    week: {
        dow: 1,
        doy: 4
    }
});

$(function() {

    var start = moment().startOf('month');
    var end = moment();

    function cb(start, end) {
        $('#calendrierAnnoncesPublie span').html('Du ' + start.format('D MMMM YYYY') + ' au ' + end.format('D MMMM YYYY'));
    }

    $('#calendrierAnnoncesPublie').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Aujourd\'hui': [moment(), moment()],
            'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
            'Ce mois': [moment().startOf('month'), moment().endOf('month')],
            'Le dernier mois': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            "format": "ddd D MMM YYYY",
            "separator": " - ",
            "applyLabel": "Appliquer",
            "cancelLabel": "Annuler",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Personnaliser",
            "weekLabel": "V",
            "daysOfWeek": [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ],
            "monthNames": [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            "firstDay": 1
        }

    }, cb);

    cb(start, end);

});

$(function() {

    var start = moment();
    var end = moment().endOf('month');

    function cb(start, end) {
        $('#calendrierActivitesPrevu span').html('Du ' + start.format('D MMMM YYYY') + ' au ' + end.format('D MMMM YYYY'));
    }

    $('#calendrierActivitesPrevu').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Aujourd\'hui': [moment(), moment()],
                'Demain': [moment().subtract(-1, 'days'), moment().subtract(-1, 'days')],
                'Les 7 prochains jours': [moment(), moment().subtract(-6, 'days')],
                'Ce mois': [moment().startOf('month'), moment().endOf('month')],
                'Le prochain mois': [moment().subtract(-1, 'month').startOf('month'), moment().subtract(-1, 'month').endOf('month')]
            },
            locale: {
                "format": "ddd D MMM YYYY",
                "separator": " - ",
                "applyLabel": "Appliquer",
                "cancelLabel": "Annuler",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Personnaliser",
                "weekLabel": "V",
                "daysOfWeek": [
                    "Dim",
                    "Lun",
                    "Mar",
                    "Mer",
                    "Jeu",
                    "Ven",
                    "Sam"
                ],
                "monthNames": [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"
                ],
                "firstDay": 1
            }
        },
        cb);

    cb(start, end);

});