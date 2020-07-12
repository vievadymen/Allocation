$('#chambre_numbatiment').keyup(function () {
    nbrField= $('#nbrfield').val().toString().padStart(4, '0');
    numbat=$('#chambre_numbatiment').val();
    conv=numbat.toString().padStart(3,'0');
    $('#chambre_numchambre').attr('value', `${conv}-${nbrField}`)
});

var matricule = $('#etudiant_matricule');

$('#etudiant_datenaissance').change(function () {
    date= $('#etudiant_datenaissance').val().split('-');
    var prenom= $('#etudiant_nom').val();
    matricule.attr(`value`,`${date[0]}${nom.substr(0,2).toUpperCase()}${prenom.substr((prenom.length)-2).toUpperCase()}`)
    console.log(date[0]);
});