$("#cal").click(function () {
    var usr = [];
    var ave = [];

    var raw = "./data/data.json";
    $.getJSON(raw).done(function (data) {

        $.each(data.mat, function (i) {
            usr[i] = $("#" + this.id).val();
        });

        var i = 0;
        $.each(data.ecoles, function (name, props) {
            var som = 0;
            var note = 0;
            $.each(props.coefs, function (i, coef) {
                som += coef;
                note += coef * usr[i];
            });
            ave[i++] = note / som;
            console.log(name + ": " + ave[i - 1]);
        });
    });
});
