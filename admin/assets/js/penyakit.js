$(document).ready(function () {
  $('#simpan-penyakit').on('click', function () {
    $("#simpan-penyakit").attr("disabled", "disabled");
    var kodePenyakit = $('#kode-penyakit').val();
    var namaPenyakit = $('#nama-penyakit').val();
    var keterangan = $('#keterangan').val();
    var solusi = $('#solusi').val();
    if (kodePenyakit != "" && namaPenyakit != "" && keterangan != "" && solusi != "") {
      $.ajax({
        url: "php/add-penyakit.php",
        // dataType: "json",
        type: "POST",
        data: {
          kodePenyakit: kodePenyakit,
          namaPenyakit: namaPenyakit,
          keterangan: keterangan,
          solusi: solusi
        },
        cache: false,
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#simpan-penyakit").removeAttr("disabled");
            $('#addForm').find('input:text').val('');
            $("#success").show();
            $('#success').html('Data added successfully !');
          }
          else if (dataResult.statusCode == 201) {
            alert("Error occured !");
          }

        }
      });
    }
    else {
      alert('Please fill all the field !');
    }
  });
});