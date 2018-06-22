var index = 0;
var changeImg = ()=>{
    var n;
    var imgIds = document.getElementsByClassName('img');

    for(n =0; n< imgIds.length; n++){
        imgIds[n].style.display = 'none';
    }

    index++;

    if( index > imgIds.length){ index = 1;}
    imgIds[index-1].style.display = 'block';
    setTimeout(changeImg, 2000);
}

changeImg();