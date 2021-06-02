let sm_pakar = document.getElementById('sm_pakar').innerHTML;
let jml_data = document.getElementById('jml_data').innerHTML;
// let hasil = document.getElementById('hasil').innerHTML = Math.round(sm_pakar / jml_data * 1);
let hasil = document.getElementById('hasil').innerHTML = parseFloat(sm_pakar / jml_data * 100 / 100);

hasil.toFixed(2);

console.log('sama pakar: ', hasil);

// let nama_gejala = document.getElementById('nama_gejala');
// let submitbtn = document.getElementById('submitbtn');



