$(function () {
    var open = true;
    var windowSize = $(window)[0].innerWidth;

    if (windowSize <= 768) {
        open = false;
    }

    $('.menu-btn').click(function () {
        if (open) {
            $('aside').animate({'width':'0','padding':'0'},function(){
                open = false;
            });
            $('.content,header').css({'width':'100%'}); 
            $('.content,header').animate({'left':'0'},function(){
                open = false;
            }); 
        }else{
            $('aside').animate({'width':'300px','padding':'10px'},function(){
                open = true;
            });
            $('.content,header').css({'width':'calc(100% - 300px)'}); 
            $('.content,header').animate({'left':'300px'},function(){
                open = true;
            }); 
        }
    })
})
function setAttributes(str,pwr,dxt,mnd,cns) {
    var attr = [parseFloat(str.value),parseFloat(mnd.value),parseFloat(dxt.value),parseFloat(pwr.value),parseFloat(cns.value)];
    let calc;
    dxt = parseFloat(dxt.value)
    cns = parseFloat(cns.value)
    let lifePoints;
    let skillPoints;
    let dodging;
    let speed;
    let input = document.querySelector('#showCurrent');
    //change NaN to 0
    for (let i = 0; i <= 4; i++) {
        if (isNaN(attr[i])) {
            attr[i] = 0;        
        }
    }
    //verify if is >=5
    let sum = attr.reduce(function (a, b) {
        return a + b;
      }, 0);
    calc = sum;
    //validate
    if (calc > 5) {
        alert('max points you can have is 5!');
        document.getElementById('show').innerHTML = 'redistribute your points, you have a overflow of: '+(calc-5) ;
        for (let i = 0; i < attr.length; i++) {
            attr[i] = 1;
        }
    }else{
        //show in "showCurrent"
        input.value = calc;
        document.getElementById('show').innerHTML = `Points set (${calc})`;
        //check if modifiers will be set
        if (isNaN(cns)) {
            lifePoints = 20;
        }else{
            lifePoints = 20 + (2.5 * cns);
        }
        if (isNaN(dxt)) {
            speed = 10;
            dodging = 8;
        }else{
            speed = 10 + (1.5 * dxt);
            dodging = 8 + (1.75 * dxt);
        }
        document.getElementById('fde1').innerHTML = Math.round(lifePoints);
        document.getElementById('fde2').innerHTML = 25;
        document.getElementById('fde3').innerHTML = Math.round(dodging);
        document.getElementById('fde4').innerHTML = Math.round(speed);
        $("#fde1").fadeIn('slow');
        $("#fde2").fadeIn('slow');
        $("#fde3").fadeIn('slow');
        $("#fde4").fadeIn('slow');
    }
    //show special
    document.querySelector('#lifeSend').value = Math.round(lifePoints);
    document.querySelector('#skillSend').value = 25;
    document.querySelector('#ddgSend').value = Math.round(dodging);
    document.querySelector('#speedSend').value = Math.round(speed);
    //insert into hidden values
    document.querySelector('#strS').value = attr[0];
    document.querySelector('#mndS').value = attr[1];
    document.querySelector('#dxtS').value = attr[2];
    document.querySelector('#pwrS').value = attr[3];
    document.querySelector('#cnsS').value = attr[4];
}
function resetAttributes() {
    $('input[name="strAttr"]').prop('checked', false);
    $('input[name="mndAttr"]').prop('checked', false);
    $('input[name="dxtAttr"]').prop('checked', false);
    $('input[name="pwrAttr"]').prop('checked', false);
    $('input[name="cnsAttr"]').prop('checked', false);
    document.getElementById('show').innerHTML = '';
    $("#fde1").fadeOut();
    $("#fde2").fadeOut();
    $("#fde3").fadeOut();
    $("#fde4").fadeOut();
    //window.location.reload();
}
