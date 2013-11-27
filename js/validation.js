$(document).ready(function(){
  jQuery(function(){
            jQuery("#etiketa").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#racun").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
          	jQuery("#iznos").validate({
                expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                message: "Unos mora biti broj!"
                });
             jQuery("#datepicker").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#komentar").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
        });
});


