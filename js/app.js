$("#cal").click(function () {
    var usr = [];
    var results = [];

    var raw = "./data/data.json";
    $.getJSON(raw).done(function (data) {

        $.each(data.mat, function (i) {
            usr[i] = $("#" + this.id).val();
        });
        //console.log(usr);

        $.each(data.ecoles, function (i, ecole) {
            var SCoefs = 0;
            var SNotes = 0;
            $.each(ecole.coefs, function (j, coef) {
                SCoefs += coef;
                SNotes += coef * usr[j];
            });

            //console.log(ecole.name + ": " + SNotes / SCoefs);

            results[i] = {
                "name": ecole.name,
                "average": SNotes / SCoefs,
                "seuil": ecole.seuil,
                "isPassed": ((SNotes / SCoefs - ecole.seuil) >= 0)
            };
        });

        results.sort(function (a, b) {
            if (a.isPassed && b.isPassed)
                return (b.seuil - a.seuil);
            else if (!a.isPassed && !b.isPassed)
                return (a.seuil - b.seuil);
            else if (a.isPassed)
                return -1;
            else
                return 1;
        });

        //console.log(results);
        $("#res-tab-body").html("");

        $.each(results, function (i, res) {
            $(
                "<tr class=\"" + ((res.isPassed) ? "success" : "danger") + "\">" +
                "<td>" + res.name + "</td>" +
                "<td>" + res.seuil.toFixed(2) + "</td>" +
                "<td>" + res.average.toFixed(2) + "</td>" +
                "<td>" + (res.average - res.seuil).toFixed(3) + "</td>" +
                "</tr>"
            ).appendTo("#res-tab-body");
        });

        $('#res').hide().removeClass('hide').slideDown('fast')
        $('html, body').animate({
            scrollTop: $("#res").offset().top - 56
        }, 1000);
    });
});


$("#goToPre").click(function () {
    $('html, body').animate({
        scrollTop: $("#previsions>h1").offset().top - 56
    }, 1000);
});
