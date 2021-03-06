function agrandir() {
        if(this.value.length > 100){
		this.style.height = this.value.length*0.5+"px";
        }
}
document.getElementById("description").onkeydown = agrandir;

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