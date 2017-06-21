//Type de Sport

$('#typeSport').change(function() {
    var typeSport = $(this).val();
    $.ajax({
        type: 'POST',
        url: 'public/ajax/getSport.php',
        data: { 'typeSport': $('#typeSport option:selected').text() },
        dataType: 'JSON',
        success: function(data) {
            $('#sport').empty();
            var all;
            for (var key in data) {
                if (data[key].type[0] === 'libre') {
                    all = 'Tout les sports libres';
                    allAttribut = 'allLibre';
                } else if (data[key].type[0] === 'individuel') {
                    all = 'Tout les sports individuels';
                    allAttribut = 'allIndividuel'
                } else if (data[key].type[0] === 'collectif') {
                    all = 'Tout les sports collectifs';
                    allAttribut = 'allCollectif';
                } else {
                    all = 'Tout les sports';
                    allAttribut = 'allSport';
                }

                if (key == 0) {
                    $("#sport").append('<option id="' + allAttribut + '" name="' + allAttribut + '">' + all + '</option>');
                }

                $("#sport").append('<option id="' + data[key].attribut + '" name="' + data[key].attribut + '">' + data[key].intitule + '</option>');
            }
        }
    })
});

//Filtre

$('#filtre').click(function() {
    var calendrierAnnonces = $('#calendrierAnnoncesPublie span').text();
    var calendrierEvenement = $('#calendrierActivitesPrevu span').text();;
    var codePostal = $('#code').val();
    var sport = $('#sport option:selected').text();

    if (codePostal.length == 0) {
        codePostal = 'empty';
    }

    var sendData = 'sport->' + sport + '|' + 'date-annonces->' + calendrierAnnonces + '|' + 'date-evenement->' + calendrierEvenement + '|' + 'code-postal->' + codePostal;

    console.log(sendData);

    $.ajax({
        type: 'POST',
        url: 'public/ajax/filtreAnnonces.php',
        data: { 'dataReceive': sendData },
        dataType: 'JSON',
        success: function(data) {
            $('#display-annonces').empty();
            for (var key in data) {
                $('#display-annonces').append('<div class="row"><div class="annonce"><div class="row"><div class="col-md-6"><h3>' + data[key].titre + '</h3></div><div class="col-md-6 datePublication"><span><span class="libel">Date de publication :</span> ' + data[key].dateP + '</span></div></div><div class="row description"><div class="col-md-6" ><p>' + data[key].description[0] + '</p></div><div class="col-md-6"><ul><li><span class ="libel"> Date de l\'événement :</span> ' + data[key].dateE + '</li><li><span class="libel" >Nombre de participant max: </span>' + data[key].nbParticipant + '</li><li><span class="libel" >Lieu de l\'événement : </span>' + data[key].codePostal + '</li></ul></div></div></div></div>');
            }
        }
    });
});


//Calendriers

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

jQuery(function($) {
    var _5 = $('#code'),
        _4 = $('#city'),
        _9 = $('#output');
    var _2 = {};
    var _12 = (~(location.protocol + '').indexOf('s') ? 'https' : 'http') + '://vicopo.selfbuild.fr';
    _5.keyup(function() {
        var _0 = $(this).val();
        if (/^[^0-9]/.test(_0)) {
            _5.val('');
            _4.val(_0).focus().trigger('keyup')
        }
    });
    _4.keyup(function() {
        var _0 = $(this).val();
        if (/^[0-9]/.test(_0)) {
            _4.val('');
            _5.val(_0).focus().trigger('keyup')
        }
    });

    function _10(_13) { _9.html(_13.map(function(_3) { return '<a href="#">' + _3.code + ' &nbsp; ' + _3.city + '</a>' }).join('')) }
    $.each(['code', 'city'], function(i, _1) {
        var _11 = $('#' + _1).on('keyup', function() {
            var _0 = _11.val();
            if (_0.length > 1) {
                _2[_1] = _2[_1] || {};
                if (_2[_1][_0]) { _10(_2[_1][_0]) }
                var _3 = {};
                _3[_1] = _0;
                $.getJSON(_12, _3, function(_6) { _2[_1][_6.input] = _6.cities; if (_11.val() == _6.input) { _10(_6.cities) } })
            }
        })
    });
    $(document).on('click', '#output a', function(e) {
        var _8 = $(this).text();
        var _7 = _8.indexOf(' ');
        if (~_7) {
            _5.val(_8.substr(0, _7));
            _4.val(_8.substr(_7).trim());
            _9.empty()
        }
        e.preventDefault();
        e.stopPropagation();
        return false
    })
});