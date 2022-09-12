// var choixDept = document.getElementById("choixDept");
// var typeMutation = document.querySelector("#type-mutation");

var ajout = document.getElementById("ajout-academie");
var original = document.getElementById('liste-academie-souhaite');
var academie = document.getElementById("academie-souhaite");
academie.addEventListener("click", initAcademie());

var tousDept = document.getElementById("tous-dept");
var dept = document.getElementById("departement");
var typeContrat = document.getElementById("type-contrat-souhaite");
var nbHeures = document.getElementById("nb-heures-souhaite");
var motif = document.getElementById("motif-demande");
var autreMotif = document.getElementById("autre-motif");
var justificatif = document.getElementById("justificatif-motif");

// var Depts = document.getElementById("choixDepts");
// var depts_souhaite = document.getElementById("dept-souhaite");

// var parent = document.getElementById("page4");
// var ext = document.getElementById("mutation-ext");
// si mutation-ext choisi, mettre toute les academies sauf VERSAILLES
// Si boutton cliqué, ajouter liste-academie-souhaite
// var liste = document.getElementById("liste-academie-souhaite");

// ajout.onclick = ()=>{
    // ajout.style.background="#000";
//     let boite = liste.cloneNode(true);
//   liste.appendChlid(boite);
// }

// var y = 0;
let i = 1;

function duplicate() {           

        // let dept1 = document.getElementById("1er-dept");
        // let dept2 = document.getElementById("2eme-dept");
        // let dept3 = document.getElementById("3eme-dept");
        // let dept4 = document.getElementById("4eme-dept");
        // let dept5 = document.getElementById("5eme-dept");

    var clone = original.cloneNode(true);
    original.parentNode.appendChild(clone);
    clone.id = "liste-academie-souhaite" +i;

    let academieClone = clone.querySelector("#academie-souhaite");
    academieClone.id = "academie-souhaite" +i;
    academieClone.name = "academie_souhaite" +i;


    let tousDeptClone = clone.querySelector("#tous-dept");
    tousDeptClone.id = "tous-dept" +i;
    tousDeptClone.name = "tous_dept" +i;


    var y = i;

    function initAcademie2(){
        $('#academie-souhaite' +y).on('change', function(e) {
    
            $.ajax({
                method: "POST",
                url: window.myUrl+"compte/afficherDepartement",
                data: {
                    academie: e.currentTarget.value
                },
                
                success: (function(data) {
                    var depart = $("#departement" +y);
                    depart.html('');
    
                    // console.log(depart)
    
                        JSON.parse(data).forEach(Element => {
                        var input = document.createElement("input");
                        input.id = "dept" +y;
                        // input.className="form-check-input";
                        input.type = "checkbox";
                        input.name = Element.choix +"_" +y;
                        input.value = Element.nom_departement;
                        $("#departement" +y).append(input);
                        var label = document.createElement("label")
                        // label.className="form-check-label";
                        label.for = input.name;
                        // label.for = input.name;
                        label.innerHTML = Element.nom_departement;
                        
                        $("#departement" +y).append(label);
                        $("#departement" +y).append("<br>");
                    //    depart.html(data["nom_departement"]);
                    
                        console.log(depart)
    
                        console.log(input);
                    });
                })
            })        
        })
    }

    let deptClone1 = clone.querySelector("#departement");
    deptClone1.id = "departement" +i;
    deptClone1.addEventListener("click", initAcademie2());

    let typeContratClone = clone.querySelector("#type-contrat-souhaite");
    typeContratClone.id = "type-contrat-souhaite" +i;
    typeContratClone.name = "type_contrat_souhaite" +i;


    let nbHeuresClone = clone.querySelector("#nb-heures-souhaite");
    nbHeuresClone.id = "nb-heures-souhaite" +i;
    nbHeuresClone.name = "nb_heures_souhaite" +i;


    let motifClone = clone.querySelector("#motif-demande");
    motifClone.id = "motif-demande" +i;
    motifClone.name = "motif_demande" +i;


    let autreMotifClone = clone.querySelector("#autre-motif");
    autreMotifClone.id = "autre-motif" +i;
    autreMotifClone.name = "autre_motif" +i;


    let justificatifClone = clone.querySelector("#justificatif-motif");
    justificatifClone.id ="justificatif-motif" +i;
    justificatifClone.name ="justificatif_motif" +i;


    // clone.childNodes.name = this.name +i;

        // let cloneDept = document.querySelector("#academie-souhaite" +i);
        // cloneDept.addEventListener("click", initAcademie());
        console.log(clone);
        console.log(academieClone);

    // console.log(clone.id);

    // if(clone){
            // academie.setAttribute("name", "academie_souhaite" +i)
            // academie.name = "academie_souhaite" +i;
            // academie.setAttribute("onchange", "initAcademie")
            // academie.id = "academie-souhaite" +i;

            // academie.addEventListener("click", initAcademie());
        
            // tousDept.name = "tous_dept" +i;
            // tousDept.id = "tous-dept" +i;

            // dept.name = "departmt" +i;
            // dept.id = "departmt" +i;
            // dept.addEventListener("click", initAcademie2());
            // console.log(dept);        

        
            // dept1.name = "1er_dept" +i;
            // dept1.id = "1er-dept" +i;    
        
            // dept2.name = "2eme_dept" +i;
            // dept2.id = "2eme-dept" +i;
        
            // dept3.name = "3eme_dept" +i;
            // dept3.id = "3eme-dept" +i;
        
            // dept4.name = "4eme_dept" +i;
            // dept4.id = "4eme-dept" +i;
        
            // dept5.name = "5eme_dept" +i;
            // dept5.id = "5eme-dept" +i;
        
            // typeContrat.name = "type_contrat_souhaite" +i;
            // typeContrat.id = "type-contrat-souhaite" +i;
        
            // nbHeures.name = "nb_heures_souhaite" +i;
            // nbHeures.id = "nb-heures-souhaite" +i;
        
            // motif.name = "motif_demande" +i;
            // motif.id = "motif-demande" +i;
        
            // autreMotif.name = "autre_motif" +i;
            // autreMotif.id = "autre-motif" +i;
        
            // justificatif.name = "justificatif_motif" +i;
            // justificatif.id = "justificatif-motif" +i;     
            // console.log(justificatif);  
    // }

    i++; 
}


function initAcademie() {
    // console.log($(document))
    $('#academie-souhaite').on('change', function(e) {

        $.ajax({
            method: "POST",
            url: window.myUrl+"compte/afficherDepartement",
            data: {
                academie: e.currentTarget.value
            },
            
            success: (function(data) {
                var depart = $("#departement");
                depart.html('');

                console.log(data)

                    JSON.parse(data).forEach(Element => {
                    var input = document.createElement("input");
                    // input.className="form-check-input";
                    input.type = "checkbox";
                    input.name = Element.choix;
                    input.value = Element.nom_departement;
                    $("#departement").append(input);
                    var label = document.createElement("label")
                    // label.className="form-check-label";
                    label.for = input.name;
                    // label.for = input.name;
                    label.innerHTML = Element.nom_departement;
                    
                    $("#departement").append(label);
                    $("#departement").append("<br>");
                //    depart.html(data["nom_departement"]);
                    // console.log(data)
                });
                console.log(depart)
            })
        })        
    })
};






// ext.addEventListener("click", ()=>{
//     liste.style.display="block";
// })

// depts_souhaite.style.display="none";


// ext.style.backgroundColor = "#000";
// console.log(typeMutation.option);
// console.log(academieSouhaite.option);


// if (typeMutation.value === "Mutation académie de VERSAILLES") {
//     // console.log(typeMutation);
//     academieSouhaite.option.value = "VERSAILLES";
//     academieSouhaite.content = "VERSAILLES";
// }

// Depts.addEventListener("click", () => {
//         depts_souhaite.style.display="block";
    // let choix = document.createElement("div");



    // choix.innerHTML = '<div class="form-group"> <label for="autre_motif">Indiquer votre département souhaité</label> <input type="text" class="form-control" name="autre_motif"> </div> <br>'
    
    // document.append(choix);    
    
    // "<div class='row'>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 1 : </label>
    // <select class='custom-select' name='dept_souhaite1'>
    // <option selected required='required'>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option>
    // <option value='95'>95</option>
    // </select>
    // </div>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 2 : </label>
    // <select class='custom-select' name='dept_souhaite2'>
    // <option>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option><
    // option value='95'>95</option>
    // </select>
    // </div>
    // <div class='col form-group'>
    // <label for='voeux'> Choix 3 : </label>
    // <select class='custom-select' name='dept_souhaite3'>
    // <option>Indiquer le département souhaité</option>
    // <option value='78'>78</option>
    // <option value='91'>91</option>
    // <option value='92'>92</option>
    // <option value='95'>95</option>
    // </select>
    // </div>
    // </div>";

// })


// function qui permet l’auto-completion des champs etablissement
$(function () {
    $("#rne-etbsmt").autocomplete({
        source: function (request, response) {
            $.ajax({
                type: "POST",
                url: window.myUrl+"compte/afficherEtbsmt",
                data: request,
                success: function (data) {
                    response(data);
                },
                dataType: "json"
            });
        },
        minLength: 2,
        // aprés l’auto-completion remplissage automatique des champs ci-dessous grace a cette fonction
        select: function (event, ui) {
            $("#academie-etbsmt").val(ui.item.academie_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#nom-etbsmt-principal").val(ui.item.nom_etbsmt_principal).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#adresse-etbsmt").val(ui.item.adresse_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#cp-etbsmt").val(ui.item.cp_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#ville-etbsmt").val(ui.item.ville_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#num-etbsmt").val(ui.item.num_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $("#email-etbsmt").val(ui.item.email_etbsmt).attr("readonly", "").css({"background-color":"#CCE9C5"});
            $(".ui-helper-hidden-accessible div").hide();
        }
    });
});


// $('select[name="tous_dept"]').change(function(){
         
//     var valModele = $(this).val();
//     if(valModele== 'choix'){

//     }

// })




