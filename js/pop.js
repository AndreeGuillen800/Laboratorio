function alerta() {
  alert("Esto es una alerta");
}
function abrir() {
  open(
    "https://www.google.es/search?source=hp&ei=NvW5WuuXCMK1sAfA9KR4&q=esto+es+una+nueva+ventana&oq=esto+es+una+nueva+ventana&gs_l=psy-ab.3..33i22i29i30k1.26126.33095.0.33206.42.36.3.0.0.0.192.3108.22j8.31.0....0...1.1.64.psy-ab..8.32.3071.6..0j35i39k1j0i131k1j0i131i67k1j0i67k1j0i22i30k1j33i160k1j33i21k1.118.BVPdBx1Rxqk"
  );
}
function pregunta() {
  var con = confirm("¿ Es esto un confirm?");
  document.getElementById("par").innerHTML = "respuesta a la pregunta = " + con;
}
function input() {
  var pro = prompt("Esto es un formulario");
  document.getElementById("par1").innerHTML =
    "respuesta al formulario = " + pro;
}
