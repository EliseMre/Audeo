$("#cal").click(function () {
    var usr = [];
    var ave = [];

    var raw = "./data/data.json";
    $.getJSON(raw).done(function (data) {

        $.each(data.mat, function (i) {
            usr[i] = $("#" + this.id).val();
        });
        console.log(usr);

        $.each(data.ecoles, function (i, ecole) {
            var som = 0;
            var note = 0;
            $.each(ecole.coefs, function (j, coef) {
                som += coef;
                note += coef * usr[j];
            });
            ave[i] = note / som;
            console.log(ecole.name + ": " + ave[i]);
        });
    });
});
