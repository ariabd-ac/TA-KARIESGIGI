var nama_gejala = document.getElementById('nama_gejala');
var submitbtn = document.getElementById('submitbtn');

// when unchecked or checked, run the function
nama_gejala.onchange = function () {
  if (this.checked) {
    submitbtn.disabled = false;
  } else {
    submitbtn.disabled = true;
  }

}

