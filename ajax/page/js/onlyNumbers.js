function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
    }


    function allowLettersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 65 || code > 90 && code<97 || code>122)) {
            e.preventDefault();
        }
        
        
        }


function allowEmailsOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
        if (code>=32 && code<=44 || code==47|| code<44 && code>48 || code>57 && code < 64 || code > 90 && code<=94 || code>95 && code<97 || code>122) {
              e.preventDefault();
        }
            
            
}