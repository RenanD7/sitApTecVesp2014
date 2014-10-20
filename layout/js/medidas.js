/* 
 * medidas.js
 */

var spanLargura = document.getElementById('largura');
var spanAltura = document.getElementById('altura');

windows.onresize = function(){
    altura = windows.innerHeight;
    largura = window.innerWidth;
    
    spanLargura.innerHTML = largura + 'px ';
    spanAltura.innerHTML = altura + 'px ';
};


