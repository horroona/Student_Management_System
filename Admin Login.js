function body(){
    
    var body = document.getElementById('body');
    body.style.background = 'lightgreen';
}

function div1_Style(){

    var div1 = document.getElementById("div1");
    div1.style.background = "grey";
    div1.style.position = 'relative';

    div1.style.marginTop = "10%";
    div1.style.marginBottom = "10%";
    
    div1.style.marginLeft ="30%";
    div1.style.marginRight ="30%";
    
    div1.style.textAlign = "center";

    div1.style.paddingTop = "30px";
    div1.style.paddingBottom = "30px";
    
    div1.style.paddingLeft = "30px";
    div1.style.paddingRight = "30px";
    
    div1.style.borderRadius ="3em";

}


function showguidedtips()
{
    var msg1 = document.getElementById('error1');
    msg1.style.color = '#FF0000';
    msg1.style.position = 'absolute';

    var msg2 = document.getElementById('error2');
    msg2.style.color = '#FF0000';
    msg2.style.position = 'absolute';
}

body();
div1_Style();
showguidedtips();