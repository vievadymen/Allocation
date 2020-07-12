$(document).ready(function() {

    $('#myTable').DataTable({

/*         scroll: true,
        paging: false, */
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "bLengthChange": false,
        scrollY: 300,
    });

    $('#chambre_numbatiment').keyup(function () {
        nbrField = $('#nbrfield').val().toString().padStart(4, '0');
        numbat = $('#chambre_numbatiment').val();
        conv = numbat.toString().padStart(3, '0');
        $('#chambre_numchambre').attr('value', `${conv}-${nbrField}`)
    });

    var matricule = $('#etudiant_matricule');

    $('#etudiant_datenaissance').change(function () {
        date = $('#etudiant_datenaissance').val().split('-');
        var prenom = $('#etudiant_prenom').val();
        var nom = $('#etudiant_nom').val();
        matricule.attr(`value`, `${date[0]}${nom.substr(0, 2).toUpperCase()}${prenom.substr((prenom.length) - 2).toUpperCase()}${$('#matricule').val().toString().padStart(4, '0')}`)
        console.log(date[0]);
    });

});