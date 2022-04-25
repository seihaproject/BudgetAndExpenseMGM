function validfield(fname,lname,username,password,repassword){
    if( (fname == "") || (lname=="") ||(username = "")|| (password =="") || (repassword=="")){

        alert ('you must put value in the field of form')
        
    }
    return true



}

function matchpassword(pass,repass){
    if(pass !== repass ){
        alert ('the password and repassword must be matched')
        

    }
    return true

}